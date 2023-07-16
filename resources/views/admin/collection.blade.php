@extends('layout.app')

@section('title')
    Recaudación
@endsection

@section('title-page')
    Estadísticas ventas 'Melody'
    <hr class="my-6 border-white ">
@endsection

@section('content')

@if($totalVendidoPorConcierto->isEmpty() && $ventasPorMetodoPago->isEmpty() && $ventasPorcentaje->isEmpty())
        <p class="text-2xl text-white text-center font-bold bg-blue-medium-dark py-5 mt-5">
            No hay compras registradas.
        </p>
@else
    <div class="flex flex-col justify-center items-center h-auto">

        <div class="flex flex-row w-1/2 bg-white p-4 m-3">
                <canvas id="graph1" class="w-full h-64"></canvas>
                <!-- Tooltip gráfico 1 -->
                <img data-tooltip-target="info-graph-1" data-tooltip-placement="right" src="{{ asset('img/info_tooltip.png') }}"
                class="-ml-6 -mt-1 w-7 h-7" alt="icono_tooltip">
                <div id="info-graph-1" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-black-light rounded-lg shadow-sm opacity-0 tooltip">
                    Este gráfico muestra la información de la recaudación
                    <br>
                    de cada concierto que registre al menos una venta
                </div>

        </div>
        @if(!empty($conciertosSinVentas))
        <div class="flex flex-col w-1/2 bg-white p-4 m-3 overflow-y-auto h-32">
            @foreach($conciertosSinVentas as $concert)
                <div class="flex justify-center items-center h-full">
                    <h2 class="text-sm font-bold">El concierto {{$concert}} no tiene compras registradas.</h2>
                </div>
            @endforeach
        </div>
        @endif



        <div class="flex flex-row w-1/2 bg-white p-4 m-3">
                <canvas id="graph2" class="w-full h-64"></canvas>
                <!-- Tooltip gráfico 2 -->
                <img data-tooltip-target="info-graph-2" data-tooltip-placement="right" src="{{ asset('img/info_tooltip.png') }}"
                class="-ml-6 -mt-1 w-7 h-7" alt="icono_tooltip">
                <div id="info-graph-2" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-black-light rounded-lg shadow-sm opacity-0 tooltip">
                    Este gráfico muestra la información de la recaudación
                    <br>
                    total categorizada por el método de pago utilizado
                </div>
        </div>

        @if(!empty($metodosDePagoSinVentas))
            <div class="flex flex-col w-1/2 bg-white p-4 m-3 overflow-y-auto h-32">
                @foreach($metodosDePagoSinVentas as $metodoPago)
                    <div class="flex justify-center items-center h-full">
                        <h2 class="text-sm font-bold">No hay venta de entradas con {{strtolower($metodoPago)}}.</h2>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="flex flex-row w-1/2 bg-white p-4 m-3">
                <canvas id="graph3" class="w-full h-64"></canvas>
                <!-- Tooltip gráfico 3 -->
                <img data-tooltip-target="info-graph-3" data-tooltip-placement="right" src="{{ asset('img/info_tooltip.png') }}"
                class="-ml-6 -mt-1 w-7 h-7" alt="icono_tooltip">
                <div id="info-graph-3" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-black-light rounded-lg shadow-sm opacity-0 tooltip">
                    Este gráfico indica el porcentaje de ventas que se
                    <br>
                    registraron dependiendo del metodo de pago utilizado
                    <br>
                    en relación a las ventas totales
                </div>
        </div>
        @if(!empty($metodosDePagoSinVentas))
            <div class="flex flex-col w-1/2 bg-white p-4 m-3 overflow-y-auto h-32">
                @foreach($metodosDePagoSinVentas as $metodoPago)
                    <div class="flex justify-center items-center h-full">
                        <h2 class="text-sm font-bold">No hay venta de entradas con {{strtolower($metodoPago)}}.</h2>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endif

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        @if(!$totalVendidoPorConcierto->isEmpty())
            const ctx1 = document.getElementById('graph1');
            const totalVendidoPorConcierto = {!! json_encode($totalVendidoPorConcierto) !!};
            const data1 = {
                labels: totalVendidoPorConcierto.map(item => item.concert_name),
                datasets: [{
                    label: '',
                    data: totalVendidoPorConcierto.map(item => item.total),
                    backgroundColor: ['#f3320d', '#0257d2', '#00b87d', '#fcc104'],
                    borderWidth: 1
                }]
            };
            new Chart(ctx1, {
                type: 'bar',
                data: data1,
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Total vendido por entradas por concierto',
                            font: {
                                size: 20
                            },
                            padding: {bottom: -20}
                        },
                        legend: {
                            labels: {
                                boxWidth: 0
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        @endif

        @if(!$ventasPorMetodoPago->isEmpty())
            const ctx2 = document.getElementById('graph2');
            const ventasPorMetodoPago = {!! json_encode($ventasPorMetodoPago) !!};
            const data2 = {
                labels: ventasPorMetodoPago.map(item => item.payment_method),
                datasets: [{
                    label: '',
                    data: ventasPorMetodoPago.map(item => item.total),
                    backgroundColor: ['#f3320d', '#0257d2', '#00b87d', '#fcc104'],
                    borderWidth: 1
                }]
            };
            new Chart(ctx2, {
                type: 'bar',
                data: data2,
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Total vendido por método de pago',
                            font: {
                                size: 20
                            },
                            padding: {bottom: -20}
                        },
                        legend: {
                            labels: {
                                boxWidth: 0
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        @endif

        @if(!$ventasPorcentaje->isEmpty())
            const ctx3 = document.getElementById('graph3');
            const ventasPorcentaje = {!! json_encode($ventasPorcentaje) !!};
            const data3 = {
                labels: ventasPorcentaje.map(item => item.payment_method),
                datasets: [{
                    label: 'Total Vendido en Porcentajes',
                    data: ventasPorcentaje.map(item => item.porcentaje),
                    backgroundColor: ['#f3320d', '#0257d2', '#00b87d', '#fcc104'],
                    borderWidth: 1
                }]
            };
            new Chart(ctx3, {
                type: 'pie',
                data: data3,
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Total vendido en porcentajes',
                            font: {
                                size: 20
                            },
                            padding: {top: 0}
                        },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    var label = context.label || '';
                                    var value = context.parsed.toFixed(2);
                                    label += ': ' + value + '%';
                                    return label;
                                }
                            }
                        },
                        datalabels: {
                            color: '#000000',
                            formatter: (value, context) => {
                                return context.chart.data.labels[context.dataIndex] + ': ' + value + '%';
                            }
                        }
                    },
                }
            });
        @endif
    </script>
@endsection
