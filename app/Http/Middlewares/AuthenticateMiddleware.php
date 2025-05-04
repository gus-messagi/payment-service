<?php

declare(strict_types=1);

namespace App\Http\Middlewares;

use Src\Authentication\Application\Ports\VerifyClientKeyPort;
use Src\Authentication\Application\UseCases\VerifyClientKeyUseCase;

final class AuthenticateMiddleware
{
    private VerifyClientKeyPort $verifyClientKeyPort;

    public function __construct(VerifyClientKeyUseCase $verifyClientKeyUseCase)
    {
        $this->verifyClientKeyPort = $verifyClientKeyUseCase;
    }
    public function handle($request, \Closure $next)
    {
        $key = $request->header("X-Client-Key");

        if (empty($key)) {
            return response()->json(['message' => 'Client Key missing'], 401);
        }

        $user = $this->verifyClientKeyPort->handle($key);

        if ($user === null) {
            return response()->json(['message' => 'Authentication error'], 401);
        }

        $request->attributes->set('user', $user);

        return $next($request);
    }
}