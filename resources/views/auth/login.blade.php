@extends('layout.app')
@section('title')
Iniciar Sesión
@endsection
@section('content')
<div class="flex md:flex-row md:justify-center ">
    <div class="md:w-2/3 bg-gradient-to-r from-orange-light to-orange-dark  p-6 rounded-xl shadow-lg  ">
        <form action="{{route('login')}}" method="POST" novalidate>
            <div class = "">
                <h2 class="bg-orange-medium-light text-center  uppercase font-bold text-3xl p-4 rounded-xl">Iniciar Sesión</h2>
            </div>
            @csrf
            @if (session('message'))
                <p>{{ session('message') }}</p>
            @endif
            <div class="mb-6">
                <label for="email" class="text-black-dark font-bold"> Correo electrónico </label>
                <input id="email" name='email' placeholder="Ingrese su correo electrónico" class="shadow rounded-lg w-full mt-1 py-2 px-3"/>
                @error('email')
                    <p class="bg-pink-medium-light border border-pink-dark text-pink-dark mt-1 px-4 py-2 rounded-full">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="text-black-dark font-bold">Contraseña</label>
                <input id="password" name="password" type="password" placeholder="Ingrese su contraseña" class="shadow rounded-lg w-full mt-1 py-2 px-3"/>
                @error('password')
                    <p class="bg-pink-medium-light border border-pink-dark text-pink-dark mt-1 px-4 py-2 rounded-full">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-center bg-yellow-medium-light hover:bg-yellow-light rounded-lg">
                <button type="submit" class="text-black font-medium rounded-lg text-sm p-3 text-center w-full">Iniciar Sesión</button>
            </div>
        </form>
    </div>
@endsection
