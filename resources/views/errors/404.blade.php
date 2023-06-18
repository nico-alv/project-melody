@extends('layout.app')

@section('content')
    <div class="flex justify-center items-center h-screen bg-orange-100">
        <div class="text-center">
        <img src="https://www.blogodisea.com/wp-content/uploads/2020/03/gatito-llorando.jpg" alt="Imagen de error 404" class="mx-auto w-48 mb-4">
            <h1 class="text-4xl font-bold mb-4 text-gray-800">Ups! Error 404</h1>
            <p class="text-lg text-black-600">La página que estás buscando no pudo ser encontrada.</p>
            <a href="/" class="mt-4 text-blue-500 hover:text-orange-700">Volver a la página de inicio</a>
        </div>
    </div>
@endsection
