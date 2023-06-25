@extends('layout.app')

@section('title')
    Dashboard {{ auth()->user()->name }}
@endsection

@section('title-page')
    Bienvenido {{ auth()->user()->name }}
@endsection

@section('content')
    @if (session('success'))
    @endif
    {{-- Opciones Administrador --}}
    <div class="md:flex-col md:justify-center bg-black-light p-6 rounded-lg shadow-lg ">
        <h2 class="text-center text-white uppercase font-bold text-3xl p-6">Selecciona una opción</h2>
        <div class="md:flex md:justify-evenly">
            <div>
                <a href="{{route('concert.create')}}"
                    class="text-center text-black font-bold p-3 bg-orange-medium-light rounded hover:bg-orange-medium-dark transition">Agregar
                    Concierto</a>
            </div>
        </div>
    </div>

    <script></script>
@endsection
