@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container my-4">
        <div class="container my-4 bg-darkblue text-light p-3 rounded">
            <div class="card p-3 bg-darkblue text-light">
                <div class="d-flex align-items-center">
                    <div class="position-relative me-3" style="width: 100px; height: 100px;">
                        <div class="avatar-wrapper rounded-circle overflow-hidden" style="width: 100%; height: 100%; background: linear-gradient(to top, #001f3f 30%, transparent 30%);">
                            <img src="{{ asset('storage/' . \Illuminate\Support\Facades\Auth::user()->avatar) }}" alt="Avatar" class="w-100 h-100 object-fit-cover rounded-circle">
                            <div class="d-flex justify-content-center align-items-center w-100 h-100 bg-secondary text-white fs-4" style="height: 100%; width: 100%;">
                                <i class="bi bi-person-fill"></i> <!-- иконка Bootstrap Icons -->
                            </div>
                        </div>
                        <form id="avatarForm" action="{{ route('profile.avatar.update',Auth::user()) }}" method="POST" enctype="multipart/form-data" style="position: absolute; bottom: 0; right: 0;">
                            @csrf
                            @method('PATCH')
                            <label class="btn btn-sm btn-primary mb-0" style="border-radius: 50%; padding: 5px; position: relative; cursor: pointer;">
                                <i class="bi bi-camera"></i>
                                <input type="file" name="image" style="display: none;" onchange="document.getElementById('avatarForm').submit();">
                            </label>
                        </form>
                    </div>

                    <!-- Информация -->
                    <div style="flex: 1;">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="mb-0" id="nameDisplay">{{ $user->name }}</h5>
                            <button class="btn btn-sm btn-outline-light" id="editBtn">Изменить</button>
                        </div>
                        <form id="profileForm" action="{{ route('profile.update', Auth::user()) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="mb-2">
                                <label for="name" class="form-label mb-1">Имя</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" value="{{ $user->name }}" disabled>
                            </div>
                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror

                            <div class="mb-2">
                                <label for="email" class="form-label mb-1">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror " id="email" name="email" value="{{ $user->email }}" disabled>
                            </div>
                            @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror

                            <div class="mb-2">
                                <label for="password" class="form-label mb-1">Пароль</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror " id="password" name="password" disabled>
                                <small class="text-muted">Введите новый пароль, чтобы изменить</small>
                            </div>
                            @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror

                            <div class="mt-3 d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary me-2" id="cancelBtn">Отмена</button>
                                <button type="submit" class="btn btn-light">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
