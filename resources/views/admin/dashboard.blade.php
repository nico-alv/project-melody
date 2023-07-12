@extends('layout.app')

@section('title')
    Dashboard {{ auth()->user()->name }}
@endsection

@section('title-page')
    Bienvenido {{ auth()->user()->name }}
@endsection

@section('content')
    <div class="md:flex-col md:justify-center bg-orange-medium-light p-6 rounded-lg shadow-lg ">
        <h2 class="text-center text-white font-medium text-2xl mb-2 py-4">Selecciona una opción</h2>
        <div class="md:flex md:justify-center pb-4">
            <div>
                <a href="{{route('concert.create')}}"
                    title="Ir a añadir un nuevo concierto al sistema"
                    class="text-center text-black font-bold p-3 mx-3 rounded bg-yellow-medium-light hover:bg-yellow-medium-dark transition">Agregar
                    concierto</a>
            </div>
            <div>
                <a href="{{route('purchases.index')}}"
                    title="Ir a ver todas las compras que se han realizado"
                    class="text-center text-black font-bold p-3 mx-3 rounded bg-yellow-medium-light hover:bg-yellow-medium-dark transition">Ver compras realizadas</a>
            </div>
            <div>
                <a href="{{route('collection')}}"
                    title="Ir a ver gráficos con la información de las ventas"
                    class="text-center text-black font-bold p-3 mx-3 rounded bg-yellow-medium-light hover:bg-yellow-medium-dark transition">Visualizar recaudación</a>
            </div>
            <div>
                <a href="{{route('clients.list')}}"
                    class="text-center text-black font-bold p-3 mx-3 rounded bg-yellow-medium-light hover:bg-yellow-medium-dark transition">Buscar cliente</a>
            </div>
        </div>
    </div>

@endsection
