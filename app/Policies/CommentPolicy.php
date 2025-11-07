<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Comment $comment){
        return $comment->user->id === $user->id || $user->is_admin;
    }

    public function delete(User $user, Comment $comment){
        return $this->update($user, $comment);
    }
}
