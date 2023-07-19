@extends('layout.app')
@section('title')
   {{$concert->concert_name}}
@endsection
@section('title-page')
    Concierto {{$concert->concert_name}}
@endsection
@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg text-center pt-4">
    <table class="w-full text-sm text-left text-black">
        <thead class="text-xs text-white uppercase">
            <tr>
                <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                    Número reserva
                </th>
                <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                    Nombre cliente
                </th>
                <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                    Correo cliente
                </th>
                <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                    Fecha de compra
                </th>
                <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                    Cantidad entradas compradas
                </th>
                <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                    medio de pago
                </th>
                <th scope="col" class="px-6 py-3 text-center bg-orange-light">
                    total pagado
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ( $ticket_reservations as $ticket_reservation )
            <tr class="bg-white border-b">
                <td class="px-6 py-4">
                    <p class="text-center">
                        {{ $ticket_reservation->reservation_number }}
                    </p>
                </td>
                <td class="px-6 py-4">
                    <p class="text-center">
                        {{ $clients->find($ticket_reservation->user_id)->name }}
                    </p>
                </td>
                <td class="px-6 py-4">
                    <p class="text-center">
                        {{ $clients->find($ticket_reservation->user_id)->email }}
                    </p>
                </td>
                <td class="px-6 py-4">
                    <p class="text-center">
                        {{ date('d/m/Y h:i:s', strtotime($ticket_reservation->purchase_date)) }}
                    </p>
                </td>
                <td class="px-6 py-4">
                    <p class="text-center">
                        {{ $ticket_reservation->ticket_quantity }}
                    </p>
                </td>
                <td class="px-6 py-4">
                    <p class="text-center">
                        {{ $ticket_reservation->payment_method }}
                    </p>
                </td>
                <td class="px-6 py-4">
                    <p class="text-center">
                        {{
                            '$' . number_format($ticket_reservation->total, 0, ',', '.')
                        }}
                    </p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
