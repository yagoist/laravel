<?php

declare(strict_types=1);

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController as AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], static function() {
   Route::get('/', AdminController::class)
   ->name('admin.index');
});

Route::get('/news', [NewsController::class, 'index'])
    ->name('news');

Route::get('/news/{id}/show', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');
