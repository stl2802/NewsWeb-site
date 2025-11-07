@extends('layouts.pages')
@section('title','Создание страницы')
@section('content')
    <form action="{{ route ('article.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="txtTitle" class="form-label">Новость</label>
            <input name="title" id="txtTitle" class="form-control @error('title') is-invalid @enderror " value="{{old('title')}}">
            @error('title')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">
                Описание
            </label>
            <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" rows="3">{{ old('desc') }}</textarea>
            @error('desc')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="row mb-3">
            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image')}}</label>

            <div class="col-md-6">
                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" autocomplete="image" autofocus>

                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div>
            <label for="shortDesc" class="form-label">Краткое описание</label>
            <input name="shortDesc" type="text" id="shortDesc" class="form-control @error('shortDesc') is-invalid @enderror" value="{{ old('shortDesc') }}">
            @error('shortDesc')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary" value="Добавить">
    </form>
@endsection
