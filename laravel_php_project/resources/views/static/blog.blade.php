@extends('layout.main') <!-- подключаю файл main из папки layout -->

@section('page-title')
{{ $title }}
@endsection

@section('content')  <!-- помещаю дальнейший html код в 'content' -->
    <div class="blog__block">
        <h2>An entry left by the user</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt, nisi! Quis consequuntur inventore nihil odio repellendus, omnis iure eveniet officia officiis ducimus, quidem autem dolorum nobis, at facilis praesentium ut.</p>
        <button type="button">More detailed</button>
    </div>

    <div class="blog__block">
        <h2>An entry left by the user</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt, nisi! Quis consequuntur inventore nihil odio repellendus, omnis iure eveniet officia officiis ducimus, quidem autem dolorum nobis, at facilis praesentium ut.</p>
        <button type="button">More detailed</button>
    </div>

    <div class="blog__block">
        <h2>An entry left by the user</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt, nisi! Quis consequuntur inventore nihil odio repellendus, omnis iure eveniet officia officiis ducimus, quidem autem dolorum nobis, at facilis praesentium ut.</p>
        <button type="button">More detailed</button>
    </div>

    <div class="blog__block">
        <h2>An entry left by the user</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt, nisi! Quis consequuntur inventore nihil odio repellendus, omnis iure eveniet officia officiis ducimus, quidem autem dolorum nobis, at facilis praesentium ut.</p>
        <button type="button">More detailed</button>
    </div>
@endsection