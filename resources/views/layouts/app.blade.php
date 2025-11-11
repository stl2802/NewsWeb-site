<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <title>
            @yield('title')
        </title>
        <!-- Подключение Bootstrap Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <style>
            .card {
                border-radius: 15px;
            }
            .list-group-item {
                border: none;
                border-bottom: 1px solid #e9ecef;
                padding: 1.5rem;
            }
            .list-group-item:last-child {
                border-bottom: none;
            }
            .btn {
                border-radius: 8px;
            }
            .form-control {
                border-radius: 10px;
            }
            .dropdown-toggle::after {
                display: none;
            }
        </style>
    </head>
    <body>
        <header>
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
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="d-inline-block" style="width: 3rem; height: 3rem;">
                                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="фото профиля" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                                    </a>
                                </li>
                                @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                                    <a class="nav-link" href="{{route('admin.index')}}">Админ панель</a>
                                @endif
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
        <div class="music_index">
                @yield('content')
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('editBtn').addEventListener('click', () => {
            document.getElementById('profileForm').classList.remove('d-none');
            document.getElementById('name').disabled = false;
            document.getElementById('email').disabled = false;
            document.getElementById('password').disabled = false;
            document.getElementById('editBtn').style.display = 'none';
        });

        document.getElementById('cancelBtn').addEventListener('click', () => {
            document.getElementById('profileForm').classList.add('d-none');
            document.getElementById('name').disabled = true;
            document.getElementById('email').disabled = true;
            document.getElementById('password').disabled = true;
            document.getElementById('editBtn').style.display = 'inline-block';

            // Возврат значений
            @auth()
                document.getElementById('name').value = '{{ $user->name }}';
                document.getElementById('email').value = '{{ $user->email }}';
                document.getElementById('password').value = '';
            @endauth
        });
    </script>
</html>
