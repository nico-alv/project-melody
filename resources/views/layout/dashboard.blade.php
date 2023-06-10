@extends('layout.app')
@section('title')
    Dashboard
@endsection
@section('title-page')
    Bienvenido {{ auth()->user()->name }}
@endsection
@section('content')
    @if (auth()->user()->role === 'Usuario')
        {{-- Opciones Cliente --}}
        @if ($concerts->count() >0)
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 ml-3">
            @foreach ($concerts as $concert)

                <div class="w-full max-w-xs bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#">
                        <img class="p-8 rounded-t-lg" src="{{ asset('img/default-concert.png') }}" alt="imagen concierto" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-bold tracking-tight">
                                {{ $concert->concert_name }}
                            </h5>
                        </a>

                        <p class="text-sm font-bold tracking-tight text-gray-900 uppercase">
                            Stock: {{ $concert->stock }}
                        </p>

                        <div class="flex items-center justify-between">
                            <span class="text-3xl font-bold text-gray-900">
                                {{ '$' . $concert->price }}
                            </span>

                            @if ($concert->stock > 0)
                                <!-- Modal toggle -->
                                <button data-modal-toggle="defaultModal-{{ $concert->id }}"
                                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                    type="button">
                                    Comprar entrada
                                </button>
                            @else
                                <button href="#" id="add-concert"
                                    class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 cursor-not-allowed disabled: opacity-75 ">
                                    Agotado
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            </div>

        @endif
    @endif

    @if (auth()->user()->role === 'Administrador')
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
    @endif
@endsection

