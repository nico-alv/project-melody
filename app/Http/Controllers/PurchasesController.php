<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Concert;
use App\Models\Ticket_reservation;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{

    public function index()
    {
    $concerts = Concert::with(['ticketReservations' => function ($query)
    {
        $query->selectRaw('concert_id, sum(ticket_quantity) as entradas_vendidas, sum(total) as monto_total_vendido')->groupBy('concert_id');
    }])->get();

    return view('purchases.index', [
        'concerts' => $concerts,
        'count' => $concerts->count()
    ]);
    }
    public function concertClients($id)
    {

        $concert = Concert::find($id);

        // Obtener los detalles de orden para el concierto seleccionado mediante su id
        $ticket_reservations = Ticket_reservation::where('concert_id', $id)->get();

        // Obtener los usuarios relacionados con los detalles de orden
        $clients = User::whereIn('id', $ticket_reservations->pluck('user_id'))->get();


        return view('purchases.concert_clients', [
            'concert'=> $concert,
            'ticket_reservations' => $ticket_reservations,
            'clients' => $clients
        ]);
    }



}
