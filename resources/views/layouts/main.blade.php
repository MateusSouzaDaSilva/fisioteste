<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>

    <title>@yield('title')</title>

</head>

<body>
    <header>
        <div class="header">
            <h1>Fisiolates</h1>
        </div>
        <div class="menubar">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <img src=" {{ asset('img/icons/calendar_logo.png') }}" alt="">
                    <a class="nav-link" href="/">Agendamento</a>
                </li>
                <li class="nav-item">
                    <img src=" {{ asset('img/icons/register_logo.png') }}" alt="">
                    <a class="nav-link" href="/lista-alunos">Alunos</a>
                </li>
                <li class="nav-item">
                    <img src=" {{ asset('img/icons/money_logo.png') }}" alt="">
                    <a class="nav-link" href="/mensalidade">Mensalidade</a>
                </li>
            </ul>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
      
    <footer>
        <p>Fisiolates &copy;</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
