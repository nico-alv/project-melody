@extends('layout.app')

@section('title')

@section('content')

    <div class=" flex justify-center">
        <form class="mt-4 bg-gray-200  rounded-lg shadow-lg  w-3/6 " method="POST" action=" {{route('login')}} " novalidate >
            <h1 class=" text-center uppercase font-bold text-3xl p-4 "> Inicia sesión  </h1>
            @csrf
            @if (session('message'))
            <p class="bg-red-500 text-white my-2 rounded-lg text-lg text-center p-2">{{ session('message') }}</p>
            @endif
            <div class="flex justify-center">
                @error('email')
                <p class="border border-red-500 rounded-md bg-red-100
                text-red-600 p-2 my-2 w-3/4 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="flex justify-center">
                <input type="email" class="w-2/3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Email"
                id="email" name="email">
            </div>

            <div class="flex justify-center">
                @error('password')
                <p class=" mt-6 border border-red-500 rounded-md bg-red-100
                text-red-600 p-2 my-2 text-center w-3/4">{{$message}}</p>
                @enderror
            </div>
            <div class=" flex justify-center">
            <input type="password" class=" mt-2 w-2/3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light " placeholder="Password"
            id="password" name="password">
            </div>
             <div class="flex justify-center">
                <button type="submit" class=" flex justify-center rounded-md bg-blue-700  text-lg
                text-white font-semibold p-2 my-3 w-1/2 hover:bg-blue-800"> Confirmar </button>
             </div>
        </form>
@endsection
