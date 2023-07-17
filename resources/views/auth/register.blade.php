@extends('layout.app')
@section('title')
Registrar Cliente
@endsection
@section('content')
<div class="max-w-lg mx-auto">
    <div>
        <h2 class="bg-orange-medium-light text-center text-white rounded-t-lg uppercase font-bold text-3xl p-4">Regístrate</h2>
    </div>
    <div>
        <form id="form" action="{{ route('register')}}" method="POST" novalidate class="bg-orange-light shadow-xl rounded-b-lg px-8 py-7">
            @csrf
            <div class="mb-5">
                <label  for="name" class="text-white font-bold"> Nombre </label>
                <div class="flex flex-row">
                    <input id="name" name="name" placeholder="Ingrese su nombre" class="shadow rounded-lg w-full mt-1 py-2 px-3"/>
                    <!-- Tooltip campo nombre -->
                    <img data-tooltip-target="info-name" data-tooltip-placement="right" src="{{ asset('img/info_tooltip.png') }}"
                    class="ml-2 mt-2.5 w-7 h-7" alt="icono_tooltip">
                    <div id="info-name" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-black-light rounded-lg shadow-sm opacity-0 tooltip">
                        El nombre debe contener:
                        <br>
                        <span class="font-extrabold">&middot</span> Solo letras.
                        <br>
                        <span class="font-extrabold">&middot</span> Al menos 3 caracteres.

                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                <!------------------------->
                </div>
                @error('name')
                    <p class="bg-pink-medium-light border border-pink-dark text-white mt-1 px-4 py-2 rounded-full">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="email" class="text-white font-bold"> Correo electrónico </label>
                <div class="flex flex-row">
                    <input id="email" name='email' placeholder="Ingrese su correo electrónico" class="shadow rounded-lg w-full mt-1 py-2 px-3"/>
                    <!-- Tooltip campo email -->
                    <img data-tooltip-target="info-email" data-tooltip-placement="right" src="{{ asset('img/info_tooltip.png') }}"
                        class="ml-2 mt-2.5 w-7 h-7" alt="icono_tooltip">
                    <div id="info-email" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-black-light rounded-lg shadow-sm opacity-0 tooltip">
                        Debe ingresar un correo con el formato:
                        <br>
                        ejemplo@dominio.com
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <!------------------------->
                </div>
                @error('email')
                    <p class="bg-pink-medium-light border border-pink-dark text-white mt-1 px-4 py-2 rounded-full">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="text-white font-bold">Contraseña</label>
                <div class="flex flex-row">
                    <input id="password" name="password" type="password" placeholder="Ingrese su contraseña" class="shadow rounded-lg w-full mt-1 py-2 px-3"/>
                    <!-- Tooltip campo contraseña -->
                    <img data-tooltip-target="info-password" data-tooltip-placement="right" src="{{ asset('img/info_tooltip.png') }}"
                        class="ml-2 mt-2.5 w-7 h-7" alt="icono_tooltip">
                    <div id="info-password" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-black-light rounded-lg shadow-sm opacity-0 tooltip">
                        La contraseña debe contener:
                        <br>
                        <span class="font-extrabold">&middot</span> Al menos una letra y un número.
                        <br>
                        <span class="font-extrabold">&middot</span> Al menos 8 caracteres.
                        <br>
                        La contraseña no debe contener:
                        <br>
                        <span class="font-extrabold">&middot</span> Símbolos ($ , % , & , / , ! , ? , etc.)

                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <!------------------------->
                </div>
                @error('password')
                    <p class="bg-pink-medium-light border border-pink-dark text-white mt-1 px-4 py-2 rounded-full">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-center">
                <div class="flex justify-center rounded-lg bg-yellow-medium-light hover:bg-yellow-light transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-lg hover:scale-110 mt-2">
                    <button id="button" type="button" class="text-black font-medium text-center py-2 px-4">Crear cuenta</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('alert')
    <script src="/js/doubleCommitMessage.js"></script>
@endsection

