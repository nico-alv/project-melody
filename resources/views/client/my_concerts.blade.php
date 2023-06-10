@extends('layout.app')

@section('title')
    Mis conciertos
@endsection


@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-orange-light">
                        Numero reserva
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
                        medio de pago
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->concertsClient as $concert)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                            {{$concert -> reservation_id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $concert -> concertDate -> concert_name  }}
                        </td>
                        <td class="px-6 py-4">
                            {{ date('d/m/Y', strtotime($concert->concertDate->date)) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ date('d/m/Y', strtotime($concert-> purchase_date)) }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $concert-> ticket_quantity }}
                        </td>
                        <td class="px-6 py-4">
                            {{
                                ($concert-> ticket_quantity)*($concert->concertDate->price)

                            }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $concert -> payment_method  }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
