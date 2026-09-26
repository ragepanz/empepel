<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            'admin/logout',
            'client/logout',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (TokenMismatchException $e, Request $request) {
            if ($request->is('admin/logout', 'client/logout', '*/logout')) {
                auth()->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/admin/login');
            }

            return redirect()->guest('/admin/login')->with('status', 'Sesi telah kedaluwarsa. Silakan masuk kembali.');
        });
    })->create();
