<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $messages = makeMessages();
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ], $messages);

        if (!auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return back()->with('message', 'Correo electronico o contraseña son incorrectas, intente nuevamente');
        }

        return redirect()->route('dashboard');
    }
}
