<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class RegisterTest extends TestCase
{

    protected function tearDown(): void
    {
        $user = User::where('email', 'Italo.gonzalez@example.com')->first();
        if ($user) {
            $user->delete(); // Elimina el usuario de la base de datos
        }

        parent::tearDown();
    }

    public function testUserCreation()
    {
        $userData = [
            'name' => 'It',
            'email' => 'italo.gonzalez.com',
            'password' => 'pass123',
        ];

        //Registro con campos invalidos
        $response = $this->post('/register', $userData);
        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'name',
            'email',
            'password'
        ]);
    }

    public function testSuccessfulRegister()
    {
        $userData = [
            'name' => 'Italo Gonzalez',
            'email' => 'Italo.gonzalez@example.com',
            'password' => 'password123',
        ];

        $response = $this->post('/register', $userData);

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');
    }

    public function testNonAlphanumericPass()
    {
        $userData = [
            'name' => 'Italo Gonzalez',
            'email' => 'Italo.gonzalez@example.com',
            'password' => 'passwo#rd123', // Clave con carácter no alfanumérico ($)
        ];

        $response = $this->post('/register', $userData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('password');
    }
}
