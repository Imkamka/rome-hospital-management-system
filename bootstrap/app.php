<?php

use App\Http\Middleware\EnsureRoleIsDoctor;
use App\Http\Middleware\EnsureRoleIsPatient;
use App\Http\Middleware\EnsureUserCanAccessOwnData;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => IsAdminMiddleware::class,
            'own.data' => EnsureUserCanAccessOwnData::class,
            'doctor' => EnsureRoleIsDoctor::class,
            'patient' => EnsureRoleIsPatient::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
