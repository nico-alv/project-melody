<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    @vite('resources/css/app.js')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <title>Melody - @yield('title')</title>
</head>

<body class="bg-blue-medium-light">
    <div class="min-h-screen flex flex-col">
        <header>
            <nav class="flex flex-wrap bg-white justify-between items-center mx-auto">
                @auth
                    <a href={{route('dashboard')}}><img src="{{ asset('img/melody.png') }}" class="h-12 pl-4" alt="Melody Logo"></a>
                @endauth
                @guest
                    <a href={{route('welcome')}}><img src="{{ asset('img/melody.png') }}" class="h-12 pl-4" alt="Melody Logo"></a>
                @endguest
                <div class="flex items-center">
                    @auth
                        @if (url()->current() != route('dashboard'))
                            <a href="{{ route('dashboard')}}" class="flex justify-center text-white bg-blue-medium-dark rounded-t-lg text-xs hover:bg-blue-dark uppercase font-bold px-2 py-6">Menú principal</a>
                        @else
                            <p class="flex justify-center bg-blue-medium-light shadow-lg rounded-t-lg text-xs uppercase font-bold select-none px-2 py-6">Menú principal</p>
                        @endif
                        <div class="rounded-t-lg bg-green-medium-dark">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <input type="submit" class="flex justify-center text-white hover:rounded-t-lg text-xs cursor-pointer hover:bg-green-dark uppercase font-bold px-2 py-6" value="Cerrar Sesión">
                            </form>
                        </div>
                    @endauth
                    @guest
                        <div>
                            @if (url()->current() == route('login'))
                                <p class="flex justify-center bg-blue-medium-light shadow-lg rounded-t-lg text-xs uppercase font-bold select-none px-2 py-6">Iniciar Sesión</p>
                            @else
                                <a href="{{ route('login') }}" class="flex justify-center text-white bg-blue-medium-dark rounded-t-lg text-xs hover:bg-blue-dark uppercase font-bold px-2 py-6">Iniciar Sesión</a>
                            @endif
                        </div>
                        <div>
                            @if (url()->current() == route('register'))
                                <p class="flex justify-center bg-blue-medium-light shadow-lg rounded-t-lg text-xs uppercase font-bold select-none px-2 py-6"> Regístrate    </p>
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
            @auth
                <span class="block text-sm text-center text-black-dark dark:text-gray-400">©{{ now()->year }} <a href="{{ route('dashboard') }}">  Melody</a> es una marca registrada. Todos los derechos reservados.
            @endauth
            @guest
                <span class="block text-sm text-center text-black-dark dark:text-gray-400">©{{ now()->year }} <a href="{{ route('welcome') }}">  Melody</a> es una marca registrada. Todos los derechos reservados.
            @endguest
            </span>
        </footer>
    </div>
</body>
@yield('alert')

</html>
