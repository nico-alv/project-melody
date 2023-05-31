<?php

use Carbon\Carbon;
use App\Models\Concert;

function makeMessages()
{
    return [
        'concert_name.required' => 'Debe indicar el campo nombre del concierto.',
        'concert_name.min' => 'El campo nombre del concierto no puede ser inferior a 5 carácteres.',
        'name.min' => 'El largo del nombre es inferior a 3 carácteres.',
        'name.required' => 'Debe completar el campo nombre.',
        'email.required' => 'Debe completar el campo correo electrónico.',
        'password.required' => 'Debe completar el campo contraseña.',
        'price.required' => 'Debe indicar el campo precio.',
        'date.required' => 'Debe indicar el campo fecha.',
        'stock.required' => 'Debe indicar el campo stock.',
        'stock.between' => 'El valor ingresado no es numérico o es inferior a 100 o superior a 400.',
        'stock.numeric' => 'El valor ingresado no es numérico o es inferior a 100 o superior a 400.',
        'email.email' => 'Ingrese una dirección de correo electrónico válida.',
        'email.unique' => 'El correo ingresado ya esta existe en el sistema, intente iniciar sesión.',
        'password.min' => 'La contraseña posee menos de 8 carácteres.',
        'price.min' => 'El valor de la entrada no puede ser inferior a $20.000 pesos.',
        'price.numeric' => 'El valor de la entrada debe ser numérico.',
        'name.regex' => 'El nombre contiene carácteres no permitidos, ingrese solo letras.',
        'password.regex' => 'La contraseña ingresada no es alfanumérica.',
        'date.after' => 'La fecha debe ser mayor a ' . now()->format('d-m-Y') . '.',
        'date.unique' => 'Ya existe un concierto para el día ingresado.'
    ];
}
