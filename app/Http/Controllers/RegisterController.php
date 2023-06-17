<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $messages = makeMessages();
        $this->validate($request, [
            'name' => ['required', 'min:3', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'regex:/^(?=.*[A-Za-zñÑ])(?=.*\d)[A-Za-zñÑ\d]+$/']

        ], $messages);

        User::create([
            'name' => $request->name,
            'email' => Str::lower($request->email),
            'password' => Hash::make($request->password),
            'role' => 'Usuario'
        ]);

        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()->route('dashboard');
    }
}
