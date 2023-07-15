@extends('layout.app')

@section('title')
    Visualización de compras realizadas
@endsection

@section('title-page')
    Visualización de compras realizadas
@endsection

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-black">
        <thead class="text-xs text-white uppercase">
            <tr>
                <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                    Nombre concierto
                </th>
                <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                    Fecha concierto
                </th>
                <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                    Cantidad entradas
                </th>
                <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                    Cantidad entradas vendidas
                </th>
                <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                    Cantidad entradas disponibles
                </th>
                <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                    Monto total vendido
                </th>
                <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                    Detalle concierto
                 </th>
            </tr>
        </thead>
        <tbody>

            @forelse ($concerts as $concert)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">
                        <p class="text-center">
                            {{ $concert->concert_name }}
                        </p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-center">
                            {{ $concert->date ? date('d/m/Y', strtotime($concert->date)) : '-' }}
                        </p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-center">
                            {{ $concert->stock }}
                        </p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-center">
                            {{ $concert->ticketReservations->first()->entradas_vendidas ?? 0 }}
                        </p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-center">
                            {{ $concert->stock - ($concert->ticketReservations->first()->entradas_vendidas ?? 0) }}
                        </p>
                        </td>
                    <td class="px-6 py-4">
                        <p class="text-center">
                            @if ($concert->ticketReservations->isNotEmpty())
                                {{ '$' . number_format($concert->ticketReservations->first()->monto_total_vendido,0, ',', '.') }}
                                @else
                                $0
                            @endif
                        </p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-center">
                            @if ($concert->ticketReservations->isNotEmpty())
                            <a class="w-auto h-auto">
                                <p class="bg-yellow-medium-light rounded-full text-center text-black-dark font-semibold">
                                <a  href="{{ route('concert.clients', ['id' => $concert->id]) }}">
                                    ver detalles
                                </a>
                                </p>
                            </a>
                        </p>
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
