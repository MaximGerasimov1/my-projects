@extends('layout.main') <!-- подключаю файл main из папки layout -->

@section('page-title')
Adding an article
@endsection

@section('content') <!-- помещаю дальнейший html код в 'content' -->
    <h1>Adding an article</h1>
    <a href="/" class="back-button">On the main page</a>
    {!! Form::open(['class' => 'article-form', 'enctype' => 'multipart/form-data']) !!}
        {{ Form::label('title', 'The title of the article') }}
        {{ Form::text('title', '', ['placeholder' => 'Entet a title of the article']) }}

        {{ Form::label('anons', 'Anons of the article') }}
        {{ Form::textarea('anons', '', ['placeholder' => 'Entet an anons of the article']) }}

        {{ Form::label('main_image', 'Photo of article') }}
        {{ Form::file('main_image') }}

        {{ Form::label('text', 'The main text of the article') }}
        {{ Form::textarea('text', '', ['placeholder' => 'Entet a text of the article', 'id' => 'editor']) }}

        {{ Form::submit('Add', ['class' => 'add-button']) }}
    {!! Form::close() !!}
    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.2.0/"
            }
        }
    </script>
    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font
        } from 'ckeditor5';

        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        window.onload = function() {
            if ( window.location.protocol === "file:" ) {
                alert( "This sample requires an HTTP server. Please serve this file with a web server." );
            }
        };
</script>
@endsection