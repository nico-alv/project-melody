<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Ticket_Reservation;
use App\Models\User;
use App\Models\Concert;
use Carbon\Carbon;

class TicketReservationTest extends TestCase
{
    protected function tearDown(): void
    {
        $user = User::where('email', 'testuser@correo.com')->first();
        $concert = Concert::where('concert_name', 'Concierto de prueba')->first();
        $ticketReservation = Ticket_Reservation::where('reservation_number', '9999')->first();
        if ($ticketReservation) {
            $ticketReservation->delete();
        }
        if ($user) {
            $user->delete();
        }
        if ($concert) {
            $concert->delete();
        }
        parent::tearDown();
    }
    public function testDuplicateReservationNumber(){
        $user = User::create([
            'name' => 'usuario de prueba',
            'email' => 'testuser@correo.com',
            'role' => 'Usuario',
            'password' => bcrypt('1234567k')
        ]);
        $response = $this->post('/login', [
            'email' => 'testuser@correo.com',
            'password' => '1234567k'
        ]);
        $this->assertAuthenticatedAs($user);
        $concert = Concert::create([
            'concert_name' => 'Concierto de prueba',
            'price' => 1000000,
            'stock' => 100,
            'date' => Carbon::today()->addDays(rand(10, 30))->format('Y-m-d')
        ]);
        /*
        $ticketReservationData = [
            'reservation_number' => 9999,
            'ticket_quantity' => 1,
            'payment_method' => 'Efectivo',
            'total' => 25000,
            'purchase_date' => Carbon::today()->addDays(rand(3, 30))->format('Y-m-d'),
            'user_id' => $user->id,
            'concert_id' => $concert->id
        ];
        */
        $ticketReservation = Ticket_Reservation::create([
            'reservation_number' => 9999,
            'ticket_quantity' => 1,
            'payment_method' => 'Efectivo',
            'total' => 25000,
            'purchase_date' => Carbon::today()->addDays(rand(3, 30))->format('Y-m-d'),
            'user_id' => $user->id,
            'concert_id' => $concert->id
        ]);
        //$response = $this->post(route('concert.order.pay', ['id' => $concert->id]), $ticketReservationData);
        assertSessionDoesntHaveErrors('reservation_number');
        //$response = $this->post(route('concert.order.pay', ['id' => $concert->id]), $ticketReservationData);
        assertSessionHasErrors('reservation_number');
    }
}
