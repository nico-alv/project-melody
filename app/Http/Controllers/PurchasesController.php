<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\Ticket_reservation;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{

    public function index()
    {
        $concerts = Concert::withCount(['ticketReservations as entradas_vendidas' => function ($query) {
            $query->selectRaw('sum(ticket_quantity) as total');
        }])
        ->with(['ticketReservations' => function ($query) {
            $query->selectRaw('concert_id, sum(ticket_quantity) as entradas_disponibles')
                ->groupBy('concert_id');
        }])
        ->get();

        return view('purchases.index', [
            'concerts' => $concerts,
            'count' => $concerts->count() // Otra forma de obtener el contador
        ]);
        
    }
}
