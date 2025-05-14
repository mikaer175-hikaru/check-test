<?php

namespace App\Providers;

use Laravel\Fortify\Fortify;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FortifyServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
         // ...（registerView や loginView の設定など）
         
        Fortify::authenticateUsing(function (Request $request) {
            // ✅ バリデーション処理（ここでルールとメッセージを定義）
            Validator::make($request->all(), [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ], [
                'email.required' => 'メールアドレスを入力してください',
                'email.email'    => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
                'password.required' => 'パスワードを入力してください',
            ])->validate();
    
            // ✅ 認証処理（成功すればUserを返す）
            $user = \App\Models\User::where('email', $request->email)->first();
    
            if ($user && \Hash::check($request->password, $user->password)) {
                return $user;
            }
    
            return null; // 認証失敗
        });
             
        // ログイン画面を自作のビューに割り当てる
        Fortify::loginView(function () {
            return view('auth.login'); // resources/views/auth/login.blade.php を利用
        });

        // 登録画面を自作のビューに割り当てる
        Fortify::registerView(function () {
            return view('auth.register'); // resources/views/auth/register.blade.php を利用
        });
    
        // カスタムユーザー登録処理の割り当て
        $this->app->singleton(CreatesNewUsers::class, CreateNewUser::class);
    }
}
        