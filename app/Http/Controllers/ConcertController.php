<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Concert;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ConcertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        if ($user->role == "Administrador") {
            $currentDate = Carbon::now()->format('Y-m-d');

            $concerts = Concert::where('date', '>=', $currentDate)->orderBy('date', 'asc')->get();

            return view('admin.dashboard', [
                'concerts' => $concerts,
            ]);
        } else {
            return view('client.dashboard');
        }
    }

    public function create()
    {
        return view('concert.create');
    }

    public function store(Request $request)
    {
        $messages = makeMessages();
        $this->validate($request, [
            'concert_name' => ['required', 'min:5'],
            'price' => ['required', 'numeric', 'min:20000', 'max:2147483647'],
            'stock' => ['required', 'numeric', 'between:100,400'],
            'date' => ['required', 'unique:concerts,date', 'date', 'after:' . now()->format('d-m-Y')]
        ], $messages);

        Concert::create([
            'concert_name' => $request->concert_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'date' => $request->date
        ]);
        toastr()->success('El concierto fue creado con éxito', 'Concierto creado');

        return redirect()->route('dashboard');
    }

    public function searchDate(Request $request)
    {
        $messages = makeMessages();
        $this->validate($request, [
            'date_search' => ['required']
        ], $messages);

        $date = date($request->date_search);
        if ($date == null) {
            $concerts = Concert::getConcerts();
            return view('client.index', [
                'concerts' => $concerts,
            ]);
        } else {
            $concerts = Concert::where('date', "=", $date)->simplePaginate(1);
            return view('client.index', [
                'concerts' => $concerts
            ]);
        }
    }

    public function concertsList()
    {
        $currentDate = Carbon::now()->format('Y-m-d');

        $concerts = Concert::where('date', '>=', $currentDate)->orderBy('date', 'asc')->get();

        return view('client.index', [
            'concerts' => $concerts,
        ]);
    }

    public function myConcerts()
    {
        return view('client.my_concerts', [
            'user' => auth()->user()
        ]);
    }
}
