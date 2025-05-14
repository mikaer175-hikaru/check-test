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

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::delete('/admin/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/contact', [FormController::class, 'show'])->name('contact.form');
Route::post('/contact/confirm', [FormController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/send', [FormController::class, 'send'])->name('contact.send');
Route::get('/contact/thanks', [FormController::class, 'thanks'])->name('contact.thanks');