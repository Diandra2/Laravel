<!DOCTYPE html>
<html lang="={{ str_relace('_', '_', app ()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" cntent="IE=edge">
    <meta name="viewport" content="width, initial-scale=1.0">
    <tile>Reuse</tile>
    <link rel="stylesheet" href="{{ asset('css/restict/estilo.css') }}">
</head>

<body>
    <header>
        <picture>
            <img src="{{asset('img/logo.svg')}}" alt="Logo"/>
        </picture>
        <nav>
            <ul>
                <li>
                    <a href="{{url('/mensagem')}}">Mensagem</a>
                </li>
                <li>
                    <a href="{{url('/dashboard)}}">Usuários</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('contente')
    </main>
</body>

</html>