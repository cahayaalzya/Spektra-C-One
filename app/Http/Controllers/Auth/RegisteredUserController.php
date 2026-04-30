<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:Siswa,Guru'],
            'secret_code' => ['nullable', 'string'],
        ]);

        // LOGIC SECRET CODE GURU
        if ($request->role === 'Guru') {
            $kodeRahasia = 'SPEKTRA2026'; // GANTI KODE DISINI
            
            if ($request->secret_code !== $kodeRahasia) {
                return back()->withInput()->withErrors([
                    'secret_code' => 'Access Denied! Kode rahasia Guru salah.'
                ]);
            }
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, 
        ]);

        event(new Registered($user));

        // Mental ke Login dengan Pesan Sukses
        return redirect()->route('login')->with('success', 'Registry Complete! Your legacy starts now.');
    }
}