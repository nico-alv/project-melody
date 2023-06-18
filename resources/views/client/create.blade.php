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


    <div class=" max-w-lg mx-auto shadow-xl">
        <div class="flex flex-col bg-orange-medium-dark border border-orange-dark rounded-t-lg py-2">
            <div class="flex items-center ml-8 text-white">
                <h2 class="text-xl font-bold w-1/2">Nombre del concierto:</h2>
                <p class="text-xl font-medium w-1/2">{{ $concert->concert_name }}</p>
            </div>

            <div class="flex items-center ml-8 text-white">
                <h2 class="text-xl font-bold w-1/2">Fecha:</h2>
                <p class="text-xl font-medium w-1/2">{{ date('d/m/Y', strtotime($concert->date)) }}</p>
            </div>

            <div class="flex items-center ml-8 text-white">
                <h2 class="text-xl font-bold w-1/2">Valor entrada:</h2>
                <p class="text-xl font-medium text-center">{{ '$' . number_format($concert->price, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>


    <form id="form" action="{{ route('concert.order.pay', ['id' => $concert->id]) }}" method="POST" novalidate
        class="max-w-lg mx-auto bg-orange-light border border-orange-dark shadow-xl rounded-b-lg px-8 pt-7 pb-2">
        @csrf

        <div class="pt-4 pb-2">
            <div class="flex justify-between">
                <label for="ticket_quantity" class="block my-auto text-sm font-medium">Cantidad de
                    entradas:</label>
                <select id="ticket_quantity" name="ticket_quantity"
                    class="border border-black-light text-sm rounded-lg w-2/3 block p-2.5">
                    <option selected value="">--Seleccione las entradas--</option>
                    @for ($i = 1; $i <= $concert->stock; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
            @error('ticket_quantity')
                <p class="bg-pink-medium-light border border-pink-dark text-white text-center py-2 mb-3 rounded-full">{{ $message }}</p>
            @enderror
            @if (session('message'))
                <p class="bg-orange-medium-dark text-white text-center py-2 mb-3 rounded-full">
                    {{ session('message') }}</p>
            @endif
        <div class="pt-4 pb-2">
            <div class="flex justify-between">
                <label for="payment_method" class="block my-auto text-sm font-medium">Forma de pago:</label>
                <select id="payment_method" name="payment_method"
                    class="border border-black-light text-sm rounded-lg w-2/3 block p-2.5">
                    <option selected value="">--Seleccione un método de pago--</option>
                    <option value="1">Efectivo</option>
                    <option value="2">Transferencia</option>
                    <option value="3">Debito</option>
                    <option value="4">Credito</option>
                </select>
            </div>
        </div>
        @error('payment_method')
        <p class="bg-pink-medium-light border border-pink-dark text-white text-center py-2 rounded-full">{{ $message }}</p>
        @enderror

        <div class="grid grid-cols-2 text-xl font-bold uppercase mt-7 py-2 border-y border-white">
            <h2 class="text-end">Total: </h2>
            <p id="total" class="ml-3">$0</p>
            <input id="total-s" name="total" value="{{ $concert->price }}" hidden>
            <input name="reservation_number" value="" hidden>
        </div>

        <div class="flex items-center justify-center p-6 space-x-2 rounded-b dark:border-gray-600">
            <div class="flex justify-center">
                <div class="flex justify-center rounded-lg bg-green-medium-dark hover:bg-green-dark">
                    <button id="button" type="button"
                        class="font-medium text-sm px-5 py-2.5">
                        Finalizar compra
                    </button>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="flex justify-center rounded-lg bg-yellow-medium-dark hover:bg-yellow-dark">
                    <a href="{{ route('concert.list') }}" type="button"
                        class="font-medium text-sm px-5 py-2.5">
                        Volver
                    </a>
                </div>
            </div>
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
                title: '¿Seguro que quieres continuar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#00c586', //green-medium-light
                cancelButtonColor: '#f3320d',  // orange-medium-light
                confirmButtonText: 'Aceptar',
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
        //const button = document.getElementById('add-concert');
        const amount = document.getElementById('ticket_quantity');
        const total = document.getElementById('total');
        const totalSubmit = document.getElementById('total-s');
        /*
        window.addEventListener('DOMContentLoaded', (e) => {
            e.preventDefault();
            button.disabled = true;
        })
        */
        amount.addEventListener('click', (e) => {
            e.preventDefault();
            const venta = {{ $concert->price }} * amount.value;

            const options = {
                style: 'decimal',
                useGrouping: true,
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
                };
            const fNum = venta.toLocaleString('es', options);

            total.textContent = "$"+fNum;
            totalSubmit.value = venta;
        })
    </script>
@endsection
