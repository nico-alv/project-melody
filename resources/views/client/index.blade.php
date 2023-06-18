@extends('layout.app')

@section('title')
    Conciertos
@endsection
@section('title-page')
    Próximos conciertos
@endsection
@push('styles')
    @vite(['resources/css/fonts.css', 'resources/css/order-status.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
@endpush

@section('content')


<form action="{{ route('concert.search') }}" method="POST" class="my-12">
    @csrf
    <div class="flex justify-center bg-orange-medium-light py-4">

        <!-- Fechas -->
        <label for="date" class="my-auto pr-2 font-medium">Seleccione una fecha:</label>
        <div class="flex justify-center">
            <input type="date" id="date_search" name="date_search" min="{{ date('Y-m-d') }}"
            class="pl-10 p-2.5 rounded-lg border bg-orange-medium-light brightness-105 border-black-medium-light text-sm">
        </div>

        <!-- Boton buscar -->
        <div class="flex justify-center" title="Buscar fecha">
            <div class="ml-1.5 flex justify-center rounded-lg bg-yellow-medium-dark hover:bg-yellow-dark">
                <button type="submit"  class="p-3 text-sm font-medium text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
        </div>


        <!-- Boton refresh -->
        <div class="flex justify-center" title="Refrescar página">
            <div class="ml-1.5 flex justify-center rounded-lg bg-green-medium-dark hover:bg-green-dark">
                <a id="refresh_button" type="button" href={{ route('concert.list') }}
                class="p-3 text-sm font-medium text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                </svg>
                </a>
            </div>
        </div>
    </div>
</form>
    @if ($concerts->count() >0)
    <div class="mx-32">
        <div class="grid grid-cols-3">

            @foreach ($concerts as $concert)

                <div class="p-2">

                    <div class="w-9/12 max-w-xs mx-auto bg-white rounded-lg border border-blue-dark">
                        @if ($concert->stock > 0)
                            <img class="p-5 rounded-t-lg" src="{{ asset('img/default-concert.png') }}" alt="imagen concierto" />
                        @else
                            <div class="relative ">
                                <img class="p-5 rounded-t-lg" src="{{ asset('img/default-concert.png') }}" alt="imagen concierto" />
                                <img src="{{ asset('img/soldout.png') }}" alt="Sold Out" class="absolute bottom-14 right-0 rotate-45 ">
                            </div>
                        @endif

                        <div class="bg-yellow-medium-light">
                            <p class="flex justify-center text-lg font-bold">{{ $concert->concert_name }}</p>
                        </div>
                        <div class="bg-yellow-light pb-2 rounded-b-lg">

                            <p class="flex justify-center text-base tracking-tighter font-medium">

                                @php
                                    $dateTime = DateTime::createFromFormat('Y-m-d', $concert->date);
                                    $day = $dateTime->format('d');
                                    $month = $dateTime->format('F');
                                    $translate = [
                                        'January' => 'enero', 'February' => 'febrero', 'March' => 'marzo', 'April' => 'abril', 'May' => 'mayo',
                                        'June' => 'junio', 'July' => 'julio', 'August' => 'agosto', 'September' => 'septiembre', 'October' => 'octubre',
                                        'November' => 'noviembre', 'December' => 'diciembre',
                                    ];
                                    $translate = $translate[$month];
                                    $ff = $day . ' de ' . $translate;
                                @endphp

                            Día: {{ $ff }}
                            </p>

                            <p class="flex justify-center text-base tracking-tighter font-medium">
                                Entradas disponibles: {{ $concert->stock }}
                            </p>

                            <div class=" text-base tracking-tighter font-semibold mt-2">
                                <span class="flex justify-center">
                                    {{ 'Valor de la entrada: $' . number_format($concert->price, 0, ',', '.') }}
                                </span>
                            </div>

                            @if ($concert->stock > 0)
                            <div class="flex justify-center mt-2">
                                <div class="flex justify-center rounded-lg bg-green-medium-dark hover:bg-green-dark">
                                    <a href="{{ route('concert.order', ['id' => $concert->id]) }}"
                                        class="text-white font-medium text-base px-5 py-2 text-center"
                                        type="submit">
                                        Comprar Entrada
                                    </a>
                                </div>
                            </div>

                            @else
                            <div class="flex justify-center mt-2 ">
                                <div class="flex justify-center rounded-lg bg-black-light">
                                    <button href="#" id="add-concert"
                                    class="text-white font-medium text-base px-10 py-2 text-center cursor-not-allowed">
                                    Agotado
                                </button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @else
        @if (isset($errorMessage))
            <p class="text-2xl text-white text-center font-bold bg-blue-medium-dark py-5">
                {{ $errorMessage }}
            </p>
        @else
            <p class="text-2xl text-white text-center font-bold bg-blue-medium-dark py-5">
                No hay conciertos en sistema. Intente más tarde.
            </p>
        @endif
    @endif

@endsection
