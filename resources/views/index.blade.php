@extends('layouts.pages')

@section('title','Новости')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        .cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
            margin-bottom: 2rem;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
        .pagination {
            justify-content: center;
        }
        /* Убираем отступы у контейнера */
        .custom-container {
            padding: 0 !important;
            margin: 0 !important;
        }
        /* 3 карточки в ряд */
        .news-card {
            flex: 0 0 calc(33.333% - 1.5rem);
            max-width: calc(33.333% - 1.5rem);
            height: 660px
        }
        .card-img-top {
            height: 50%; /* Было 250px + 40px = 290px */
            object-fit: cover;
        }
        /* Увеличиваем высоту всей карточки */
        .card {
            height: 450px; /* Добавляем общую высоту карточки */
        }
        @media (max-width: 992px) {
            .news-card {
                flex: 0 0 calc(50% - 1.5rem);
                max-width: calc(50% - 1.5rem);
            }
        }
        @media (max-width: 576px) {
            .news-card {
                flex: 0 0 100%; /* 1 карточка на мобильных */
                max-width: 100%;
            }
            .card {
                height: auto; /* На мобильных авто высота */
            }
        }
    </style>

    <section class="custom-container">
        <div class="cards-container">
            @if(count($articles) > 0)
                @foreach($articles as $article)
                    <div class="news-card">
                        <a href="{{ route('show', $article->id) }}" class="text-decoration-none text-dark">
                            <div class="card h-100 shadow-sm">
                                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="Изображение новости">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $article->title }}</h5>
                                    @if(isset($article->shortDesc))
                                        <p class="card-text mb-2">{{ $article->shortDesc }}</p>
                                    @endif
                                    <div class="mt-auto">
                                        <p class="mb-1"><strong>Пользователь:</strong> {{ $article->user->name }}</p>
                                        <p class="mb-0"><strong>Дата:</strong> {{ $article->datePublic }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <p class="text-center fs-4 w-100">Новости не найдены.</p>
            @endif
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $articles->links() }}
        </div>
    </section>
@endsection
