<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');




/* Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::group(['prefix' => 'short-urls'], function ($id) {
        Route::get('{short-url}/edit', [ShortUrlController::class,'edit'])->name('short-urls.edit');
     });
}); */
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::group(['prefix' => 'short-urls'], static function () {
        Route::get('{ShortUrl}/edit', [ShortUrlController::class,'edit'])->name('short-urls.edit');
        Route::get('', [ShortUrlController::class,'index'])->name('short-urls.overview');
        Route::get('create',[ShortUrlController::class,'create'])->name("short-urls.create");
        Route::get('succes',[ShortUrlController::class,'succes'])->name("short-urls.succes");
        Route::post('', [ShortUrlController::class,'store'])->name("short-urls.store");
        Route::match(['put', 'patch'],'{shortUrl}',[ShortUrlController::class,'update'])->name('short-urls.update');
        Route::delete('{shortUrl}',[ShortUrlController::class,'delete'])->name('short-urls.delete');
    });
});

Route::get("{short_url}",[ShortUrlController::class,'redirectShortUrl'])->name('redirect.link');