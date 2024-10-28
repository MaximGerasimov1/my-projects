@extends('layout.main') <!-- подключаю файл main из папки layout -->

@section('page-title')
{{ $title }}
@endsection

@section('content')  <!-- помещаю дальнейший html код в 'content' -->
    <div class="block">
        <h1>About us</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem, sed harum? Officiis voluptatum repudiandae aut ad. Eos laboriosam, velit nam itaque optio ipsam recusandae deserunt aut, incidunt, aliquam quis illo!</p>

        @if(count($params) > 0)
        <ul>
            @foreach ($params as $el)
                <li>{{ $el }}</li>
            @endforeach
        </ul>
        @endif
    </div>
@endsection
