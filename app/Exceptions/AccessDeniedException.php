<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccessDeniedException extends Exception
{
    protected $message;
    protected $code;

    public function __construct($message = "Доступ запрещен", $code = 403)
    {
        parent::__construct($message, $code);
    }

    public function render(Request $request): Response|JsonResponse
    {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => $this->message,
                'error' => 'FORBIDDEN'
            ], $this->code);
        }

        return response()->view('errors.403', [
            'message' => $this->message
        ], $this->code);
    }
}
