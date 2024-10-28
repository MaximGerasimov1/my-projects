@extends('layout.main') <!-- подключаю файл main из папки layout -->

@section('page-title')
The main page of web-site
@endsection

@section('content') <!-- помещаю дальнейший html код в 'content' -->
    <div class="presentation"></div>

    <div class="articles">
        @foreach ($articles as $el)
            <div class="post">
                <img src="/storage/img/articles/{{$el->image}}">
                <h2>{{ $el->title }}</h2>
                <p>{{ $el->anons }}</p>
                <p><b>Author: </b>{{ $el->user->name }}</p>
                <a href="/article/{{ $el->id }}">Read</a>
            </div>
        @endforeach
    </div>
@endsection