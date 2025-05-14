@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')
<div class="contact">
    <div class="contact__container">
        <h1 class="contact__title">お問い合わせ</h1>

        <form method="POST" action="{{ route('contact.confirm') }}" class="contact__form">
            @csrf

            {{-- 姓 --}}
            <div class="contact__field">
                <label class="contact__label">姓</label>
                <input type="text" name="last_name" value="{{ old('last_name') }}" class="contact__input">
                @error('last_name')
                    <div class="contact__error">{{ $message }}</div>
                @enderror
            </div>

            {{-- 名 --}}
            <div class="contact__field">
                <label class="contact__label">名</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}" class="contact__input">
                @error('first_name')
                    <div class="contact__error">{{ $message }}</div>
                @enderror
            </div>

            {{-- 性別 --}}
            <div class="contact__field">
                <label class="contact__label">性別 <span class="contact__required">※</span></label>
                <select name="gender" class="contact__select">
                    <option value="男性" @selected(old('gender', '男性') === '男性')>男性</option>
                    <option value="女性" @selected(old('gender') === '女性')>女性</option>
                </select>
                @error('gender')
                    <div class="contact__error">{{ $message }}</div>
                @enderror
            </div>

            {{-- メールアドレス --}}
            <div class="contact__field">
                <label class="contact__label">メールアドレス <span class="contact__required">※</span></label>
                <input type="email" name="email" value="{{ old('email') }}" class="contact__input">
                @error('email')
                    <div class="contact__error">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- 電話番号 --}}
            <div class="contact__field">
                <label class="contact__label">電話番号 <span class="contact__required">※</span></label>
                <input type="text" name="tel" value="{{ old('tel') }}" class="contact__input">
                @error('tel')
                    <div class="contact__error">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- 住所 --}}
            <div class="contact__field">
                <label class="contact__label">住所 <span class="contact__required">※</span></label>
                <input type="text" name="address" value="{{ old('address') }}" class="contact__input">
                @error('address')
                    <div class="contact__error">{{ $message }}</div>
                @enderror
            </div>
            

            {{-- お問い合わせの種類 --}}
            <div class="contact__field">
                <label class="contact__label">お問い合わせの種類 <span class="contact__required">※</span></label>
                <select name="category_id" class="contact__select">
                    <option value="">選択してください</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="contact__error">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- メッセージ --}}
            <div class="contact__field">
                <label class="contact__label">内容</label>
                <textarea name="message" class="contact__textarea">{{ old('message') }}</textarea>
                @error('message')
                    <div class="contact__error">{{ $message }}</div>
                @enderror
            </div>

            <div class="contact__actions">
                <button type="submit" class="contact__button">確認画面</button>
            </div>
        </form>
    </div>
</div>
@endsection
