<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/login', [TestController::class, 'login'])->name('login');
Route::post('/login', [TestController::class, 'loginSubmit'])->name('login.submit');

Route::post('/logout', [TestController::class, 'logout'])->name('logout');

Route::get("/register", [TestController::class, "register"])->name("register");
Route::post('/register', [TestController::class, 'registerSubmit'])->name('register.submit');

Route::get("/", [TestController::class, "index"])->name("shop.index");

Route::get('/products/create', [TestController::class, 'create'])->name('products.create');

Route::get("/products/{id}", [TestController::class, "show"])->name("products.show");

Route::get('/buy/{id}', [TestController::class, 'buy'])->name('buy.page');


Route::get('/mypage', [TestController::class, 'mypage'])->name('mypage');

Route::get('/account/edit', [TestController::class, 'edit'])->name('account.edit');

Route::post('/account/edit', [TestController::class, 'updateAccount'])->name('account.update');

Route::get('/mypage/products', [TestController::class, 'myProducts'])->name('mypage.products');

Route::get("/inquiry", [TestController::class, "inquiry"])->name('inquiry');
Route::post('/inquiry', [TestController::class, 'inquirySubmit'])->name('inquiry.submit');

Route::post('/products', [TestController::class, 'store'])->name('products.store');

Route::get('/products/{id}/edit', [TestController::class, 'editProduct'])->name('products.edit');

Route::post('/products/{id}/update', [TestController::class, 'updateProduct'])->name('products.update');

Route::post('/buy/{id}', [TestController::class, 'purchase'])->name('purchase.store');

Route::post('/products/{id}/like', [TestController::class, 'like'])->name('products.like');

Route::post('/mypage/products/{id}/delete', [TestController::class, 'deleteProduct'])->name('products.delete');

Route::get('/mypage/products/{id}', [TestController::class, 'saleShow'])->name('products.sale.show');