<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<header>
    <!-- Навигационная панель Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Логотип или название сайта -->
            <a class="navbar-brand" href="#">Мой сайт</a>
            <!-- Кнопка-гамбургер для мобильных устройств -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключить навигацию">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Меню навигации -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('index')}}">новости</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">лк</a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">о нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">контакты</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link">Выход</button>
                            </form>
                        </li>
                    @endauth
                    @guest
                        <li>
                            <a class="nav-link" href="{{route('login')}}">войти</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{route('register')}}">регистрация</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>

<main class="container my-4">
    @yield('content')
</main>

<footer class="bg-light text-center py-3">
    Все права защищены Максимов Андрей Олегович 241-321
</footer>

<!-- Bootstrap JS Bundle (включает Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
