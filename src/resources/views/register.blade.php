@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register">
    <div class="register__box">
        <h2 class="register__title">Register</h2>
        <form method="POST" action="{{ route('register') }}" class="register__form">
            @csrf
            <div class="register__form-group">
                <label for="name" class="register__label">お名前</label>
                <input type="text" name="name" class="register__input" placeholder="例：山田 太郎" value="{{ old('name') }}">
                @error('name')
                    <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register__form-group">
                <label for="email" class="register__label">メールアドレス</label>
                <input type="email" name="email" class="register__input" placeholder="例：test@example.com" value="{{ old('email') }}">
                @error('email')
                    <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register__form-group">
                <label for="password" class="register__label">パスワード</label>
                <input type="password" name="password" class="register__input" placeholder="例：coachtech106">
                @error('password')
                    <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register__form-group">
                <label for="password_confirmation" class="register__label">パスワード（確認）</label>
                <input type="password" name="password_confirmation" class="register__input">
            </div>
            <div class="register__button">
                <button type="submit" class="register__button-submit">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection
