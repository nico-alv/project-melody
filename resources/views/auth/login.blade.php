@extends('layout.app')
@section('title')
Inicia sesion
@endsection
@section('content')
<div class="max-w-lg mx-auto">
    <div>
        <h2 class="bg-orange-medium-light text-center rounded-t-lg uppercase font-bold text-3xl p-4"> Inicia sesion </h2>
    </div>
    <div>
        <form action="{{ route('login')}}" method="POST" novalidate class="bg-orange-light shadow-xl rounded-b-lg px-8 py-7">
            @csrf
            <div class="mb-5">
                <label for="email" class="text-black-dark font-bold"> Correo electrónico </label>
                <input id="email" name='email' placeholder="Ingrese su correo electrónico" class="shadow rounded-lg w-full mt-1 py-2 px-3"/>
                @error('email')
                    <p class="bg-pink-medium-light border border-pink-dark text-pink-dark mt-1 px-4 py-2 rounded-full">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="text-black-dark font-bold">Contraseña</label>
                <input id="password" name="password" type="password" placeholder="Ingrese su contraseña" class="shadow rounded-lg w-full mt-1 py-2 px-3"/>
                @error('password')
                    <p class="bg-pink-medium-light border border-pink-dark text-pink-dark mt-1 px-4 py-2 rounded-full">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-center">
                <div class="flex justify-center rounded-lg bg-yellow-medium-light hover:bg-yellow-light transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-lg hover:scale-110 mt-2">
                    <button type="submit" class="text-black font-medium text-center py-2 px-4">Iniciar sesion</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
