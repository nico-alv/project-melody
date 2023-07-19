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
        $user1 = User::findOrFail(3);
        $user2 = User::findOrFail(2);
        $concert1 = Concert::findOrfail(1);
        $concert2 = Concert::findOrfail(3);

        $ticketQuantity = mt_rand(1, 5);
        $reservationNumber = mt_rand(1000, 9999);
        DB::table('ticket_reservations')->insert([
            'reservation_number' => $reservationNumber,
            'ticket_quantity' => $ticketQuantity,
            'payment_method' => 'Efectivo',
            'total' => $concert1->price*$ticketQuantity,
            'purchase_date' => now(),
            'user_id' => $user1->id,
            'concert_id' => $concert1->id,
        ]);
        Ticket::createWithPDF($reservationNumber, $user1);

        $ticketQuantity = mt_rand(1, 5);
        $reservationNumber = mt_rand(1000, 9999);
        DB::table('ticket_reservations')->insert([
            'reservation_number' => $reservationNumber,
            'ticket_quantity' => $ticketQuantity,
            'payment_method' => 'Tarjeta de débito',
            'total' => $concert1->price*$ticketQuantity,
            'purchase_date' => now(),
            'user_id' => $user2->id,
            'concert_id' => $concert1->id,
        ]);
        Ticket::createWithPDF($reservationNumber, $user2);

        $ticketQuantity = mt_rand(1, 5);
        $reservationNumber = mt_rand(1000, 9999);
        DB::table('ticket_reservations')->insert([
            'reservation_number' => $reservationNumber,
            'ticket_quantity' => $ticketQuantity,
            'payment_method' => 'Efectivo',
            'total' => $concert2->price*$ticketQuantity,
            'purchase_date' => now(),
            'user_id' => $user1->id,
            'concert_id' => $concert2->id,
        ]);
        Ticket::createWithPDF($reservationNumber, $user1);

        $ticketQuantity = mt_rand(1, 5);
        $reservationNumber = mt_rand(1000, 9999);
        DB::table('ticket_reservations')->insert([
            'reservation_number' => $reservationNumber,
            'ticket_quantity' => $ticketQuantity,
            'payment_method' => 'Tarjeta de débito',
            'total' => $concert2->price*$ticketQuantity,
            'purchase_date' => now(),
            'user_id' => $user2->id,
            'concert_id' => $concert2->id,
        ]);
        Ticket::createWithPDF($reservationNumber, $user2);
    }
}
