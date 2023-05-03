<?php

function makeMessages()
{
    $messages =[
        'name.required' => 'Debe completar el campo nombre',
        'name.min' => 'El largo el nombre es inferior a 3 carácteres',
        'name.regex' => 'El nombre contiene carácteres no permitidos.Ingrese solo letras',
        'email.email' => 'Ingrese un correo electrónico válido',
        'email.unique' => 'El correo ingresado ya existe en el sistema. Intente Iniciar sesión',
        'email.required' => 'Debe completar el campo correo electrónico',
        'password.regex' => 'La contraseña ingresada no es alfanumérica',
        'password.min' => 'La contraseña posee menos de 8 carácteres',
        'password.required' => 'Debe completar el campo contraseña'
    ];

    return $messages;
}
