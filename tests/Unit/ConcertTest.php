<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Concert;
use App\Models\User;
use Carbon\Carbon;

class ConcertTest extends TestCase
{
    protected function tearDown(): void
    {
        $user = User::where('name', 'admin de prueba')->first();
        $concert = Concert::where('concert_name', 'Concierto de prueba')->first();
        if ($user) {
            $user->delete();
        }
        if ($concert) {
            $concert->delete();
        }
        parent::tearDown();
    }


    public function testSuccessfulConcertCreation()
    {
        $admin = User::create([
            'name' => 'admin de prueba',
            'email' => 'testadmin@correo.com',
            'role' => 'Administrador',
            'password' => bcrypt('1234567k')
        ]);
        $response = $this->post('/login', [
            'email' => 'testadmin@correo.com',
            'password' => '1234567k',
        ]);
        $this->assertAuthenticatedAs($admin);
        $concertData = [
            'concert_name' => 'Concierto de prueba',
            'price' => 1000000,
            'stock' => 100,
            'date' => Carbon::today()->addDays(rand(3, 30))->format('Y-m-d')
        ];
        $response = $this->post('/concert', $concertData);
        $response->assertSessionDoesntHaveErrors([
            'concert_name',
            'price',
            'stock',
            'date'
        ]);
        $response->assertRedirect('/dashboard');
    }


    public function testInvalidConcertPrice()
    {
        $response = $this->post('/login', [
            'email' => 'italo.donoso@ucn.cl',
            'password' => 'Melody91',
        ]);
        $response->assertStatus(302);
        $concert = [
            'concert_name' => 'prueba',
            'price' => 1,
            'stock' => 100,
            'date' => Carbon::today()->addDays(5)->format('Y-m-d')
        ];
        $response = $this->post('/concert', $concert);
        $response->assertSessionHasErrors('price');
    }
}
