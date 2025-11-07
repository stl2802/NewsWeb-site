<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private const COMMENT_VALIDATOR_COM = [
        'dislikes'=>'nullable|integer',
        'likes'=>'nullable|integer',
        'content'=>'required|string',
    ];
    private const COMMENT_VALIDATOR_LIKE = [
        'dislikes'=>'nullable|integer',
        'likes'=>'required|integer',
        'content'=>'nullable|string',
    ];
    private const COMMENT_VALIDATOR_DISLIKE = [
        'dislikes'=>'required|integer',
        'likes'=>'nullable|integer',
        'content'=>'nullable|string',
    ];
    public function __construct(){
        $this->middleware('auth');
    }
    public function store(Request $request, Article $article){
        $validated = $request->validate(self::COMMENT_VALIDATOR_COM);
        $article->comments()->create([
            'content'=>$validated['content'],
            'likes'=>0,
            'dislikes'=>0,
            'user_id'=>Auth::id(),
            'article_id'=>$article->id,
        ]);
        return redirect()->back();
    }
    public function edit(Comment $comment){
        return view('comments.edit', compact('comment', ));
    }
    public function update(Request $request, Comment $comment){
        $validated = $request->validate(self::COMMENT_VALIDATOR_COM);
        $comment->update([
            'content' => $validated['content'],
            'likes' => $validated['likes'] ?? $comment->likes,
            'dislikes' => $validated['dislikes'] ?? $comment->dislikes,
        ]);
        return redirect()->route('show', $comment->article->id);
    }
    public function destroy(Comment $comment){
        $comment->delete();
        return redirect()->back();
    }
}
