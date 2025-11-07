@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @can('create', App\Models\Article::class)
            <a href="{{route('article.create')}}">
                добавить новость
            </a>
        @endcan
        @if(count($articles) > 0)
            @foreach($articles as $article)
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <a><div class="fw-bold">{{$article->title}}</div></a>
                        </div>
                        <span class="badge bg-primary rounded-pill">комоенты</span>
                        <a href="{{route('article.edit',$article->id)}}">Изменить</a>
                        <form action="{{route('article.delete',$article->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены, что хотите удалить?')">Удалить</button>
                        </form>
                    </li>
                </ol>
            @endforeach
        @else
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Новостей нет</li>
            <ul>
        @endif
    </div>
</div>
@endsection
