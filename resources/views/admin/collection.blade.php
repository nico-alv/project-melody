@extends('layout.app')

@section('title')
    Recaudación
@endsection

@section('title-page')

    Estadisticas ventas 'Melody'
    <hr class="my-6 border-white ">

@endsection

@section('content')


    <div class="flex flex-col justify-center items-center h-auto">
        <div class="w-1/2 bg-white p-4 m-3">
            <canvas id="graph1" class="w-full h-64"></canvas>
        </div>

        <div class="w-1/2 bg-white p-4 m-3">
            <canvas id="graph2" class="w-full h-64"></canvas>
        </div>

        <div class="w-10/12 p-4 m-3">
            <canvas id="graph3" class=" bg-white w-1/2 h-64 mx-auto"></canvas>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
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
                            size: 20  // Ajusta el tamaño del título
                        },
                        padding: {bottom: -20}
                    },
                    legend: {
                        labels: {
                            boxWidth: 0  // Establece el ancho del cuadro del label a cero para ocultarlo

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
                            size: 20  // Ajusta el tamaño del título
                        },
                        padding: {bottom: -20}
                    },
                    legend: {
                        labels: {
                            boxWidth: 0  // Establece el ancho del cuadro del label a cero para ocultarlo

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

        const ctx3 = document.getElementById('graph3');
        const ventasPorcentaje = {!! json_encode($ventasPorcentaje) !!};

        const data3 = {
            labels: ventasPorcentaje.map(item => item.payment_method),
            datasets: [{
                label: 'Total Vendido en Porcentajes',
                data: ventasPorcentaje.map(item => item.porcentaje) ,
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
                        padding: {top: 15}
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                var label = context.label || '';
                                var value = context.parsed.toFixed(2); // Redondear a 2 decimales
                                label += ': ' + value + '%';
                                return label;
                            }
                        }
                    }
                },
            }
        });
    </script>
@endsection
