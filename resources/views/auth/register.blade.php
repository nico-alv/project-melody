@extends('layout.app')
@section('title')
Registrar Cliente
@endsection
@section('content')

<div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-gray-200 p-6 rounded-lg shadow-lg">
        <h2 class="text-center uppercase font-bold text-3xl p-4">Registro</h2>
        <form action="{{ route('register')}}" method="POST" novalidate>
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-red-custom-50 dark:text-white">Nombre</label>
                <input id="name" name="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Ingresa tu nombre">
                @error('name')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo electrónico</label>
                <input id="email" name='email' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="ejemplo@ejemplo.com">
                @error('email')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                <input id="password"  name="password" type="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Ingresa tu contraseña">
                @error('password')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-center bg-orange-dark hover:bg-green-dark rounded-lg">
                <button type="submit" class="text-black font-medium rounded-lg text-sm p-3 text-center w-full">Crear cuenta</button>
            </div>
            <p class="flex justify-center text-sm font-light text-gray-500 mt-1">
                ¿Ya tienes una cuenta?&nbsp<a href="{{route('login')}}" class="font-medium text-primary-600 hover:underline">Inicia sesión aquí</a>
            </p>
            </div>
        </form>
    </div>
</div>

@endsection
