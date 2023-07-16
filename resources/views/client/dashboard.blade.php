@extends('layout.app')
@section('title')
    Dashboard {{ auth()->user()->name }}
@endsection
@section('title-page')
    Bienvenido {{ auth()->user()->name }}
@endsection
@section('content')
    <div class="md:flex-col md:justify-center bg-orange-medium-light p-6 rounded-lg shadow-lg ">
        <h2 class="text-center text-white font-medium text-2xl mb-2 py-4">Selecciona una opción</h2>
        <div class="md:flex md:justify-center pb-4">
            <div>
                <a href="{{ route('concert.list') }}"
                    title="Ir a la lista de conciertos"
                    class="text-center text-black font-bold p-3 mx-3 rounded bg-yellow-medium-light  hover:bg-yellow-medium-dark transition">Ver conciertos</a>
            </div>

            <div>
                <a href="{{ route('client.concerts') }}"
                    title="Ver historial de entradas compradas"
                    class="text-center text-black font-bold p-3 mx-3 rounded bg-yellow-medium-light hover:bg-yellow-medium-dark transition">Mis conciertos</a>
            </div>
        </div>
    </div>
@endsection
