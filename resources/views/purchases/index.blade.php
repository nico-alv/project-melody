@extends('layout.app')

@section('title')
    Visualización de compras realizadas
@endsection

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-black">
        <thead class="text-xs text-white uppercase">
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
                
            
            </tr>
        </thead>
        <tbody>
            @forelse ($concerts as $concert)
                <tr class="bg-white border-b">
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
