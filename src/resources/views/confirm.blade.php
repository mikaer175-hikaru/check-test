@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')
<div class="contact">
    <div class="contact__container">
        <h1 class="contact__title">Confirm</h1>

        <table class="contact__table">
            <tr>
                <th class="contact__table-header">お名前</th>
                <td class="contact__table-data">{{ $data['last_name'] }} {{ $data['first_name'] }}</td>
            </tr>
            <tr>
                <th class="contact__table-header">性別</th>
                <td class="contact__table-data">{{ $data['gender'] }}</td>
            </tr>
            <tr>
                <th class="contact__table-header">メールアドレス</th>
                <td class="contact__table-data">{{ $data['email'] }}</td>
            </tr>
            <tr>
                <th class="contact__table-header">電話番号</th>
                <td class="contact__table-data">{{ $data['tel'] }}</td>
            </tr>
            <tr>
                <th class="contact__table-header">住所</th>
                <td class="contact__table-data">{{ $data['address'] }}</td>
            </tr>
            <tr>
                <th class="contact__table-header">お問い合わせの種類</th>
                <td class="contact__table-data">
                    {{ \App\Models\Category::find($data['category_id'])->name ?? '不明' }}
                </td>
            </tr>
            <tr>
                <th class="contact__table-header">お問い合わせ内容</th>
                <td class="contact__table-data">{!! nl2br(e($data['message'])) !!}</td>
            </tr>
        </table>

        {{-- hiddenでデータ保持 --}}
        <form method="POST" action="{{ route('contact.send') }}" class="contact__confirm-form">
            @csrf
            @foreach ($data as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach

            <div class="contact__actions">
                <button type="submit" class="contact__button">送信</button>
                <a href="{{ route('contact.form') }}"
                   onclick="event.preventDefault(); document.getElementById('back-form').submit();"
                   class="contact__link">修正</a>
            </div>
        </form>

        {{-- 修正用のフォーム --}}
        <form method="POST" action="{{ route('contact.form') }}" id="back-form" style="display:none;">
            @csrf
            @foreach ($data as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
        </form>
    </div>
</div>
@endsection
