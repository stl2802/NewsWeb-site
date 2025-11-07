<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
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
    public function create(User $user): Response
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Вы не админ');
    }

    public function store(User $user): Response
    {
        return $this->create($user);
    }

    public function update(User $user, Article $article): Response
    {
        return $article->user->id === $user->id && $user->is_admin
            ? Response::allow()
            : Response::deny('Вы можете редактировать только свои статьи');
    }

    public function delete(User $user, Article $article): Response
    {
        return $this->update($user, $article);
    }
}
