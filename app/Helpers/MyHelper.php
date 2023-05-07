<?php

use Carbon\Carbon;
use App\Models\Concert;

function makeMessages()
{
    $messages = [
        'concert_name.required' => 'Debe indicar el campo nombre del concierto.',
        'concert_name.min' => 'El campo nombre del concierto no puede ser inferior a 5 caracteres.',
        'name.min' => 'El largo el nombre es inferior a 3 carácteres.',
        'name.required' => 'Debe completar el campo nombre.',
        'email.required' => 'Debe completar el campo email.',
        'password.required' => 'Debe completar el campo contraseña.',
        'price.required' => 'Debe indicar el campo precio.',
        'date.required' => 'Debe indicar el campo fecha.',
        'stock.required' => 'Debe indicar el campo stock.',
        'stock.between' => 'El valor ingresado no es numérico o es inferior a 100 o superior a 400.',
        'stock.numeric' => 'El valor ingresado no es numérico o es inferior a 100 o superior a 400.',
        'email.email' => 'Ingrese una dirección de correo electrónico válida',
        'email.unique' => 'El correo ingresado ya esta existe en el sistema, Intente Iniciar sesión',
        'password.min' => 'La contraseña posee menos de 8 carácteres',
        'price.min' => 'El valor de la entrada no puede ser inferior a $20.000 pesos.',
        'name.regex' => 'El nombre contiene carácteres no permitidos, Ingrese solo letras',
        'password.regex' => 'La contraseña ingresada no es alfanumérica',

    ];

    return $messages;
}

function validDate($date)
{
    $fechaActual = date("d-m-Y");
    $fechaVerificar = Carbon::parse($date);

    if ($fechaVerificar->lessThanOrEqualTo($fechaActual)) {
        return true;
    }

    return false;
}

function existConcertDay($date_concert)
{
    $concerts = Concert::getConcerts();
    $date = date($date_concert);

    foreach ($concerts as $concert) {

        if ($concert->date == $date) {
            return true;
        }
    }
    return false;
}
