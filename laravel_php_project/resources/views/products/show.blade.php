@extends('layout.main') <!-- подключаю файл main из папки layout -->

@section('page-title')
{{ $product->title }}
@endsection

@section('content') <!-- помещаю дальнейший html код в 'content' -->
    <h1 id="heading">The MaxGDev's production</h1><br>
    <h3 id="heading__hoodi">The category of product: <u>{{ $product->category }}</u></h3>
    <div class="products one">
        <div class="post">
            <h2>{{ $product->title }}</h2>
            <p class="anons">{{ $product->anons }}</p>
            <p id="price"><b>Price: </b>{{ $product->price }} rub</p>
            <a href="#">Buy</a>
        </div>
    </div>
@endsection