@extends('mails.layouts.main')
@section('title', 'Создан комментарий под статьей')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Комментарий пришел</h4>
                    </div>

                    <div class="card-body">
                        <div class="comment-info mb-4">
                            <h5>Информация о комментарии:</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Статья:</strong>
                                    <p class="text-primary">{{ $article->title ?? 'Название статьи' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong>Автор комментария:</strong>
                                    <p>{{ auth()->user()->name ?? 'Пользователь' }}</p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <strong>Текст комментария:</strong>
                                <div class="border p-3 mt-2 bg-light rounded">
                                    <p class="mb-0">{{ $comment->content ?? 'Текст комментария' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="action-buttons">
                            <a href="{{ route('admin.comments') }}#comment-{{ $comment->id }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>К комментарию
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
