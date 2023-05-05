<?php

use Carbon\Carbon;
use App\Models\Concert;

function makeMessages()
{
    $messages = [
        'name.required' => 'Debe completar el campo nombre',
        'name.min' => 'El largo el nombre es inferior a 3 carácteres',
        'name.regex' => 'El nombre contiene carácteres no permitidos.Ingrese solo letras',
        'email.email' => 'Ingrese un correo electrónico válido',
        'email.unique' => 'El correo ingresado ya existe en el sistema. Intente Iniciar sesión',
        'email.required' => 'Debe completar el campo correo electrónico',
        'password.regex' => 'La contraseña ingresada no es alfanumérica',
        'password.min' => 'La contraseña posee menos de 8 carácteres',
        'password.required' => 'Debe completar el campo contraseña',
        'price.required' => 'El campo precio es obligatorio.',
        'date.required' => 'El campo fecha es obligatorio.',
        'stock.required' => 'El campo stock es obligatorio.',
        'stock.between' => 'El rango de entradas es de 100 y 400.',
        'price.min' => 'El valor de la entrada debe ser de al menos $:min.'
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
