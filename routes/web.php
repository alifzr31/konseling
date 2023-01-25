<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GeneralIdeaController;
use App\Http\Controllers\KonsulController;
use App\Http\Controllers\UserController;
use App\Models\GeneralIdea;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contactstore', [ContactController::class, 'store'])->name('cs');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginstore'])->name('logstore');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('regstore');

Route::get('/profile', [UserController::class, 'edit'])->name('editprofil');
Route::post('/profile', [UserController::class, 'update'])->name('updateprofil');

Route::get('/konsultasi', [KonsulController::class, 'konsultasi'])->name('konsultasi');
Route::get('/konsuljiwa', [KonsulController::class, 'konsuljiwa'])->name('konsuljiwa');
Route::get('/konsulsosial', [KonsulController::class, 'konsulsosial'])->name('konsulsosial');
Route::get('/pembayaran', [KonsulController::class, 'rekening'])->name('rekening');
Route::post('/updatekonsul/{id}', [KonsulController::class, 'updatekonsul'])->name('updatekonsul');
Route::get('/generalidea', [GeneralIdeaController::class, 'mulaites'])->name('mulaites');
Route::post('/submit_tes/{id}', [GeneralIdeaController::class, 'submit_tes'])->name('submit_gi');

// ADMIN
Route::get('admin/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('admin/list_user', [UserController::class, 'listuser'])->name('listuser');
Route::get('admin/{id}', [UserController::class, 'detailuser'])->name('detailuser');

Route::get('acc/{id}', [KonsulController::class, 'acc'])->name('acc');
Route::get('/admin/detail_konsul/{id}', [KonsulController::class, 'detailkonsul'])->name('detailkonsul');
Route::post('/admin/aturjadwalgeneralidea', [GeneralIdeaController::class, 'store'])->name('generalidea-store');