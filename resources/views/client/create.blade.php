@extends('layout.app')
@section('title')
    @if($concert->stock > 0 )
        {{ $concert->concert_name }}
    @else
        Página no encontrada
    @endif
@endsection
@section('content')
    @if($concert->stock < 1)
        {{ view('errors.404')}}
    @endif
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
                    class="h-6 w-6 rounded-full bg-green-medium-dark text-center text-[10px]/6 font-bold text-white">
                    2
                  </span>

                  <span class="hidden sm:block font-semibold"> Forma de pago </span>
                </li>
                <li class="flex items-center gap-2 bg-yellow-medium-light p-2">
                  <span
                    class="h-6 w-6 rounded-full bg-yellow-medium-dark text-center text-[10px]/6 font-bold text-white">
                    3
                  </span>
                  <span class="hidden sm:block font-semibold"> Detalle </span>
                </li>
              </ol>
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


                <input id="ticket_quantity"  type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                    name="ticket_quantity" class="border border-black-light text-sm rounded-lg w-7/12 block p-2.5" placeholder="--Ingrese la cantidad de entradas--" />
                <!-- Tooltip campo cantidad de entradas -->
                <img data-tooltip-target="info-buy-tickets" data-tooltip-placement="right" src="{{ asset('img/info_tooltip.png') }}"
                class="ml-2 mt-2.5 w-7 h-7" alt="icono_tooltip">
                <div id="info-buy-tickets" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-black-light rounded-lg shadow-sm opacity-0 tooltip">
                    La cantidad de entradas ingresada debe:
                    <br>
                    <span class="font-extrabold">&middot</span> Contener solamente números.
                    <br>
                    <span class="font-extrabold">&middot</span> Ser un valor entre 1 y {{ $concert->stock }}.

                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <!------------------------->
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
                <label for="payment_method" class="block my-auto text-sm font-medium pr-10">Forma de pago:</label>

                <select id="payment_method" name="payment_method"
                    class="border border-black-light text-sm rounded-lg block w-7/12 p-2.5">
                    <option selected value="">--Seleccione un método de pago--</option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Transferencia">Transferencia</option>
                    <option value="Tarjeta de débito">Tarjeta de débito</option>
                    <option value="Tarjeta de crédito">Tarjeta de crédito</option>
                </select>
                <!-- Tooltip campo forma de pago -->
                <img data-tooltip-target="info-method" data-tooltip-placement="right" src="{{ asset('img/info_tooltip.png') }}"
                class="ml-2 mt-2.5 w-7 h-7" alt="icono_tooltip">
                <div id="info-method" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-black-light rounded-lg shadow-sm opacity-0 tooltip">
                    Este es el medio por el cual pagará
                    <br>
                    las entradas.
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <!------------------------->

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

        <div class="flex items-center justify-center p-6 space-x-2 rounded-b">
            <div class="flex justify-center">

                <div title="Se efectuará el pago de las entradas" class="flex justify-center rounded-lg bg-green-medium-light hover:bg-green-medium-dark">
                    <button id="button" type="button"
                        class="font-medium text-sm px-5 py-2.5">
                        Finalizar compra
                    </button>
                </div>

            </div>

            <div class="flex justify-center">
                <div title="Volver a la lista de conciertos" class="flex justify-center rounded-lg bg-yellow-medium-light hover:bg-yellow-medium-dark">
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
    <script src="/js/doubleCommitMessage.js"></script>
@endsection

@section('script')
    <script>
        const amount = document.getElementById('ticket_quantity');
        const total = document.getElementById('total');
        const totalSubmit = document.getElementById('total-s');
        amount.addEventListener('input', (e) => {
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
