<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Daftarkan middleware alias sesuai SDD: role-based access control
        $middleware->alias([
            'role'         => \App\Http\Middleware\RoleMiddleware::class,
            'check.active' => \App\Http\Middleware\CheckActiveMiddleware::class,
            'auth.basic'   => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
            'auth.session' => \Illuminate\Auth\Middleware\AuthenticateSession::class,
            'auth.verified'=> \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
            'throttle'     => \Illuminate\Routing\Middleware\ThrottleRequests::class,
            'verified'     => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();