<!-- resources/views/admin/contacts/index.blade.php -->
@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<div class="contact-admin">
    {{-- メッセージ表示 --}}
    @if(session('message'))
        <div class="contact-message contact-message--success">
            {{ session('message') }}
        </div>
    @endif

    <h1 class="contact-admin__title">Admin</h1>

    {{-- 検索フォーム --}}
    <form method="GET" action="{{ route('contacts.index') }}" class="contact-filter">
        <input type="text" name="keyword" value="{{ request('keyword') }}"
               placeholder="名前やメールアドレスを入力してください"
               class="contact-filter__input" />

        <select name="gender" class="contact-filter__select">
            <option value="">性別</option>
            <option value="1" @selected(request('gender') == '1')>男性</option>
            <option value="2" @selected(request('gender') == '2')>女性</option>
            <option value="3" @selected(request('gender') == '3')>その他</option>
        </select>

        <select name="category" class="contact-filter__select">
            <option value="">お問い合わせの種類</option>
            <option value="商品の交換について" @selected(request('category') === '商品の交換について')>商品の交換について</option>
            <option value="商品について" @selected(request('category') === '商品について')>商品について</option>
        </select>

        <input type="date" name="contact_date" value="{{ request('contact_date') }}"
               class="contact-filter__input" />

        <div class="contact-filter__buttons">
            <button type="submit" class="contact-filter__button contact-filter__button--search">検索</button>
            <a href="{{ route('contacts.index') }}" class="contact-filter__button contact-filter__button--reset">リセット</a>
        </div>
    </form>

    {{-- エクスポート --}}
    <form method="GET" action="{{ route('contacts.export') }}" class="contact-export">
        @foreach (request()->query() as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <button type="submit" class="contact-export__button">エクスポート</button>
    </form>

    {{-- 一覧表示 --}}
    <div class="contact-table-wrapper">
        <table class="contact-table">
            <thead class="contact-table__head">
                <tr class="contact-table__row">
                    <th class="contact-table__cell">お名前</th>
                    <th class="contact-table__cell">性別</th>
                    <th class="contact-table__cell">メールアドレス</th>
                    <th class="contact-table__cell">お問い合わせの種類</th>
                    <th class="contact-table__cell"></th>
                </tr>
            </thead>
            <tbody class="contact-table__body">
                @forelse ($contacts as $contact)
                <tr class="contact-table__row">
                    <td class="contact-table__cell">{{ $contact->full_name }}</td>
                    <td class="contact-table__cell">{{ $contact->gender_label }}</td>
                    <td class="contact-table__cell">{{ $contact->email }}</td>
                    <td class="contact-table__cell">{{ $contact->category->name ?? '未設定' }}</td>
                    <td class="contact-table__cell">
                        <button type="button" class="contact-table__button" onclick="openModal({{ $contact->id }})">詳細</button>
                    </td>
                </tr>
                @empty
                <tr class="contact-table__row">
                    <td class="contact-table__cell contact-table__cell--empty" colspan="5">データがありません</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- ページネーション --}}
    <div class="contact-pagination">
        {{ $contacts->appends(request()->query())->onEachSide(1)->links() }}
    </div>
</div>
@endsection
