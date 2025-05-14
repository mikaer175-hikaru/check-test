@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')
<div class="contact">
    <div class="contact__container contact__container--thanks">
        <p class="contact__message">お問い合わせありがとうございました</p>

        <div class="contact__actions">
            <a href="{{ route('home') }}" class="contact__button">HOME</a>
        </div>
    </div>
</div>
@endsection
