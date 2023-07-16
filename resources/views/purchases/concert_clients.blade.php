@extends('layout.app')

@section('title')
   {{$concert->concert_name}}
@endsection

@section('content')
<h1 class=" bg-orange-light w-full rounded-lg  text-center text-white font-semibold ">
    {{$concert->concert_name}}
</h1>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg text-center pt-4">
    <table class="w-full text-sm text-left text-black">
        <thead class="text-xs text-white uppercase">
            <tr>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Número reserva

                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Nombre cliente
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Correo cliente
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Fecha de compra
                </th>

                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Cantidad entradas compradas
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    medio de pago
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    total pagado
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ( $detail_orders as $detail_order )
            <tr class="bg-white border-b">
                <td class="px-6 py-4">
                    {{ $detail_order->reservation_number }}
                </td>
                <td class="px-6 py-4">
                    <p class="text-center">
                        {{ $clients->find($detail_order->user_id)->name }}
                    </p>
                </td>
                <td class="px-6 py-4">
                    <p class="text-center">
                        {{ $clients->find($detail_order->user_id)->email }}
                    </p>
                </td>
                <td class="px-6 py-4">
                    <p class="text-center">
                        {{ date('d/m/Y h:i:s', strtotime($detail_order->purchase_date)) }}
                    </p>
                </td>
                <td class="px-6 py-4">
                    <p class="text-center">
                        {{ $detail_order->ticket_quantity }}
                    </p>
                </td>
                <td class="px-6 py-4">
                    <p class="text-center">
                        {{ $detail_order->payment_method }}
                    </p>
                </td>
                <td class="px-6 py-4">
                    <p class="text-center">
                        {{ $detail_order->total }}
                    </p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
