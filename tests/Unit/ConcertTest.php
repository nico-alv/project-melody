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

    public function testInvalidConcertPrice()
    {
        $admin = User::create([
            'name' => 'admin de prueba',
            'email' => 'admin@correo.com',
            'role' => 'Administrador',
            'password' => bcrypt('1234567k')
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@correo.com',
            'password' => '1234567k',
        ]);
        $this->assertAuthenticatedAs($admin);
        $concertData = [
            'concert_name' => 'Concierto de prueba',
            'price' => 1,
            'stock' => 100,
            'date' => Carbon::today()->addDays(rand(3, 30))->format('Y-m-d')
        ];
        $response = $this->post('/concert', $concertData);
        $response->assertSessionHasErrors('price');
        $response->assertSessionDoesntHaveErrors('date');
    }

    public function testInvalidConcertCreatorUser()
    {
        $admin = User::create([
            'name' => 'usuario de prueba',
            'email' => 'testuser@correo.com',
            'role' => 'Usuario',
            'password' => bcrypt('1234567k')
        ]);

        $response = $this->post('/login', [
            'email' => 'testuser@correo.com',
            'password' => '1234567k',
        ]);
        $this->assertAuthenticatedAs($admin);
        $concertData = [
            'concert_name' => 'Concierto de prueba',
            'price' => 1,
            'stock' => 100,
            'date' => Carbon::today()->addDays(rand(3, 30))->format('Y-m-d')
        ];
        $response = $this->post('/concert', $concertData);
        $response->assertStatus(302);
    }
}
