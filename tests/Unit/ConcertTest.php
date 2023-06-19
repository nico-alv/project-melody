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

        if ($user) {
            $user->delete();
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
        $response->assertStatus(302);
        $this->assertAuthenticatedAs($admin);
        $concertData = [
            'concert_name' => 'Concierto de prueba',
            'price' => 1,
            'stock' => 100,
            'date' => Carbon::today()->addDays(rand(3, 30))->format('Y-m-d')
        ];
        $response = $this->post('/concert', $concertData);
        $response->assertSessionHasError('date');
    }
}
