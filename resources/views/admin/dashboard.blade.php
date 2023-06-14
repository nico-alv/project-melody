@extends('layout.app')

@section('title')
    {{ auth()->user()->name }}
@endsection

@section('content')
    @if (session('success'))
    @endif
    {{-- Opciones Administrador --}}
    <div class="md:flex-col md:justify-center bg-gray-800 p-6 rounded-lg shadow-lg ">
        <h2 class="text-center text-white uppercase font-bold text-3xl p-6">Selecciona una opción</h2>
        <div class="md:flex md:justify-evenly">
            <div>
                <a href="{{route('concert.create')}}"
                    class="text-center text-black font-bold p-3 bg-red-500 rounded hover:bg-red-800 transition">Agregar
                    Concierto</a>
            </div>
        </div>
    </div>

    <script></script>
@endsection
