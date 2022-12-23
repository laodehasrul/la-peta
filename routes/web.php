<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PermohonanController;
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

Route::get('/login', [FrontendController::class, 'login'])->name('login');
Route::get('/register', [FrontendController::class, 'register'])->name('register');
Route::get('/unduh-formulir', [PermohonanController::class, 'formulir'])->name('formulir');
Route::get('/layanan-permohonan', [PermohonanController::class, 'layanan_permohonan'])->name('layanan_permohonan');
Route::post('/layanan-permohonan/post', [PermohonanController::class, 'formpost'])->name('form.post');

Route::get('/', [FrontendController::class, 'home'])->name('/');
Route::get('/pengumuman', [FrontendController::class, 'pengumuman']);
Route::get('/profile-pejabat', [FrontendController::class, 'pejabat']);
Route::get('/profile-pejabat/{slug}', [FrontendController::class, 'detailpejabat'])->name('detailpejabat');
Route::get('/page/{slug}', [FrontendController::class, 'page']);
Route::get('/struktur-organisasi/{slug}', [FrontendController::class, 'strukturorganisasi']);
Route::get('/berita/{slug}', [FrontendController::class, 'berita']);
Route::get('/berita/kategori/{slug}', [FrontendController::class, 'kategori']);
Route::get('/kanal-galery', [FrontendController::class, 'galery']);
Route::get('/kanal-galery/{id}', [FrontendController::class, 'detailgalery'])->name('detailgalery');

Route::get('/berita/{Category:slug}/{slug}', [FrontendController::class, 'detailberita'])->name('detailberita');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

