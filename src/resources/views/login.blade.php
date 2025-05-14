@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login">
    <div class="login__box">
        <h2 class="login__title">Login</h2>
        <form method="POST" action="{{ route('login') }}" class="login__form">
            @csrf
            <div class="login__form-group">
                <label for="email" class="login__label">メールアドレス</label>
                <input type="email" name="email" class="login__input" placeholder="例：test@example.com" value="{{ old('email') }}">
                @error('email')
                    <p class="login__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="login__form-group">
                <label for="password" class="login__label">パスワード</label>
                <input type="password" name="password" class="login__input" placeholder="例：coachtech106">
                @error('password')
                    <p class="login__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="login__button">
                <button type="submit" class="login__button-submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection
