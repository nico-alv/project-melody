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
            'password' => ['required', 'min:8', 'regex:/^(?=.*[A-Za-zñÑ])(?=.*\d)[A-Za-zñÑ\d]+$/']
        ], $messages);

        if (!auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return back()->with('message', 'Las credenciales son incorrectas');
        }

        return redirect()->route('dashboard');
    }
}
