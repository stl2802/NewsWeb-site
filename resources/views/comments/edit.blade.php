@extends('layouts.pages')
@section('title','Создание страницы')
@section('content')
    <form action="{{ route ('comment.update',['comment'=>$comment->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="txtContent" class="form-label">Контент</label>
            <input name="content" id="txtContent" class="form-control @error('content') is-invalid @enderror " value="{{$comment->content}}">
            @error('content')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <button type="submit">изменить</button>
    </form>
@endsection
