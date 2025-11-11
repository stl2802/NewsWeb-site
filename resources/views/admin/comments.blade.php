@extends('layouts.admin')
@section('content')
    <style>
        .form_del{
            display: none;
        }
    </style>
    <h4>Таблица подтверждения комментариев</h4>
    <a href="{{route('admin.comments')}}">перезагрузить посты</a>
    <table>
        <tr>
            <th>id</th>
            <th>Контент</th>
            <th>Аватарка пользователя создавшего комментарий</th>
            <th>Имя создавшего пользователя</th>
            <th>user_id</th>
            <th>created_at</th>
        </tr>
        @foreach($unCheckComments as $comment)
            <tr>
                <td id="comment-{{$comment->id}}">{{$comment->id}}</td>
                <td>{{$comment->content}}</td>
                <td><img src="asset('storage/' . $comment->user->avatar)" alt="Аватарка пользователя" /></td>
                <td>{{$comment->user->name}}</td>
                <td>{{$comment->user_id}}</td>
                <td>{{$comment->created_at}}</td>
            </tr>
            <tr id="comment-{{$comment->id}}">
                <td colspan="9" class="p-0">
                    <div class="text-center my-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#extraButtons{{$comment->id}}" aria-expanded="false" aria-controls="extraButtons{{$comment->id}}">
                            &#9660; Раскрыть опции
                        </button>
                    </div>
                    <div class="collapse" id="extraButtons{{$comment->id}}">
                        <div class="flexi">
                            <form action="{{ route('comment.delete', $comment->id) }}#comment-{{$comment->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input value="{{$comment->id}}" class="form_del" type="hidden">
                                <button class="btn darc" type="submit">Удалить</button>
                            </form>
                            <form action="{{ route('comment.confirm', $comment->id) }}#comment-{{$comment->id}}" method="post">
                                @csrf
                                @method('PATCH')
                                <input value="{{$comment->id}}" class="form_del" type="hidden">
                                <button class="btn darc" type="submit">Подтвердить</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="custom-pagination">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </div>
@endsection
