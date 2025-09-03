@extends('layouts.pages')
@section('title','Новости')
@section('content')
    <section>
        @if(count($articles) > 0)
            @foreach($articles as $article)
                <div class="card" style="width: 18rem;">
                    <a href="{{route('show',$article->id)}}">
                        <img src="{{asset('storage/images/img.png') }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        @if(isset($article->shortDesc))
                            <p class="mb-1">описание:{{$article->shortDesc}}</p>
                        @endif
                        <p class="mb-0">пользователь:{{$article->user->name}}</p>
                        <p class="mb-0">дата:{{$article->datePublic}}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center">новостей не найдено.</p>
        @endif
    </section>
@endsection
