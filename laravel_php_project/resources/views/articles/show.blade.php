@extends('layout.main') <!-- подключаю файл main из папки layout -->

@section('page-title')
{{ $data['article']->title }}
@endsection

@section('content') <!-- помещаю дальнейший html код в 'content' -->
    <h1>{{ $data['article']->title }} / The article on MaxGDev</h1>
    <a href="/" class="back-button">On the main page</a>
    <div class="articles one">
        <div class="post">
            <img src="/storage/img/articles/{{$data['article']->image}}">
            <h2>{{ $data['article']->title }}</h2>
            <p>{{ $data['article']->anons }}</p><br>
            <p>{!! $data['article']->text !!}</p>
            <p><b>Author: </b>{{ $data['article']->user->name }}</p>

            @auth
                @if(Auth::user()->id == $data['article']->user_id)
                    <br><hr>
                    <a href="/article/{{$data['article']->id}}/edit">Edit</a>
                    {!! Form::open(['method' => 'DELETE', 'action' => ['ArticlesController@destroy', $data['article']->id]]) !!}
                        {{ Form::submit('Delete', ['class' => 'delete-button']) }}
                    {!! Form::close() !!}
                @endif
            @endauth
        </div>
    </div>


    {{-- <div class="comments">   
        @foreach ($comments as $el)
            @if($el->article_id == $article->id) {
                <p>{{ $el->comment_text }}</p>
            }
            @endif
        @endforeach
    </div> --}}

    @if(count($data['comments']) > 0)
        @foreach($data['comments'] as $comm)
            <div class="comments">{{ $comm->comment_text }}</div>
        @endforeach
    @endif

    <h1>Comment Form</h1>
    {!! Form::open(['action' => 'ArticlesController@store', 'method' => 'POST', 'class' => 'article-form']) !!}
        <div class="form-group">
            {{ Form::label('comment', 'Комментарий') }}
            {{ Form::textarea('comment', '', ['class' => 'form-control', 'placeholder' => 'Enter a comment']) }}
        </div>
    {{--    нам необходимо в форму также передавать id статьи, ибо это поле также необходимо помещать в таблицу с комментариями--}}
    {{ Form::hidden('article_id', $data['article']->id) }}
    {{ Form::submit('Добавить', ['class' => 'btn btn-success']) }}
    {!! Form::close() !!}
@endsection