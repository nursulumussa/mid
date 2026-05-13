<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlowerController;

Route::get('/', [FlowerController::class, 'index']);
Route::get('/catalog', [FlowerController::class, 'catalog']);
Route::get('/about', [FlowerController::class, 'about']);
Route::get('/contacts', [FlowerController::class, 'contacts']);
Route::get('/cart', [FlowerController::class, 'cart'])->name('cart');


Route::post('/send-message', [FlowerController::class, 'sendMessage'])->name('send.message');


Route::prefix('cart')->name('cart.')->group(function () {
    Route::post('/add/{flower}', [FlowerController::class, 'addToCart'])->name('add');
    Route::post('/remove/{id}', [FlowerController::class, 'removeFromCart'])->name('remove');
    Route::post('/clear', [FlowerController::class, 'clearCart'])->name('clear');
});


Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [FlowerController::class, 'admin'])->name('dashboard');
    Route::post('/flowers', [FlowerController::class, 'store'])->name('flowers.store');
    Route::delete('/flowers/{flower}', [FlowerController::class, 'destroy'])->name('flowers.destroy');
    Route::get('/messages', [FlowerController::class, 'messages'])->name('messages');
    Route::post('/messages/{message}/reply', [FlowerController::class, 'replyMessage'])->name('messages.reply');
});


Route::get('/admin-login', [FlowerController::class, 'adminLogin'])->name('admin.login');
Route::post('/admin-login', [FlowerController::class, 'adminLoginPost'])->name('admin.login.post');
Route::get('/admin-logout', [FlowerController::class, 'adminLogout'])->name('admin.logout');

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ru', 'kz'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('lang.switch');