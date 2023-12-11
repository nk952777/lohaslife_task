<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// 默认语言路由
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/detail/{id}', [IndexController::class, 'detail'])->name('detail');

// 指定语言路由
Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'zh-CN|en|zh-TW'], 'middleware' => 'locale'], function () {
    Route::get('/', [IndexController::class, 'index'])->name('localized.index');
    Route::get('/detail/{id}', [IndexController::class, 'detail'])->name('localized.detail');
});