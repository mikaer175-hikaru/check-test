@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="register">
        <h2 class="register__title">Register</h2>
        <form class="register__form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form__group">
                <label>お名前</label>
                <input type="text" name="name" placeholder="例：山田 太郎" required>
            </div>
            <div class="form__group">
                <label>メールアドレス</label>
                <input type="email" name="email" placeholder="例：test@example.com" required>
            </div>
            <div class="form__group">
                <label>パスワード</label>
                <input type="password" name="password" placeholder="例：coachtech106" required>
            </div>
            <button type="submit" class="form__button">登録</button>
        </form>
    </div>
@endsection
