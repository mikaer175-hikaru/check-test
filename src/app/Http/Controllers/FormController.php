<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class FormController extends Controller
{
    // 入力画面表示
    public function show()
    {
        $categories = Category::all();
        return view('form', compact('categories'));
    }

    // 確認画面
    public function confirm(ContactRequest $request)
    {
        // validated の方がセキュリティ的に安全
        $data = $request->validated();

        return view('confirm', compact('data'));
    }

    // 送信処理（DB保存やメール送信など）
    public function send(Request $request)
    {
        // セッションのデータを使って送信（例：メール送信・DB保存）
        $data = $request->only([
            'category_id', 'first_name', 'last_name', 'gender',
            'email', 'tel', 'address', 'building', 'detail'
        ]);
        
        Contact::create($data);
        
        // 成功後、完了画面へ
        return redirect()->route('thanks');
    }

    // 完了画面
    public function thanks()
    {
        return view('thanks');
    }
}