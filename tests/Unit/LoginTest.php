<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Prueba el inicio de sesión fallido.
     *
     * @return void
     */
    public function testSuccessLogin()
    {
        $user = User::create([
            'name' => 'usertest',
            'email' => 'usertest@correo.com',
            'role' => 1,
            'password' => bcrypt('1234567k')
        ]);


        $response = $this->post('/login', [
            'email' => 'usertest@correo.com',
            'password' => '1234567k',
        ]);

        $response->assertStatus(302); // Verifica el código de estado de la respuesta (redirección)
        $response->assertRedirect('dashboard'); // Verifica que se redirija a la página de dashboard
        $this->assertAuthenticatedAs($user); // Verifica que el usuario esté autenticado
    }

    public function testfailSuccessLogin()
{
    $user = User::create([
        'name' => 'usertest1',
        'email' => 'usertest1@correo.com',
        'role' => 1,
        'password' => bcrypt('1234567k')
    ]);

    $response = $this->post('/login', [
        'email' => 'usertest1@correo.com',
        'password' => '1234567p',
    ]);

    $response->assertStatus(302); // Verifica el código de estado de la respuesta (redirección)
    $this->assertGuest(); // Verifica que el usuario no esté autenticado
}
}
