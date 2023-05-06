<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // Retornar al dashboard
        return view('layout.dashboard');
    }
}
