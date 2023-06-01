@extends('layout.app')
@section('title')
Registrar Cliente
@endsection
@section('content')
<div class="max-w-lg mx-auto">
    <div>
        <h2 class="bg-orange-medium-light text-center rounded-t-lg uppercase font-bold text-3xl p-4">Regístrate</h2>
    </div>
    <div>
        <form id="form" action="{{ route('register')}}" method="POST" novalidate class="bg-orange-light shadow-xl rounded-b-lg px-8 py-7">
            @csrf
            <div class="mb-5">
                <label  for="name" class="text-black-dark font-bold"> Nombre </label>
                <input id="name" name="name" placeholder="Ingrese su nombre" class="shadow rounded-lg w-full mt-1 py-2 px-3"/>
                @error('name')
                    <p class="bg-pink-medium-light border border-pink-dark text-white mt-1 px-4 py-2 rounded-full">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="email" class="text-black-dark font-bold"> Correo electrónico </label>
                <input id="email" name='email' placeholder="Ingrese su correo electrónico" class="shadow rounded-lg w-full mt-1 py-2 px-3"/>
                @error('email')
                    <p class="bg-pink-medium-light border border-pink-dark text-white mt-1 px-4 py-2 rounded-full">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="text-black-dark font-bold">Contraseña</label>
                <input id="password" name="password" type="password" placeholder="Ingrese su contraseña" class="shadow rounded-lg w-full mt-1 py-2 px-3"/>
                @error('password')
                    <p class="bg-pink-medium-light border border-pink-dark text-white mt-1 px-4 py-2 rounded-full">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-center">
                <div class="flex justify-center rounded-lg bg-yellow-medium-light hover:bg-yellow-light transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-lg hover:scale-110 mt-2">
                    <button id="button" type="button" class="text-black font-medium text-center py-2 px-4">Crear cuenta</button>
                </div>
            </div>
        </form>
    </div>
</div>
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

