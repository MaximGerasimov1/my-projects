@extends('layout.main')

@section('page-title')
User account
@endsection

@section('content')
    <div class="block">
        <h1>User account</h1>
        @if (session('status'))
            <div class="success-mess">
                {{ session('status') }}
            </div>
        @endif
        <p>Hello, {{ Auth::user()->name }}</p>
        <p>{{ Auth::user()->email }}</p>
    </div>

    @if(count($articles) > 0)
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
    @endif
@endsection
