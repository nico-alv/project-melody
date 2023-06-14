<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use Illuminate\Http\Request;

class TicketReservationController extends Controller
{
    public function create($id)
    {
        $concert = Concert::find($id);
        return view('client.create', [
            'concert' => $concert
        ]);
    }
}
