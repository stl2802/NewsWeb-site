<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> NewsPaper Admin Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="#">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('styles/css_for_admin/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('styles/css_for_admin/animate.css')}}">
    <!-- nalika Icon CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('styles/css_for_admin/nalika-icon.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('styles/css_for_admin/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('styles/css_for_admin/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('styles/css_for_admin/owl.transitions.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('styles/css_for_admin/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('styles/css_for_admin/normalize.css')}}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('styles/css_for_admin/meanmenu.min.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('styles/css_for_admin/main.css') }}">
    <!-- morrisjs CSS -->
    <link rel="stylesheet" href="{{ asset('styles/css_for_admin/css/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS -->
    <link rel="stylesheet" href="{{ asset('styles/css_for_admin/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS -->
    <link rel="stylesheet" href="{{ asset('styles/css_for_admin/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/css_for_admin/css/metisMenu/metisMenu-vertical.css') }}">
    <!-- calendar CSS -->
    <link rel="stylesheet" href="{{ asset('styles/css_for_admin/css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/css_for_admin/css/calendar/fullcalendar.print.min.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('styles/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('styles/css_for_admin/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('styles/js_for_admin/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>

<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="nalika-profile">
            <div class="profile-dtl">
                <a href="{{route('home')}}"><img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="аватарка" /></a>
                <h2>{{Auth::user()->name}}</h2>
            </div>
        </div>
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('index')}}">На страницу с новостями</a>
        </div>
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('admin.index')}}">Основное</a>
        </div>
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('admin.users')}}">Пользователи</a>
        </div>
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('admin.articles')}}">Посты</a>
        </div>
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('admin.comments')}}">Комменты</a>
        </div>
    </nav>
</div>
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="header-advance-area">
        <!-- Mobile Menu start -->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul class="mobile-menu-nav">
                                    <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                        <ul class="collapse dropdown-header-top">
                                            <li><a href="product-list.html">NewsPaper Admin Panel</a></li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                        <ul id="demo" class="collapse dropdown-header-top">
                                            <li><a href="mailbox.html">Inbox</a>
                                            </li>
                                            <li><a href="mailbox-view.html">View Mail</a>
                                            </li>
                                            <li><a href="mailbox-compose.html">Compose Mail</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#others" href="#">Miscellaneous <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                        <ul id="others" class="collapse dropdown-header-top">
                                            <li><a href="file-manager.html">Файловый менеджер</a></li>
                                            <li><a href="project-details.html">Детали проекта</a></li>
                                            <li><a href="404.html">404 Страница</a></li>
                                            <li><a href="500.html">500 Страница</a></li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Charts <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>

                                    <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                        <ul id="Pagemob" class="collapse dropdown-header-top">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('index')}}">новости</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('about')}}">о нас</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('contact')}}">контакты</a>
                                            </li>
                                            <li>
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
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu end -->
        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="breadcomb-wp">
                                        <div class="breadcomb-icon">
                                            <i class="icon nalika-home"></i>
                                        </div>
                                        <div class="breadcomb-ctn">
                                            <h2>NewsPaper Admin Panel</h2>
                                            <p>Приветствую тебя во всемогущей админ панели, тут ты можешь сакачать логи-></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="breadcomb-report">
                                        <button data-toggle="tooltip" data-placement="left" title="Загрузить логи" class="btn" id="downloadLogsBtn"><i class="icon nalika-download"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2025 Все права защищены.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('downloadLogsBtn').addEventListener('click', function() {
        window.location.href = '{{ route('admin.logs') }}';
    });
</script>
</html>
