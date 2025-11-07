@extends('layouts.pages')
@section('title','Новости')
@section('content')
    <section>
        @if(count($articles) > 0)
            @foreach($articles as $article)
                <div class="card" style="width: 18rem;">
                    <a href="{{route('show_json',$article->full_image)}}">
                        <img src="{{ asset('storage/images/laba/' . $article->preview_image) }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$article->name}}</h5>
                        @if(isset($article->shortDesc))
                            <p class="mb-1">описание:{{$article->shortDesc}}</p>
                        @endif
                        <p class="mb-0">дата:{{$article->date}}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center">новостей не найдено.</p>
        @endif
    </section>
@endsection
