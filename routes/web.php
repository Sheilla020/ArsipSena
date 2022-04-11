<?php

use App\Http\Controllers\ArsipSenaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DownloadFileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\UserController;
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



Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('regis', [AuthController::class, 'regis'])->name('regis');
Route::post('proses_regis', [AuthController::class, 'proses_regis'])->name('proses_regis');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:1']], function () {
        /*
    		Route Khusus untuk role admin
    	*/
        Route::resource('admin', HomeController::class);
    });
    Route::group(['middleware' => ['cek_login:2']], function () {
        /*
    		Route Khusus untuk role editor
    	*/
        Route::resource('user', HomeController::class);
    });
});

Route::get('trash', [ArsipSenaController::class, 'trash'])->name('trash');
Route::post('{id}/restore', [ArsipSenaController::class, 'restore'])->name('restore');
Route::delete('{id}/delete-permanent', [ArsipSenaController::class, 'deletePermanent'])->name('deletePermanent');

Route::get('datauser', [UserController::class, 'index'])->name('index');
Route::get('profile', [UserController::class, 'profile'])->name('profile');

Route::get('createunit', [PanelController::class, 'createunit'])->name('createunit');
Route::post('storeunit', [PanelController::class, 'storeunit'])->name('storeunit');
Route::get('createcategory', [PanelController::class, 'createcategory'])->name('createcategory');
Route::post('storecategory', [PanelController::class, 'storecategory'])->name('storecategory');
Route::post('updatecategory/{id}', [PanelController::class, 'updatecategory'])->name('updatecategory');

Route::resource('arsip', ArsipSenaController::class);
Route::get('/{unit:unit}', [PanelController::class, 'unit'])->name('unit');

Route::get('download/{id}', [DownloadFileController::class, 'download'])->name('download');

// Route::get('home', function () {
//     return view('dashboard');
// });
