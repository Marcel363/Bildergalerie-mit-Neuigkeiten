<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intital-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Bildergalerie mit Neuigkeiten</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-gray-200">
        <nav class="p-6 bg-white flex justify-between mb-6 font-bold">
            <ul class="flex items-center">
                @auth
                <li>
                    <a href="{{route('home')}}" class="p-2 bg-yellow-500 rounded mr-2">Bildergalerie</a>
                </li>
                <li>
                    <a href="{{route('dashboard')}}" class="p-2 bg-yellow-500 rounded mr-2">Bilder hochladen</a>
                </li>
                <li>
                    <a href="{{route('posts')}}" class="p-2 bg-yellow-500 rounded mr-2">Neuigkeiten Posten</a>
                </li>
               @endauth

                @guest
                        <li>
                            <a href="{{route('home')}}" class="p-2 bg-yellow-500 rounded mr-2">Bildergalerie</a>
                        </li>
                        <li>
                            <a href="{{route('posts')}}" class="p-2 bg-yellow-500 rounded mr-2">Neuigkeiten</a>
                        </li>
                @endguest

            </ul>

            <ul class="flex items-center">

                @auth
                    <li>
                        <a href="" class="p-2 bg-yellow-500 rounded mr-2">{{auth()->user()->name}}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout')}}" method="post" class="p-2 bg-yellow-500 rounded mr-2 inline">
                            @csrf
                        <button type="submit">Logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li>
                        <a href="{{route('login')}}" class="p-2 bg-yellow-500 rounded mr-2">Login</a>
                    </li>
                    <li>
                        <a href="{{route('register')}}" class="p-2 bg-yellow-500 rounded mr-2">Register</a>
                    </li>
                @endguest

            </ul>
        </nav>
    @yield('content')
    </body>
</html>
