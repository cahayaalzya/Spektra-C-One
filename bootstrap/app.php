<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // 1. DAFTAR ALIAS MIDDLEWARE (Si Satpam)
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'guru'  => \App\Http\Middleware\GuruMiddleware::class,
            'siswa' => \App\Http\Middleware\SiswaMiddleware::class,
        ]);

        // 2. REDIRECT USERS (Si Pemantul: Kalau sudah login gak bisa ke halaman Login)
        $middleware->redirectUsersTo(function () {
            $user = Auth::user();
            if ($user?->role === 'Admin') {
                return route('admin.dashboard');
            } elseif ($user?->role === 'Guru') {
                return route('guru.dashboard');
            } elseif ($user?->role === 'Siswa') {
                return route('siswa.dashboard');
            }
            return route('dashboard');
        });

        // 3. PREVENT BACK HISTORY (Jurus Anti-Back agar sesi benar-benar aman)
        $middleware->appendToGroup('web', [
            \App\Http\Middleware\PreventBackHistory::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();