<?php

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
            'check.remaining.images' => \App\Http\Middleware\CheckRemainingImages::class,
            'check.remaining.colors' => \App\Http\Middleware\CheckRemainingColors::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
