@extends('layouts.admin')
@section('content')
    <style>
        .form_del{
            display: none;
        }
    </style>
    <h4>Таблица постов</h4>
    <table>
        <tr>
            <th>id</th>
            <th>Название</th>
            <th>Краткое описание</th>
            <th>Превью</th>
            <th>Описание</th>
            <th>Контент</th>
            <th>user_id</th>
            <th>Теги</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>deleted_at</th>
        </tr>
        @foreach($articles as $article)
            <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->shortDesc}}</td>
                <td><img src="{{$article->image}}" alt="Картинка Поста"></td>
                <td>{{$article->desc}}</td>
                <td> src="{{$article->content}}</td>
                <td>{{$article->user_id}}</td>
                <td>{{$article->tags}}</td>
                <td>{{$article->created_at}}</td>
                <td>{{$article->updated_at}}</td>
                <td>{{$article->deleted_at}}</td>
            </tr>
            <tr>
                <td colspan="9" class="p-0">
                    <div class="text-center my-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#extraButtons{{$article->id}}" aria-expanded="false" aria-controls="extraButtons{{$article->id}}">
                            &#9660; Раскрыть опции
                        </button>
                    </div>
                    <div class="collapse" id="extraButtons{{$article->id}}">
                        <div class="flexi">
                            <form action="{{route('article.delete',$article->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input value="{{$article->id}}" class="form_del" type="hidden">
                                <button class="btn darc" type="submit">Удалить</button>
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
