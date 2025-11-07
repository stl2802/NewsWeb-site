@extends('layouts.pages')
@section('title','Новость')
@section('content')
    <div class="container my-5">
        <h1 class="mb-4 text-center">{{$article->title}}</h1>
        <div class="mb-5">
            <p>{{$article->desc}}</p>
        </div>
    </div>
    <form action="{{ route('comment.store', ['article' => $article->id]) }}" method="POST">
        @csrf
        <textarea name="content" rows="4" cols="50"></textarea>
        <button type="submit">Добавить комментарий</button>
    </form>
    @foreach($article->comments as $comment)
        <ul class="list-group">
            <li class="list-group-item">
                {{ $comment->content }} <br>
                <small>{{ $comment->user->name }}</small>
                <div>
                    <a href="{{route('comment.edit',['comment'=>$comment->id])}}">изменить</a>
                    <form action="{{ route('comment.delete', ['comment' => $comment->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены, что хотите удалить?')">Удалить</button>
                    </form>
                </div>
            </li>
        </ul>
    @endforeach
@endsection
