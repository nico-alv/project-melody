@extends('layout.app')

@section('title', 'Home')

@section('content')

  <h1 class="text-5xl text-center pt-24"> LOGIN </h1>
  <form class="mt-4" method="POST" action="">
    @csrf
    @error('email')
    <p class="border border-red-500 rounded-md bg-red-100 w-full
    text-red-600 p-2 my-2">{{$message}}</p>
  @enderror
    <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Email"
    id="email" name="email">

    @error('password')
    <p class="border border-red-500 rounded-md bg-red-100 w-full
    text-red-600 p-2 my-2">{{$message}}</p>
  @enderror
    <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Password"
    id="password" name="password">

    @error('password')
      <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2"> {{$message}} </p>
    @enderror

    <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg
    text-black font-semibold p-2 my-3 hover:bg-indigo-600"> Send </button>


  </form>


@endsection
