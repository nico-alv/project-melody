<?php

namespace App\Http\Controllers;

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

}
