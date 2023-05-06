<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $messages = makeMessages();
        // Validar la información
        $credentials=$this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ] , $messages);

        // Se intenta autenticar al usuario
        $remember = ( $request ->has('remember') ? true : false);
        if ( !auth()->attempt($request->only('email', 'password'), $request->remember) ) {
            return back()->with('message', 'Las credenciales son incorrectas');
        }
        return view('layout.dashboard');
    }
    public function destroy() {
        auth()->logout();
        return redirect()->to('/');

    }
}
