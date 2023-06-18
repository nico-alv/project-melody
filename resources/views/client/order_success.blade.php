@extends('layout.app')

@section('title')
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
        <div class="w-1/3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="bg-cyan-600 p-10 rounded-t-lg"">
                <p class="text-xl text-white text-center">Tu pago ha sido <br> <span class="font-bold text-2xl">realizado con
                        éxito</span></p>
            </div>
            <div class="flex flex-col p-5">

                {{-- Empieza el contenido de la tabla --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr
                                class="bg-cyan-100 border-b border-cyan-500 dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Número de reserva
                                </th>
                                <td class="px-6 py-4">
                                    {{ $ticket_reservation->reservation_number }}
                                </td>
                            </tr>
                            <tr
                                class="bg-cyan-100 border-b border-cyan-500 dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Medio de pago
                                </th>
                                <td class="px-6 py-4">
                                    {{ $ticket_reservation->payment_method }}
                                </td>
                            </tr>
                            <tr class="bg-cyan-100 border-b border-cyan-500">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Concierto
                                </th>
                                <td class="px-6 py-4">
                                    {{ $ticket_reservation->concertDate->concert_name }}
                                </td>
                            </tr>
                            <tr class="bg-cyan-100 border-b border-cyan-500">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Cantidad de entradas
                                </th>
                                <td class="px-6 py-4">
                                    {{ $ticket_reservation->ticket_quantity }}
                                </td>
                            </tr>
                            <tr class="bg-cyan-100 border-b border-cyan-500">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Total pagado
                                </th>
                                <td class="px-6 py-4">
                                    {{'$' . number_format($ticket_reservation->total, 0, ',', '.') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <a href="{{ route('pdf.descargar', ['id' => $ticket->id]) }}"
                    class="inline-flex items-center mx-auto my-4 px-3 py-2 text-sm font-medium text-center text-white bg-cyan-700 rounded-lg hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Descargar Comprobante
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            <div class="flex items-center justify-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">

                <a href="{{ route('dashboard') }}" type="button"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Finalizar
                </a>
            </div>
        </div>
    </div>

@endsection
