@extends('layout.app')

@section('title')
    Compra realizada
@endsection

@section('content')
    <div class="max-w-lg mx-auto my-4 border-b-1 pb-4 bg-yellow-medium-light rounded p-8 mb-6">
        <div>
            <h2 class="sr-only">Pasos</h2>
            <div
            class="relative after:absolute after:inset-x-0 after:top-1/2 after:block after:h-0.5 after:-translate-y-1/2 after:rounded-lg after:bg-black"
            >
            <ol
                class="relative z-10 flex justify-between text-basefont-medium text-black"
            >
                <li class="flex items-center gap-2 bg-yellow-medium-light p-2">
                <span
                    class="h-6 w-6 rounded-full bg-yellow-medium-dark text-center text-[10px]/6 font-bold text-white">
                    1
                </span>

                <span class="hidden sm:block font-semibold"> Selección </span>
                </li>

                <li class="flex items-center gap-2 bg-yellow-medium-light p-2">
                <span
                    class="h-6 w-6 rounded-full bg-yellow-medium-dark text-center text-[10px]/6 font-bold text-white">
                    2
                </span>

                <span class="hidden sm:block font-semibold"> Forma de pago </span>
                </li>
                <li class="flex items-center gap-2 bg-yellow-medium-light p-2">
                <span
                    class="h-6 w-6 rounded-full bg-green-medium-dark text-center text-[10px]/6 font-bold text-white">
                    3
                </span>
                <span class="hidden sm:block font-semibold"> Detalle </span>
                </li>
            </ol>
            </div>
        </div>

    </div>

    <div class="flex flex-col items-center">
        <div class="w-1/3 bg-orange-light border border-orange-dark rounded-lg shadow">
            <div class="bg-orange-medium-dark p-10 rounded-t-lg"">
                <p class="font-bold text-2xl text-white text-center">Tu pago ha sido <br> realizado con
                        éxito
            </div>
            <div class="flex flex-col px-5 pt-5 pb-1 bg-orange-light">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left">
                        <tbody>
                            <tr
                                class="bg-white border-b border-orange-dark">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-black-dark whitespace-nowrap">
                                    Número de reserva
                                </th>
                                <td class="px-6 py-4 text-black-dark">
                                    {{ $ticket_reservation->reservation_number }}
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b border-orange-dark">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-black-dark whitespace-nowrap">
                                    Medio de pago
                                </th>
                                <td class="px-6 py-4 text-black-dark">
                                    {{ $ticket_reservation->payment_method }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b border-orange-dark">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-black-dark whitespace-nowrap">
                                    Concierto
                                </th>
                                <td class="px-6 py-4 text-black-dark">
                                    {{ $ticket_reservation->concertDate->concert_name }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b border-orange-dark">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-black-dark whitespace-nowrap">
                                    Cantidad de entradas
                                </th>
                                <td class="px-6 py-4 text-black-dark">
                                    {{ $ticket_reservation->ticket_quantity }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b border-orange-dark">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-black-dark whitespace-nowrap">
                                    Total pagado
                                </th>
                                <td class="px-6 py-4 text-black-dark">
                                    {{'$' . number_format($ticket_reservation->total, 0, ',', '.') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <a href="{{ route('pdf.descargar', ['id' => $ticket->id]) }}"
                    class="inline-flex items-center mx-auto my-4 px-3 py-2 text-sm font-medium text-center bg-green-medium-light hover:bg-green-medium-dark rounded-lg ">
                    Descargar Comprobante
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            <div class="flex items-center justify-center p-6 border-t bg-orange-light rounded-b-lg border-orange-dark ">
                <div class="flex justify-center">
                    <div title="Volver al menú principal" class="flex justify-center rounded-lg bg-yellow-medium-light hover:bg-yellow-medium-dark">
                        <a href="{{ route('dashboard') }}" type="button"
                            class="font-medium text-sm px-5 py-2.5">
                            Finalizar
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
