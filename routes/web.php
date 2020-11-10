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

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::group(['prefix' => 'short-urls'], static function () {
        Route::get('', [ShortUrlController::class,'index']);
        Route::get('create',[ShortUrlController::class,'create']);
        Route::post('', [ShortUrlController::class,'store']);
        Route::match(['put', 'patch'],'{short-url}',[ShortUrlController::class,'update']);
        Route::delete('{short-url}',[ShortUrlController::class,'delete']);
    });
});

