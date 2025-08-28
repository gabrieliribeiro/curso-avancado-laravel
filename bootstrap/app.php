<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->alias([
            'autenticacao' => \App\Http\Middleware\AutenticacaoMiddleware::class,
            'log.acesso' => \App\Http\Middleware\LogAcessoMiddleware::class
        ]);
        $middleware->appendToGroup('web', ['log.acesso']);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
