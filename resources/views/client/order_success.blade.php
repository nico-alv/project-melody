@extends('layout.app')

@section('title')
    Compra realizada
@endsection

@section('content')
    <div class="max-w-xl mx-auto my-4 border-b-2 pb-4 bg-gray-100 rounded p-4 mb-8">
        <div class="flex pb-3">
            <div class="flex-1">
            </div>

            <div class="flex-1">
                <div class="w-10 h-10 bg-green-500 mx-auto rounded-full text-lg text-white flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="28"
                        height="28" viewBox="0 0 24 24" stroke-width="3" stroke="#000000" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                </div>
            </div>


            <div class="w-1/4 align-center items-center align-middle content-center flex">
                <div class="w-full bg-green-400 rounded items-center align-middle align-center flex-1">
                    <div class="bg-green-light text-xs leading-none py-1 text-center text-grey-darkest rounded "
                        style="width: 100%"></div>
                </div>
            </div>


            <div class="flex-1">
                <div
                    class="w-10 h-10 bg-green-500 mx-auto rounded-full text-lg text-white flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="28"
                        height="28" viewBox="0 0 24 24" stroke-width="3" stroke="#000000" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                </div>
            </div>

            <div class="w-1/4 align-center items-center align-middle content-center flex">
                <div class="w-full bg-green-400 rounded items-center align-middle align-center flex-1">
                    <div class="bg-green-light text-xs leading-none py-1 text-center text-grey-darkest rounded "
                        style="width: 100%"></div>
                </div>
            </div>

            <div class="flex-1">
                <div
                    class="w-10 h-10 bg-green-500 mx-auto rounded-full text-lg text-white flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="28"
                        height="28" viewBox="0 0 24 24" stroke-width="3" stroke="#000000" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                </div>
            </div>

            <div class="flex-1">
            </div>

        </div>

        <div class="flex text-xs content-center text-center">
            <div class="w-1/3">
                <h3 class="status-font font-semibold text-lg">Selecciona tu concierto</h3>
            </div>

            <div class="w-1/3">
                <h3 class="status-font font-semibold text-lg">Método de pago</h3>
            </div>

            <div class="w-1/3">
                <h3 class="status-font font-semibold text-lg">Detalle</h3>
            </div>
        </div>
    </div>


    {{-- Detalle de la compra --}}
    <div class="flex flex-col items-center">
        <div class="w-1/3 bg-orange-light border border-orange-dark rounded-lg shadow">
            <div class="bg-orange-medium-dark p-10 rounded-t-lg"">
                <p class="font-bold text-2xl text-white text-center">Tu pago ha sido <br> realizado con
                        éxito
            </div>
            <div class="flex flex-col px-5 pt-5 pb-1 bg-orange-light">

                {{-- Empieza el contenido de la tabla --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                    <div class="flex justify-center rounded-lg bg-yellow-medium-light hover:bg-yellow-medium-dark">
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
