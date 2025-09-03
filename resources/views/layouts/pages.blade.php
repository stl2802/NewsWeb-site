<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
</head>
<body>
    <header>
        <nav>
            <li>
                <a href="{{route('index')}}">новости</a>
            </li>
            <li>
                <a href="{{route('about')}}">лк</a>
            </li>
            <li>
                <a href="{{route('about')}}">о нас</a>
            </li>
            <li>
                <a href="{{route('contact')}}">контакты</a>
            </li>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        Все права защищены Максимов Андрей Олегович 241-321
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
</body>
</html>
