<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [AuthController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/auth', [AuthController::class, 'loginAuth'])->name('login.auth');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register.store', [AuthController::class, 'store'])->name('register.store');
Route::post('/register/update/{id}', [AuthController::class, 'updateAccount'])->name('register.update');
Route::post('/register/delete/{id}', [AuthController::class, 'deleteAccount'])->name('register.delete');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::get('/dashboard', [AuthController::class, 'admin'])->name('admin');
Route::get('/product', [ProductController::class, 'productAdmin'])->name('product');
Route::post('/product/create', [ProductController::class, 'store'])->name('product.create');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::post('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
Route::get('/payment', [SaleController::class, 'paymentAdmin'])->name('payment');

// User
Route::get('/dashboard-user', [AuthController::class, 'user'])->name('user');
Route::get('/user/product', [ProductController::class, 'productUser'])->name('user.product');
Route::get('/user/payment', [SaleController::class, 'paymentUser'])->name('user.payment');
Route::get('/user/payment/detail-sale', [SaleController::class, 'detailSale'])->name('detailsale');
Route::post('/user/payment/detail-sale/create', [SaleController::class, 'detailSaleStore'])->name('detailsale.store');
Route::get('/user/payment/detail-sale/customer-form', [SaleController::class, 'customer'])->name('customer');
Route::post('/user/payment/detail-sale/customer-form/create', [SaleController::class, 'customerStore'])->name('customer.store');
Route::post('/user/payment/delete/{id}', [SaleController::class, 'deleteSale'])->name('sale.delete');
