<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsletterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('/', [App\Http\Controllers\ApiController::class, 'displayNews'])->name('index');
Route::post('/sourceId', [App\Http\Controllers\ApiController::class, 'displayNews'])->name('/sourceId');

Route::get('store-newsletter',[NewsletterController::class, 'index']);
Route::post('store-newsletter',[NewsletterController::class, 'store'])->name('store-newsletter.store');

Route::get('/search', [NewsletterController::class, 'searchNews'])->name('search');
Route::get('/latest', [NewsletterController::class, 'latestNews'])->name('latest');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
