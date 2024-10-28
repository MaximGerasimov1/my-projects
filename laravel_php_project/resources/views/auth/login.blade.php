@extends('layout.main')

@section('page-title')
Log in
@endsection

@section('content')
<h1>Log in</h1>
<a href="/" class="back-button">On the main page</a>
<div class="container">
    <form method="POST" action="/login" class="article-form">
        @csrf

        <label for="email">Email</label>
        <input id="email" type="email" name="email">

        <label for="password">Password</label>
        <input id="password" type="password" name="password">

        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label for="remember">Remeber me</label>

        <input type="submit" value="Log in" class="login-btn">
    </form>
@endsection


{{-- <div class="row mb-0">
    <div class="col-md-8 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
        </button>

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </div>
</div> --}}