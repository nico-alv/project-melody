<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\Ticket_reservation;
use Illuminate\Http\Request;

class TicketReservationController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $concert = Concert::find($id);
        if (!$concert) {
            return redirect()->route('error-404'); // Redirigir a la página 404
        }
        return view('client.create', [
            'concert' => $concert
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {

        $reservation_number = generateReservationNumber();

        $request->request->add(['reservation_number' => $reservation_number]);


        $messages = makeMessages();
        $this->validate($request, [
            'ticket_quantity' => ['required', 'numeric', 'min:1'],
            'payment_method' => ['required'],
            'total' => ['required']
        ], $messages);

        $validStock = verifyStock($id, $request->quantity);

        if (!$validStock) {
            return back()->with('message', 'No se dispone del stock suficiente para este concierto.');
        }

        $ticket_reservation = Ticket_reservation::create([
            'reservation_number' => $request->reservation_number,
            'ticket_quantity' => $request->ticket_quantity,
            'payment_method' => $request->payment_method,
            'total' => $request->total,
            'purchase_date' => now(),
            'user_id' => auth()->user()->id,
            'concert_id' => $id
        ]);
        discountStock($id, $request->ticket_quantity);

        return redirect()->route('generate.pdf', [
            'id' => $ticket_reservation->id
        ]);
    }
}
