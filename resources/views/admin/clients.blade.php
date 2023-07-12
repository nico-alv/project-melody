@extends('layout.app')
@section('title-page')
    Buscar un cliente
@endsection
@section('content')
<form action="{{ route('clients.search') }}" class="my-12" method="GET" novalidate>

    <div class="flex justify-center bg-orange-medium-light py-4">
            <label for="email_search" class="sr-only">Search</label>
            <div class="md:mx-lg-auto px-4">
                <input type="email" name="email_search" placeholder="Ingrese correo a buscar"
                    class="bg-white border text-black text-center text-sm rounded-lg block p-2.5 px-20 w-full">
            </div>

            <!-- Boton buscar -->
            <div class="flex justify-center" title="Buscar fecha">
                <div class="ml-1.5 flex justify-center rounded-lg bg-yellow-medium-light hover:bg-yellow-medium-dark">
                    <button type="submit" class="p-3 text-sm font-medium text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            <!-- Boton refresh -->
            <div class="flex justify-center" title="Refrescar página">
                <div class="ml-1.5 flex justify-center rounded-lg bg-green-medium-light hover:bg-green-medium-dark">
                    <a id="refresh_button" type="button" href={{ route('clients.list') }}
                        class="p-3 text-sm font-medium text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="20"
                            height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                            <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Tooltip correo -->
            <img data-tooltip-target="info-concert-date" data-tooltip-placement="right" src="{{ asset('img/info_tooltip.png') }}"
                class="ml-2 mt-2.5 w-7 h-7" alt="icono_tooltip">
            <div id="info-concert-date" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-black-light rounded-lg shadow-sm opacity-0 tooltip">
                Al ingresar un correo existente
                <br> se desplegarán los datos del usuario
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <!------------------------->
        </div>
    </div>

</form>

    @if ($client == null)
        @if ($message)
            <p class="bg-red-500 text-white rounded-xl text-lg text-center py-2">
                {{ $message }}</p>
        @endif
    @elseif($ticket_reservations->count() > 0)
        <h2 class="text-center text-white text-3xl font-bold uppercase my-10">Cliente {{ $client->name }}</h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-black">
                <thead class="text-xs text-white uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                            Número reserva
                        </th>
                        <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                            Nombre concierto
                        </th>
                        <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                            Fecha concierto
                        </th>
                        <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                            Fecha compra
                        </th>

                        <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                            Cantidad entradas
                        </th>
                        <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                            Total pagado
                        </th>
                        <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                            Medio de pago
                        </th>
                        <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                            <div class="flex flex-row justify-center">
                            <p>
                                Descargar
                            </p>
                            <!-- Tooltip descargar comprobante -->
                            <img data-tooltip-target="info-download" data-tooltip-placement="bottom" src="{{ asset('img/info_tooltip.png') }}"
                            class="ml-2 -mt-0.5 w-5 h-5" alt="icono_tooltip">
                            <div id="info-download" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-black-light rounded-lg shadow-sm opacity-0 tooltip">
                                S<span class="lowercase">e descargará el comprobante de compra</span>
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <!------------------------->
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ticket_reservations as $ticket_reservation)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ $ticket_reservation->reservation_number }}
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ $ticket_reservation->concertDate->concert_name }}
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ date('d/m/Y', strtotime($ticket_reservation->concertDate->date)) }}
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ date('d/m/Y H:i:s', strtotime($ticket_reservation->purchase_date)) }}
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ $ticket_reservation->ticket_quantity }}
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ $ticket_reservation->total }}
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ $ticket_reservation->payment_method }}
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                <a class="w-auto h-auto"
                                    href="{{ route('pdf.descargar', ['id' => $ticket_reservation->ticket->id]) }}">
                                    <p class="bg-yellow-medium-light rounded-full text-center text-black-dark font-semibold">
                                        descargar detalle
                                    </p>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        @if ($ticket_reservations)
            <div class="flex justify-center items-center mx-auto my-8">
                {{ $ticket_reservations->appends(['email_search' => $client->email])->links('pagination::tailwind') }}
            </div>
        @endif
    @elseif($client)
        <p class="text-2xl text-white text-center font-bold">El cliente {{ $client->name }} no ha adquirido entradas</p>
    @endif
@endsection
