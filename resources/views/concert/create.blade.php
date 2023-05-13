@extends('layout.app')
@section('title')
Registrar Concierto
@endsection
@section('content')
<div class="max-w-lg mx-auto">
    <div>
        <h2 class="bg-orange-medium-light text-center rounded-t-lg uppercase font-bold text-3xl p-4">Registrar concierto</h2>
    </div>
    <div>
        <form action="{{ route('concert') }}" method="POST" novalidate class="bg-orange-light shadow-xl rounded-b-lg px-8 py-7">
            @csrf
            <div class="mb-5">
                <label for="concert_name" class="text-black-dark font-bold">Nombre</label>
                <input id="concert_name" name="concert_name" placeholder="Ingrese el nombre" class="shadow rounded-lg w-full mt-1 py-2 px-3">
                @error('concert_name')
                <p class="bg-pink-medium-light border border-pink-dark text-pink-dark mt-1 px-4 py-2 rounded-full">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="price" class="text-black-dark font-bold">Precio</label>
                <input id="price" name="price" placeholder="Ingrese el precio" class="shadow rounded-lg w-full mt-1 py-2 px-3">
                @error('price')
                    <p class="bg-pink-medium-light border border-pink-dark text-pink-dark mt-1 px-4 py-2 rounded-full">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="stock" class="text-black-dark font-bold">
                    Stock
                </label>
                <input id="stock" placeholder="Ingrese el stock" name="stock" class="shadow rounded-lg w-full mt-1 py-2 px-3">
                @error('stock')
                <p class="bg-pink-medium-light border border-pink-dark text-pink-dark mt-1 px-4 py-2 rounded-full">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="date" class="text-black-dark font-bold">Fecha</label>
                <input id="date" name="date" type="date" onkeydown="return false" class="shadow rounded-lg w-full mt-1 py-2 px-3">
                @error('date')
                <p class="bg-pink-medium-light border border-pink-dark text-pink-dark mt-1 px-4 py-2 rounded-full">{{ $message }}</p>
                @enderror
                @if (session('message'))
                    <p class="bg-pink-medium-light border border-pink-dark text-pink-dark mt-1 px-4 py-2 rounded-full">{{ session('message') }}</p>
                @endif
            </div>
            <div class="flex justify-center">
                <div class="flex justify-center rounded-lg bg-yellow-medium-light hover:bg-yellow-light transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-lg hover:scale-110 mt-2">
                    <button type="submit" class="text-black font-medium text-center py-2 px-4">Crear concierto</button>
                </div>
            </div>
        </form>
    </div>
 </div>
</div>
@endsection
