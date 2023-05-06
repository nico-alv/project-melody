@extends('layout.app')
@section('title')
Registrar Concierto
@endsection
@section('content')

<div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-purple-200 p-6 rounded-lg shadow-lg">
        <h2 class="text-center uppercase font-bold text-3xl p-4">Registre un concierto</h2>
        <form action="{{ route('concert') }}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
                <label for="concert_name" class="mb-2 block uppercase text-white font-bold">
                    Nombre
                </label>
                <input class="border p-2 rounded-lg w-full h-19 @error('concert_name') border-red-600 @enderror" id="concert_name" type="text" placeholder="Nombre" name="concert_name" value="{{ old('concert_name') }}" required> 
                @error('concert_name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-lg text-center p-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="price" class="mb-2 block uppercase text-white font-bold">
                    Precio
                </label>
                <input class="border p-2 rounded-lg w-full h-15 @error('price') border-red-600 @enderror" id="price" type="text" placeholder="Precio" name="price" value="{{ old('price') }}" required>
                @error('price')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-lg text-center p-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="stock" class="mb-2 block uppercase text-white font-bold">
                    Stock
                </label>
                <input class="border p-2 rounded-lg w-full h-19 @error('stock') border-red-600 @enderror" id="stock" type="text" placeholder="Stock" name="stock" value="{{ old('stock') }}" required>
                @error('stock')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-lg text-center p-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="date" class="mb-2 block uppercase text-white font-bold">
                    Fecha
                </label>
                <input id="date" name="date" type="date" onkeydown="return false"
                    class="border p-2 rounded-lg w-full
            @error('date') border-red-600
            @enderror" value="{{ old('date') }}">
                @error('date')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-lg text-center p-2">{{ $message }}</p>
                @enderror
                @if (session('message'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-lg text-center p-2">
                        {{ session('message') }}</p>
                @endif
            </div>
            <input type="submit" value="Crear Concierto"
                class="bg-purple-400 hover:bg-blue-600 transition-all cursor-pointer uppercase font-bold text-black rounded w-full p-3">
        </form>
    </div>
</div>

@endsection
