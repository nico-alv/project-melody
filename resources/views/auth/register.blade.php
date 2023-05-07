@extends('layout.app')
@section('title')
Registrar Cliente
@endsection
@section('content')
<div class="max-w-lg mx-auto">
    <div>
        <h2 class="bg-orange-medium-light text-center rounded-t-lg uppercase font-bold text-3xl p-4">Registrate</h2>
    </div>
    <div>
        <form action="{{ route('register')}}" method="POST" novalidate class="bg-orange-light shadow-xl rounded-b-lg px-8 py-7">
            @csrf
            <div class="mb-5">
                <label  for="name" class="text-black-dark font-bold"> Nombre </label>
                <input id="name" name="name" placeholder="Ingrese su nombre" class="shadow rounded-lg w-full mt-1 py-2 px-3"/>
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="email" class="text-black-dark font-bold"> Correo electrónico </label>
                <input id="email" name='email' placeholder="Ingrese su correo electrónico" class="shadow rounded-lg w-full mt-1 py-2 px-3"/>
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="text-black-dark font-bold" for="password">Contraseña</label>
                <input id="password" type="password" placeholder="Ingrese su contraseña" class="shadow rounded-lg w-full mt-1 py-2 px-3"/>
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-center">
                <div class="flex justify-center rounded-lg bg-yellow-medium-light hover:bg-yellow-light transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-lg hover:scale-110 mt-2">
                    <button type="submit" class="text-black font-medium text-center py-2 px-4">Crear cuenta</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
