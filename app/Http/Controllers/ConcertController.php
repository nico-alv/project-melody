<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('concert.index');
    }

    public function create()
    {
        return view('concert.create');
    }

    public function store(Request $request)
    {
        $messages = makeMessages();
        $this->validate($request, [
            'name' => ['required', 'min:5'],
            'price' => ['required', 'numeric', 'min:20000', 'max:2147483647'],
            'stock' => ['required', 'numeric', 'between:100,400'],
            'date' => ['required', 'date']
        ], $messages);
        $invalidDate = validDate($request->date);
        if ($invalidDate) {
            return back()->with('message', 'La fecha debe ser mayor a ' . date("d-m-Y"));
        }
        $existConcert = existConcertDay($request->date);
        if ($existConcert) {
            return back()->with('message', 'Ya existe un concierto para el dia ingresado');
        }
        Concert::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'date' => $request->date,
            'image' => "843392092f000"
        ]);
        return redirect()->route('dashboard');
    }
}
