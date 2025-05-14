<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'last_name' => 'required|string|max:50',
            'first_name' => 'required|string|max:50',
            'gender' => 'required|in:男性,女性',
            'email' => 'required|email',
            'tel' => ['required', 'digits_between:1,5', 'regex:/^[0-9]+$/'], // 半角数字のみ、5桁まで
            'address' => 'required|string|max:100',
            'category' => 'required|not_in:',
            'message' => 'required|string|max:120',
        ];
    }

    public function messages(): array
    {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel.required' => '電話番号を入力してください',
            'tel.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel.regex' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'category.required' => 'お問い合わせの種類を選択してください',
            'category.not_in' => 'お問い合わせの種類を選択してください',
            'message.required' => 'お問い合わせ内容を入力してください',
            'message.max' => 'お問合せ内容は120文字以内で入力してください',
        ];
    }
}
