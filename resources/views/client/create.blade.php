@extends('layout.app')

@section('title')
    {{ $concert->concert_name }}
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
                    class="w-10 h-10 bg-amber-500 mx-auto rounded-full text-lg text-white flex items-center justify-center animate-spin">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-loader" width="28"
                        height="28" viewBox="0 0 24 24" stroke-width="3" stroke="#000000" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 6l0 -3" />
                        <path d="M16.25 7.75l2.15 -2.15" />
                        <path d="M18 12l3 0" />
                        <path d="M16.25 16.25l2.15 2.15" />
                        <path d="M12 18l0 3" />
                        <path d="M7.75 16.25l-2.15 2.15" />
                        <path d="M6 12l-3 0" />
                        <path d="M7.75 7.75l-2.15 -2.15" />
                    </svg>
                </div>
            </div>

            <div class="w-1/4 align-center items-center align-middle content-center flex">
                <div class="w-full bg-amber-300 rounded items-center align-middle align-center flex-1">
                    <div class="bg-green-light text-xs leading-none py-1 text-center text-grey-darkest rounded "
                        style="width: 20%"></div>
                </div>
            </div>

            <div class="flex-1">
                <div
                    class="w-10 h-10 bg-gray-300 border-2 border-grey-light mx-auto rounded-full text-lg text-white flex items-center">
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



    <form id="form" action="{{ route('concert.order.pay', ['id' => $concert->id]) }}" method="POST" novalidate
        class="max-w-lg mx-auto bg-orange-light shadow-xl rounded-b-lg px-8 py-7">
        @csrf
        <div class="flex flex-col items-center bg-white rounded-lg p-110 md:p-6 lg:mx-64 lg:p-6 xl:mx-2">
            <div class="flex items-center">
                <h2 class="text-xl font-semibold mr-2">Nombre del concierto:</h2>
                <p class="text-2xl">{{ $concert->concert_name }}</p>
            </div>

            <div class="flex items-center gap-2">
                <h2 class="text-xl font-semibold mr-2">Fecha:</h2>
                <p class="text-2xl">{{ date('d/m/Y', strtotime($concert->date)) }}</p>
            </div>

            <div class="flex items-center gap-2">
                <h2 class="text-xl font-semibold mr-2">Valor entrada:</h2>
                <p class="text-2xl">{{ $concert->price }}</p>
            </div>
        </div>

        <div class="p-4">
            <div class="flex items-center gap-2">
                <label for="ticket_quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad de
                    entradas:</label>
                <select id="ticket_quantity" name="ticket_quantity"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="">--Seleccione las entradas--</option>
                    @for ($i = 1; $i <= $concert->stock; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

            </div>
            @error('ticket_quantity')
                    <p class="bg-pink-medium-light border border-pink-dark text-white mt-1 px-4 py-2 rounded-full">{{ $message }}</p>
            @enderror
            @if (session('message'))
                <p class="bg-red-500 text-white my-2 rounded-xl text-sm text-center p-2">
                    {{ session('message') }}</p>
            @endif
        <div class="p-4">
            <div class="flex items-center gap-0">
                <label for="payment_method" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Forma de
                    pago</label>
                <select id="payment_method" name="payment_method"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-85 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="">--Seleccione un método de pago--</option>
                    <option value="1">Efectivo</option>
                    <option value="2">Transferencia</option>
                    <option value="3">Debito</option>
                    <option value="4">Credito</option>
                </select>
            </div>
        </div>
        @error('payment_method')
        <p class="bg-pink-medium-light border border-pink-dark text-white mt-1 px-4 py-2 rounded-full">{{ $message }}</p>
        @enderror
        </div>

        <div class="flex items-center justify-center">
            <h2 class="font-bold text-xl uppercase mr-3">Total</h2>
            <p id="total" class="text-2xl text-center font-semibold">{{ $concert->price }}</p>
        </div>
        <input id="total-s" name="total" value="{{ $concert->price }}" hidden>
        <input name="reservation_number" value="" hidden>
        <div class="flex items-center justify-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
    <button id="button" type="button"
        class="text-black bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-700">
        Finalizar compra
            </button>
            <a href="{{ route('concert.list') }}" type="button"
                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                Volver
            </a>
        </div>
    </form>
@endsection

@section('alert')
    <script>
        const button = document.getElementById("button");
        const form = document.getElementById("form");

        button.addEventListener('click', (e) => {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro que quieres enviar estos datos?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4DD091',
                cancelButtonColor: '#FF5C77',
                confirmButtonText: 'Enviar',
                cancelButtonText: 'Cancelar',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        })
    </script>
@endsection

@section('script')
    <script>
        const button = document.getElementById('add-concert');
        const cantidad = document.getElementById('ticket_quantity');
        const total = document.getElementById('total');
        const totalSubmit = document.getElementById('total-s');

        window.addEventListener('DOMContentLoaded', (e) => {
            e.preventDefault();
            button.disabled = true;
        })

        cantidad.addEventListener('click', (e) => {
            e.preventDefault();
            const venta = {{ $concert->price }} * cantidad.value;
            total.textContent = venta;
            totalSubmit.value = venta;
        })
    </script>
@endsection
