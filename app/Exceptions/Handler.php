<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
<<<<<<< HEAD
use Illuminate\Auth\Access\AuthorizationException;
=======
>>>>>>> origin/master
use Throwable;

class Handler extends ExceptionHandler
{
    /**
<<<<<<< HEAD
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
=======
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
>>>>>>> origin/master
     */
    protected $dontReport = [
        //
    ];

    /**
<<<<<<< HEAD
     * A list of the inputs that are never flashed to the session on validation exceptions.
=======
     * A list of the inputs that are never flashed for validation exceptions.
>>>>>>> origin/master
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
<<<<<<< HEAD
    public function register(): void
    {
        $this->renderable(function (AuthorizationException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Доступ запрещен',
                    'error' => 'UNAUTHORIZED'
                ], 403);
            }

            return response()->view('errors.403', [
                'message' => 'У вас нет прав для выполнения этого действия'
            ], 403);
        });

        $this->renderable(function (AccessDeniedException $e, $request) {
            return $e->render($request);
=======
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
>>>>>>> origin/master
        });
    }
}
