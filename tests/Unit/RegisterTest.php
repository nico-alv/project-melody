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
            'name' => '2t',
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

    public function testEmptyFields()
    {
        $userData = [
            'name' => '',
            'email' => '',
            'password' => '',
        ];

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

    public function testUniqueEmail()
    {
        // Primero, creamos un usuario en la base de datos con el correo electrónico dado

        $userData = [
            'name' => 'Italo Gonzalez',
            'email' => 'Italo.gonzalez@example.com',
            'password' => 'password123',
        ];

        $response = $this->post('/register', $userData);


        $userData = [
            'name' => 'Italo Gonzalez',
            'email' => 'Italo.gonzalez@example.com', // Usamos el mismo correo electrónico
            'password' => 'password123',
        ];

        $response = $this->post('/register', $userData);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }
}
