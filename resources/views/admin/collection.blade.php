@extends('layout.app')

@section('title')
    Recaudación
@endsection

@section('content')

    <div class="flex justify-center mb-4">
        <select id="selectGraphic" name="selectGraphic" class="border border-black-light text-sm rounded-lg w-2/3 block p-2.5">
            <option selected value="graph1">Total vendido por concepto de entradas</option>
            <option value="graph2">Efectivo</option>
            <option value="graph3">Transferencia</option>
        </select>
    </div>
    <div class="flex justify-center items-center h-auto">
        <div id="graph1Container" class="w-1/2 bg-white p-4 mx-3">
            <canvas id="graph1" class="w-full h-64"></canvas>
        </div>

        <div id="graph2Container" class="w-1/2 bg-white p-4 mx-3" style="display: none;">
            <canvas id="graph2" class="w-full h-64"></canvas>
        </div>

        <div id="graph3Container" class="w-full p-4 mt-6" style="display: none;">
            <canvas id="graph3" class="bg-white w-1/2 h-64 mx-96 "></canvas>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mostrar el gráfico 1 al cargar la página
            document.getElementById('graph1Container').style.display = 'block';

            document.getElementById('selectGraphic').addEventListener('change', function() {
                var selectedOption = this.value;

                // Ocultar todos los gráficos
                document.getElementById('graph1Container').style.display = 'none';
                document.getElementById('graph2Container').style.display = 'none';
                document.getElementById('graph3Container').style.display = 'none';

                // Mostrar el gráfico seleccionado
                document.getElementById(selectedOption + 'Container').style.display = 'block';
            });
        });


        const ctx1 = document.getElementById('graph1');
        const totalVendidoPorConcierto = {!! json_encode($totalVendidoPorConcierto) !!};

        const data1 = {
            labels: totalVendidoPorConcierto.map(item => item.concert_name),
            datasets: [{
                label: 'Total Vendido por Entradas por Concierto',
                data: totalVendidoPorConcierto.map(item => item.total),
                backgroundColor: ['red', 'blue', 'yellow', 'green', 'purple', 'orange'],
                borderWidth: 1
            }]
        };

        new Chart(ctx1, {
            type: 'bar',
            data: data1,
            options: {

                plugins: {
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
                backgroundColor: ['red', 'blue', 'yellow', 'green', 'purple', 'orange'],
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
                data: ventasPorcentaje.map(item => item.porcentaje),
                backgroundColor: ['red', 'blue', 'yellow', 'green', 'purple', 'orange'],
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
                        }
                    },
                },
            }
        });
    </script>
@endsection
