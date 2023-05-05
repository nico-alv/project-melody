<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    @vite('resources/css/app.js')
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Melody - @yield('title')</title>
</head>

<body class="bg-blue-medium-light">
    <div class="min-h-screen flex flex-col">
        <header>
            <nav class="flex flex-wrap bg-white justify-between items-center mx-auto">
                <a href={{route('welcome')}}><img src="{{ asset('img/melody.png') }}" class="h-12 pl-4" alt="Melody Logo"></a>
                <div class="flex items-center">
                    @auth
                        <div class="bg-green-dark">
                            <form action="{{ route('login.destroy') }}" method="POST">
                                @csrf
                                <a href="{{ route('welcome') }}"class="flex justify-center text-sm bg-pink-light px-2 py-5">Cerrar sesión</a>
                            </form>
                        </div>
                    @endauth
                    @guest
                        <div>
                            @if (url()->current() == route('login.index'))
                                <p class="flex justify-center bg-blue-medium-light shadow-lg rounded-t-lg text-xs uppercase font-bold select-none px-2 py-6">Iniciar Sesión</p>
                            @else
                                <a href="{{ route('login.index') }}" class="flex justify-center text-white bg-blue-medium-dark rounded-t-lg text-xs hover:bg-blue-dark uppercase font-bold px-2 py-6">Iniciar Sesión</a>
                            @endif
                        </div>
                        <div>
                            @if (url()->current() == route('register'))
                                <p class="flex justify-center bg-blue-medium-light shadow-lg rounded-t-lg text-xs uppercase font-bold select-none px-2 py-6">Crear Cuenta</p>
                            @else
                                <a href="{{ route('register') }}" class="flex justify-center text-white bg-blue-medium-dark rounded-t-lg text-xs hover:bg-blue-dark uppercase font-bold px-2 py-6">Crear Cuenta</a>
                            @endif
                        </div>
                    @endguest
                </div>
            </nav>
        </header>
        <main class="container mx-auto mt-10 flex-1">
            <h2 class="text-white font-bold text-center text-3xl mb-10 uppercase">@yield('title-page')</h2>
            @yield('content')
        </main>
        <footer class="text-white text-center p-5 font-medium">
            <hr class="my-6 border-gray-200 dark:border-gray-700">
            <span class="block text-sm text-center text-black-dark dark:text-gray-400">©{{ now()->year }} <a href="{{ route('welcome') }}">  Melody</a> es una marca registrada. Todos los derechos reservados.
        </span>
        </footer>
    </div>
</body>
  </div>
</html>
