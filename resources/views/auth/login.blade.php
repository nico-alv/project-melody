@extends('layout.app')

@section('title', 'Home')

@section('content')


  <form class="mt-4 bg-gray-200  rounded-lg shadow-lg" method="POST" action="{{ route('login.index')}}">
    <h1 class=" text-center uppercase font-bold text-3xl p-4 "> LOGIN </h1>
    @csrf
    @error('email')
    <p class="border border-red-500 rounded-md bg-red-100 w-full
    text-red-600 p-2 my-2">{{$message}}</p>
  @enderror
    <input type="email" class=" shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light " placeholder="Email"
    id="email" name="email">
    @error('password')
    <p class=" border border-red-500 rounded-md bg-red-100 w-full
    text-red-600 p-2 my-2 ">{{$message}}</p>
  @enderror
    <input type="password" class=" shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light " placeholder="Password"
    id="password" name="password">
    @error('password')
      <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2"> {{$message}} </p>
    @enderror

    <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg
    text-black font-semibold p-2 my-3 hover:bg-indigo-600"> Send </button>


  </form>


@endsection
