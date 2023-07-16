<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Concert;
use App\Models\Ticket_reservation;
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

            $concerts = Concert::where('date', '>', $currentDate)->orderBy('date', 'asc')->get();

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

        $date = date($request->date_search);

        $currentDate = Carbon::now()->format('Y-m-d');

        $concerts = Concert::where('date', '>', $currentDate);


        if (!empty($date)) {
            $concerts->whereDate('date', $date);
        }

        $concerts = $concerts->get();

        $concerts = $concerts->sortBy('date')->sortBy(function ($concert) {
            return $concert->stock > 0 ? 0 : 1;
        });

        if ($concerts->count() > 0) {
            return view('client.index', [
                'concerts' => $concerts,
                'date' => $date,
            ]);
        } else {
            return view('client.index', [
                'concerts' => $concerts,
                'date' => $date,
                'errorMessage' => 'No hay conciertos disponibles para el día seleccionado. Intenta con otra fecha o recarga la página.',
            ]);
        }
    }

    public function concertsList()
    {
        $currentDate = Carbon::now()->format('Y-m-d');

        $concerts = Concert::where('date', '>', $currentDate)->get();

        $concerts = $concerts->sortBy('date')->sortBy(function ($concert) {
            return $concert->stock > 0 ? 0 : 1;
        });

        return view('client.index', [
            'concerts' => $concerts,
        ]);
    }

    public function myConcerts()
    {
        $user = auth()->user();
        $count_1 = 0;
        for ($i = 0; $i < count($user->concertsClient); $i++) {
            $count_1 += 1;
        }
        return view('client.my_concerts', [
            'user' => auth()->user(),
            'count' => $count_1
        ]);
    }

    public function clients()
    {
        $client = null;
        return view('admin.clients', [
            'message' => null,
            'client' => $client,
            'ticket_reservations' => null
        ]);
    }

    public function searchClient(Request $request)
    {
        $email = $request->email_search;
        $client = User::where('email',"=",$email)->first();
        if(!$client){
            return view('admin.clients', [
                'message' => 'El correo electrónico no existe.',
                'client' => $client,
                'ticket_reservations' => null
            ]);
        } else {
            $ticket_reservations = Ticket_reservation::where('user_id', $client->id)->paginate(5);
            return view('admin.clients', [
                'mesage' => null,
                'client' => $client,
                'ticket_reservations' => $ticket_reservations
            ]);
        }
    }
}
