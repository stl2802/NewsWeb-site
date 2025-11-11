<?php

namespace App\Jobs;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Log;

class VeryLongJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $comment;
    protected $article;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Comment $comment, Article $article)
    {
        $this->comment = $comment;
        $this->article = $article;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(NotificationService $notificationService)
    {
        $notificationService->notifyAdminAboutNewComment(
            $this->comment,
            $this->article
        );

        Log::info('VeryLongJob: Уведомление отправлено для комментария ID: ' . $this->comment->id);
    }

    public function failed(\Throwable $exception)
    {
        Log::error('VeryLongJob failed: ' . $exception->getMessage(), [
            'comment_id' => $this->comment->id
        ]);
    }
}
