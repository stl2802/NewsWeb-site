@extends('layouts.pages')

@section('title', 'Доступ запрещен')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Доступ запрещен</div>

                    <div class="card-body text-center">
                        <h1>403</h1>
                        <p class="text-muted">{{ $message ?? 'У вас нет прав для доступа к этой странице' }}</p>

                        @auth
                            @if(auth()->user()->is_admin)
                                <p><small>Вы администратор, но у вас недостаточно прав для этого действия</small></p>
                            @else
                                <p><small>Обратитесь к администратору для получения доступа</small></p>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
