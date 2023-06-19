<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $ticket_reservation->reservation_number . '-' . $ticket_reservation->concertDate->date }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap');

        body {
            font-family: 'Merriweather Sans', sans-serif;
            padding: 10px;
        }

        .title {
            font-weight: bold;
            text-align: center;
        }

        .center{
            text-align: center;
        }

        h2 {
            color: #81030d;
            font-weight:900;
        }

        h3 {
            font-weight: lighter;
            font-size:medium;

        }

        p {
            font-weight: bold;
        }

        span {
            font-weight: 700;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

        }

        .total {
            color: #b000ab;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .total-pay {
            margin-bottom: 0px;
            text-align: center;
        }

        .method-pay {

            font-weight: bold;
            margin-top: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div>
        <h3>Fecha: {{ $date }} </h3>
    </div>
    <h1 class=" title">Comprobante de compra</h1>
    <h4 class=" title">Número de reserva: {{ $ticket_reservation->reservation_number }}</h4>

    <div class="center">
        <h2>Información sobre concierto</h2>
        <p>Nombre:
            <span>{{ $ticket_reservation->concertDate->concert_name }}</span>
        </p>
        <p>Fecha:
            <span>{{ $ticket_reservation->concertDate->date }}</span>
        </p>
        <p>Cantidad de entradas:
            <span>{{ $ticket_reservation->ticket_quantity }}</span>
        </p>
        <p>Valor entrada:
            <span>{{ '$' . number_format($ticket_reservation->concertDate->price , 0, ',', '.') }}</span>
        </p>
    </div>
    <hr>
    <div class="center">
        <h2>Datos del cliente</h2>
        <p>Cliente:
            <span>{{ $user->name }}</span>
        </p>
        <p>Correo electrónico:
            <span>{{ $user->email }}</span>
        </p>
    </div>
    <hr>
    <div class="total">
        <p class="total-pay">{{ 'Total pagado: $' . number_format($ticket_reservation->total , 0, ',', '.') }}</p>
        <p class="method-pay">{{'Método de pago: ' . $ticket_reservation->payment_method }}</p>
    </div>
</body>

</html>
