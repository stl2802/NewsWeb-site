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

    </style>

    <section class="container my-4">
        <div class="cards-container">
            @if(count($articles) > 0)
                @foreach($articles as $article)
                    <div class="col-md-4 col-sm-6 mb-4 d-flex align-items-stretch">
                        <a href="{{route('show',$article->id)}}" class="text-decoration-none text-dark w-100">
                            <div class="card h-100 shadow-sm">
                                <img src="{{ asset('storage/images/img.png') }}" class="card-img-top" alt="Изображение новости">
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
                <p class="text-center fs-4">Новости не найдены.</p>
            @endif
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $articles->links() }}
        </div>
    </section>
@endsection
