@extends('layout.app')

@section('title')
    Visualización de compras realizadas
@endsection

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-black">
        <thead class="text-xs text-center text-white uppercase">
            <tr>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Nombre concierto
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Fecha concierto
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Cantidad entradas
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Cantidad entradas vendidas
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Cantidad entradas disponibles
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Monto total vendido
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Detalle concierto
                 </th>
            </tr>
        </thead>
        <tbody>

            @forelse ($concerts as $concert)
                <tr class="bg-white text-center border-b">
                    <td class="px-6 py-4">
                        {{ $concert->concert_name }}
                    </td>
                    
                    <td class="px-6 py-4">
                        {{ $concert->date ? date('d/m/Y', strtotime($concert->date)) : '-' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $concert->stock }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $concert->ticketReservations->first()->entradas_vendidas ?? 0 }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $concert->stock - ($concert->ticketReservations->first()->entradas_vendidas ?? 0) }}
                    </td>
                    <td class="px-6 py-4">
                        @if ($concert->ticketReservations->isNotEmpty())
                            {{ '$' . number_format($concert->ticketReservations->first()->monto_total_vendido,0, '', '') }}
                        @else
                            $0
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if ($concert->ticketReservations->isNotEmpty())
                        <div>
                            <a data-tooltip-target="details" data-tooltip-placement="right" href="{{ route('concert.clients', ['id' => $concert->id]) }}"
                                class="text-center p-2 bg-yellow-medium-light rounded-full text-center text-black-dark font-semibold">
                                Ver Detalles
                            </a>
                            <div id="details" role="tooltip"
                                class="text-center absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Ver detalle completo
                                <br>
                                de este concierto.
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                        @else

                        @endif
                    </td>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center">
                        No hay conciertos para mostrar.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
