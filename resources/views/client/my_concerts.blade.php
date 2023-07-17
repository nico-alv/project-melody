@extends('layout.app')
@section('title')
    Mis conciertos
@endsection
@section('content')


<div class="relative overflow-x-hidden overflow-y-hidden shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-black">
        <thead class="text-xs text-white uppercase">
            <tr>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Número reserva
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Nombre concierto
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Fecha concierto
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Fecha compra
                </th>

                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Cantidad entradas
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Total pagado
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Medio de pago
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    <div class="flex flex-row justify-center">
                        <p >
                        Descargar
                        </p>
                        <!-- Tooltip descargar comprobante -->
                        <img data-tooltip-target="info-download" data-tooltip-placement="bottom" src="{{ asset('img/info_tooltip.png') }}"
                        class="ml-2 -mt-0.5 w-5 h-5" alt="icono_tooltip">
                        <div id="info-download" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-black-light rounded-lg shadow-sm opacity-0 tooltip">
                            S<span class="lowercase">e descargará el comprobante de compra.</span>
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <!------------------------->
                    </div>

                </th>
            </tr>
        </thead>
        <tbody>
            @if ( $count > 0 )
            @foreach ($user->concertsClient as $concert)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">
                        {{ $concert -> reservation_number }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $concert -> concertDate -> concert_name  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ date('d/m/Y', strtotime($concert->concertDate->date)) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ date('d/m/Y H:i', strtotime($concert-> purchase_date)) }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $concert-> ticket_quantity }}
                    </td>
                    <td class="px-6 py-4">
                        {{
                            '$' . number_format(($concert-> ticket_quantity)*($concert->concertDate->price), 0, ',', '.')
                        }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $concert -> payment_method  }}
                    </td>
                    <td class="px-6 py-4">
                        <a class="w-auto h-auto" href="{{ route('pdf.descargar', ['id' => $concert->ticket->id]) }}">
                            <p class="bg-yellow-medium-light rounded-full text-center text-black-dark font-semibold">
                                descargar detalle
                            </p>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
@if ( $count == 0 )
    <p class="text-2xl text-white text-center font-bold bg-blue-medium-dark py-5 mt-5">
        No hay entradas adquiridas por desplegar
    </p>

@endif
@endsection
