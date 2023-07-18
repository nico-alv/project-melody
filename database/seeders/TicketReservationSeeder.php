<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Concert;
class TicketReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario1 = User::findOrFail(3);
        $usuario2 = User::findOrFail(2);
        $concierto1 = Concert::findOrfail(1);
        $concierto2 = Concert::findOrfail(3);

        $cantTickets = mt_rand(1, 5);
        $numeroReserva = mt_rand(1000, 9999);
        DB::table('ticket_reservations')->insert([
            'reservation_number' => $numeroReserva,
            'ticket_quantity' => $cantTickets,
            'payment_method' => 'Efectivo',
            'total' => $concierto1->price*$cantTickets,
            'purchase_date' => now(),
            'user_id' => $usuario1->id,
            'concert_id' => $concierto1->id,
        ]);
        Ticket::crearConPDF($numeroReserva, $usuario1);

        $cantTickets = mt_rand(1, 5);
        $numeroReserva = mt_rand(1000, 9999);
        DB::table('ticket_reservations')->insert([
            'reservation_number' => $numeroReserva,
            'ticket_quantity' => $cantTickets,
            'payment_method' => 'Tarjeta de débito',
            'total' => $concierto1->price*$cantTickets,
            'purchase_date' => now(),
            'user_id' => $usuario2->id,
            'concert_id' => $concierto1->id,
        ]);
        Ticket::crearConPDF($numeroReserva, $usuario2);

        $cantTickets = mt_rand(1, 5);
        $numeroReserva = mt_rand(1000, 9999);
        DB::table('ticket_reservations')->insert([
            'reservation_number' => $numeroReserva,
            'ticket_quantity' => $cantTickets,
            'payment_method' => 'Efectivo',
            'total' => $concierto2->price*$cantTickets,
            'purchase_date' => now(),
            'user_id' => $usuario1->id,
            'concert_id' => $concierto2->id,
        ]);
        Ticket::crearConPDF($numeroReserva, $usuario1);

        $cantTickets = mt_rand(1, 5);
        $numeroReserva = mt_rand(1000, 9999);
        DB::table('ticket_reservations')->insert([
            'reservation_number' => $numeroReserva,
            'ticket_quantity' => $cantTickets,
            'payment_method' => 'Tarjeta de débito',
            'total' => $concierto2->price*$cantTickets,
            'purchase_date' => now(),
            'user_id' => $usuario2->id,
            'concert_id' => $concierto2->id,
        ]);
        Ticket::crearConPDF($numeroReserva, $usuario2);
    }
}
