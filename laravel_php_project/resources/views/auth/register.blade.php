@extends('layout.main')

@section('page-title')
Registration
@endsection

@section('content')
    <h1>Registration</h1>
    <a href="/" class="back-button">On the main page</a>
    <form method="POST" action="/register" class="article-form">
        @csrf

        <label for="name">Name</label>
        <input id="name" type="text" value="{{ old('name') }}" name="name">

        <label for="email">Email</label>
        <input id="email" type="email" name="email">

        <label for="password">Password</label>
        <input id="password" type="password" name="password">

        <label for="password-confirm">Password confirmation</label>
        <input id="password-confirm" type="password" name="password_confirmation" >
            
        <input type="submit" value="Register">
        </form>
@endsection
