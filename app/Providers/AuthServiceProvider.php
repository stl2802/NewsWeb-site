<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Article' => 'App\Policies\ArticlePolicy',
        'App\Models\Comment' => 'App\Policies\CommentPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate для управления статьями (только админ/модератор)
        Gate::define('manage-articles', function (User $user) {
            return $user->is_admin
                ? Response::allow()
                : Response::deny('Только администраторы могут управлять статьями');
        });

        // Gate для создания статей (только админ)
        Gate::define('create-article', function (User $user) {
            return $user->is_admin
                ? Response::allow()
                : Response::deny('Только администраторы могут создавать статьи');
        });

        // Gate для редактирования ЛЮБОЙ статьи (только админ)
        Gate::define('edit-any-article', function (User $user) {
            return $user->is_admin
                ? Response::allow()
                : Response::deny('Только администраторы могут редактировать статьи');
        });

        // Gate для удаления ЛЮБОЙ статьи (только админ)
        Gate::define('delete-any-article', function (User $user) {
            return $user->is_admin
                ? Response::allow()
                : Response::deny('Только администраторы могут удалять статьи');
        });

        // Gate для просмотра панели управления (только админ)
        Gate::define('view-admin-panel', function (User $user) {
            return $user->is_admin
                ? Response::allow()
                : Response::deny('Доступ к панели управления только для администраторов');
        });

        // Gate для модерации комментариев (только админ)
        Gate::define('moderate-comments', function (User $user) {
            return $user->is_admin
                ? Response::allow()
                : Response::deny('Только администраторы могут модерировать комментарии');
        });

    }
}
