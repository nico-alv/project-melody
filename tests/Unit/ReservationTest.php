<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Ticket_reservation;
use Carbon\Carbon;

class ConcertTest extends TestCase
{
    public function testSuccessfulReservation()
    {
        
        $response = $this->post('/login', [
            'email' => 'italo.donoso@ucn.cl',
            'password' => 'Melody91',
        ]);
        $this->assertAuthenticatedAs($admin);
        $concert = [
            'concert_name' => 'Italo on the floor',
            'price' => 1000000,
            'stock' => 100,
            'date' => Carbon::today()->addDays(9)->format('Y-m-d')
        ];
        $reservation = [
            'ticket_quantity' => 1,
            'payment_method' => 'Efectivo',
            'total' => 1,
            'purchase_date' => now(),
            'user_id' =>

        ]
        $response = $this->post('/concert', $concert);
        $response->assertSessionDoesntHaveErrors([
            'concert_name',
            'price',
            'stock',
            'date'
        ]);
        $response->assertRedirect('/dashboard');
    }

}
