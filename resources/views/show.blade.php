@extends('layouts.pages')
@section('title', $article->title)
@section('information_message')
    @if(session('success'))
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="display-4 fw-bold text-center mb-4 text-primary">{{ $article->title }}</h1>
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <p class="card-text fs-5 text-muted lh-base">{{ $article->desc }}</p>
                        <div class="mt-4 pt-3 border-top">
                            <small class="text-muted">
                                <i class="fas fa-calendar-alt me-2"></i>
                                {{ $article->created_at->format('d.m.Y H:i') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-comment me-2"></i>Добавить комментарий
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('comment.store', ['article' => $article->id]) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="content" class="form-label">Ваш комментарий</label>
                                <textarea
                                    name="content"
                                    id="content"
                                    rows="4"
                                    class="form-control @error('content') is-invalid @enderror"
                                    placeholder="Напишите ваш комментарий..."
                                >{{ old('content') }}</textarea>
                                @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>Отправить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-comments me-2"></i>Комментарии
                            <span class="badge bg-primary rounded-pill ms-2">{{ count($checkComments) }}</span>
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        @if($checkComments->count() > 0)
                            <div class="list-group list-group-flush">
                                @foreach($checkComments as $comment)
                                    <div class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div class="flex-grow-1">
                                                <p class="mb-2 fs-6">{{ $comment->content }}</p>
                                                <div class="d-flex align-items-center">
                                                    <small class="text-muted me-3">
                                                        <i class="fas fa-user me-1"></i>{{ $comment->user->name }}
                                                    </small>
                                                    <small class="text-muted">
                                                        <i class="fas fa-clock me-1"></i>
                                                        {{ $comment->created_at->format('d.m.Y H:i') }}
                                                    </small>
                                                </div>
                                            </div>
                                            @auth
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                                            type="button"
                                                            data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a class="dropdown-item text-primary"
                                                               href="{{ route('comment.edit', ['comment' => $comment->id]) }}">
                                                                <i class="fas fa-edit me-2"></i>Изменить
                                                            </a>
                                                        </li>
                                                        <li><hr class="dropdown-divider"></li>
                                                        <li>
                                                            <form action="{{ route('comment.delete', ['comment' => $comment->id]) }}"
                                                                  method="POST"
                                                                  class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                        class="dropdown-item text-danger"
                                                                        onclick="return confirm('Вы уверены, что хотите удалить этот комментарий?')">
                                                                    <i class="fas fa-trash me-2"></i>Удалить
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endauth
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-comment-slash text-muted fa-3x mb-3"></i>
                                <p class="text-muted">Пока нет комментариев. Будьте первым!</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
