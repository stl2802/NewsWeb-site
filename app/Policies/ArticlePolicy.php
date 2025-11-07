<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

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
    public function create(User $user)
    {
        return $user->is_admin;
    }

    public function store(User $user)
    {
        return $this->create($user);
    }

    public function update(User $user, Article $article){
        return $article->user->id === $user->id && $user->is_admin;
    }

    public function delete(User $user, Article $article){
        return $this->update($user, $article);
    }
}
