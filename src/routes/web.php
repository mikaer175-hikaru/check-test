<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 認証関連
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// お問い合わせフォーム関連
Route::get('/', [FormController::class, 'show'])->name('contact.form');
Route::post('/confirm', [FormController::class, 'confirm'])->name('contact.confirm');
Route::post('/send', [FormController::class, 'send'])->name('contact.send');
Route::get('/thanks', [FormController::class, 'thanks'])->name('contact.thanks');

// 管理画面
Route::get('/admin', [AdminContactController::class, 'index'])->name('admin.index');
Route::delete('/admin/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');