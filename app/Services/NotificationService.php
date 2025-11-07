<?php

namespace App\Services;

use App\Mail\NewCommentAddNotyfication;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class NotificationService
{
    public function notifyAdminAboutNewComment($comment, $article)
    {
        try {

            if (!$this->shouldSendNotification($comment)) {
                return;
            }

            Mail::to($article->user->email)
                ->send(new NewCommentAddNotyfication($comment, $article));

            Log::channel('mail')->info('Уведомление о новом комментарии отправлено администратору', [
                'comment_id' => $comment->id,
                'admin_email' => $article->user->email
            ]);

        } catch (\Exception $e) {
            Log::channel('mail')->error('Ошибка отправки уведомления администратору: ' . $e->getMessage(), [
                'comment_id' => $comment->id,
                'error' => $e->getMessage()
            ]);
        }
    }

    protected function shouldSendNotification($comment)
    {
        return $comment->status !== 'spam' || $comment->user->is_admin == true;
    }
}
