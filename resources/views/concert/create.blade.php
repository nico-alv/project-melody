@extends('layout.app')
@section('title')
Registrar Concierto
@endsection
@section('content')

<div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-gray-200 p-6 rounded-lg shadow-lg">
        <h2 class="text-center uppercase font-bold text-3xl p-4">Registre un concierto</h2>
        <form action="{{ route('concert.index') }}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-white font-bold">
                    Nombre
                </label>
                <input id="name" name="name"
                    class="border p-2 rounded-lg w-full
            @error('name') border-red-600
            @enderror" value="{{ old('name') }}" >
                @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-lg text-center p-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="price" class="mb-2 block uppercase text-white font-bold">
                    Precio
                </label>
                <input id="price" name="price"
                    class="border p-2 rounded-lg w-full
            @error('price') border-red-600
            @enderror" value="{{ old('price') }}">
                @error('price')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-lg text-center p-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="stock" class="mb-2 block uppercase text-white font-bold">
                    Stock
                </label>
                <input id="stock" name="stock" type="text"
                    class="border p-2 rounded-lg w-full
            @error('stock') border-red-600
            @enderror" value="{{ old('stock') }}">
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
                class="bg-yellow-400 hover:bg-yellow-600 transition-all cursor-pointer uppercase font-bold text-black rounded w-full p-3">
        </form>
    </div>
</div>

@endsection
