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

        h2 {
            color: #a00318;
        }

        h3 {
            font-weight: bold;

        }

        p {
            font-weight: bold;
        }

        span {
            font-weight: 700;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

        }

        .total {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .total-pay {
            margin-bottom: 0px;
            text-align: center;
        }

        .method-pay {
            color: #a9a9a9;
            font-weight: bold;
            margin-top: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 class=" title">Comprobante de Entradas: {{ $ticket_reservation->reservation_number }}</h1>
    <div>
        <h3>Productora Melody</h3>
        <h3>Fecha:
            <span>{{ $date }}</span>
        </h3>
    </div>
    <div>
        <h2>Datos del concierto</h2>
        <p>Reserva de número:
            <span>{{ $ticket_reservation->reservation_number }}</span>
        </p>
        <p>Concierto:
            <span>{{ $ticket_reservation->concertDate->concert_name }}</span>
        </p>
        <p>Fecha del concierto:
            <span>{{ $ticket_reservation->concertDate->date }}</span>
        </p>
        <p>Cantidad de entradas:
            <span>{{ $ticket_reservation->ticket_quantity }}</span>
        </p>
        <p>Valor Entrada:
            <span>{{ '$' . number_format($ticket_reservation->concertDate->price , 0, ',', '.') }}</span>
        </p>
    </div>
    <hr>
    <div>
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
        <p class="method-pay">{{ $ticket_reservation->payment_method }}</p>
    </div>
</body>

</html>
