@extends('layout.app')

@section('title')
    Dashboard {{ auth()->user()->name }}
@endsection

@section('content')
    <div class="md:flex-col md:justify-center bg-teal-700 p-6 rounded-lg shadow-lg ">
        <h2 class="text-center text-white uppercase font-bold text-3xl p-6">Selecciona una opción</h2>
        <div class="md:flex md:justify-evenly">
            <div>
                <a href="https://www.youtube.com/playlist?list=PLzmzDS3JCHZ-yV3ZL47b_fanch7ICExU6"
                    class="text-center text-black font-bold p-3 bg-blue-500 rounded hover:bg-blue-800 transition">Ver conciertos</a>
            </div>

            <div>
                <a href="{{ route('client.concerts') }}"
                    class="text-center text-black font-bold p-3 bg-blue-500 rounded hover:bg-blue-800 transition">Mis conciertos</a>
            </div>
        </div>
    </div>
@endsection
