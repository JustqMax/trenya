<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>

    <div class="container col-sm-5">

        <header>
            <div> <a href="{{ route('index') }}">Головна сторінка</a></div>
            @guest
                <div> <a href="{{ route('register') }}">Реєстрація</a></div>
                <div> <a href="{{ route('login') }}">Авторизація</a></div>
            @endguest
            @auth
                <div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <div><a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Вихід</a></div>

                    </form>
                </div>
            @endauth
        </header>

        <main>
            @yield('main_content')
        </main>
    </div>


</body>

</html>
