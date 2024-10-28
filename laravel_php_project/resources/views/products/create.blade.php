@extends('layout.main') <!-- подключаю файл main из папки layout -->

@section('page-title')
Page with some products
@endsection

@section('content')  <!-- помещаю дальнейший html код в 'content' -->
    <div class="products">
        @foreach ($products as $el)
            <div class="post">
                <h2>{{ $el->title }}</h2>
                <p class="anons">{{ $el->anons }}</p>
                <p id="price"><b>Price: </b>{{ $el->price }} rub</p>
                <a href="/public/shop/{{ $el->id }}">In more detail</a>
            </div>
        @endforeach
    </div>
@endsection
