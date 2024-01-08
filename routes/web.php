<?php

use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Productall;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/ProductList',[HomeController::class,'homer'])->name('Product');
Route::get('/AccessoryList',[HomeController::class,'homered'])->name('Accessory');
Route::get('/welcome', [HomeController::class, 'welcome'])->name('welcome');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/submit', [AuthController::class, 'login_submit'])->name('login_submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register_submit', [AuthController::class, 'register_submit'])->name('register_submit');

//ProductsController
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product.create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product.create.submit', [ProductController::class, 'store'])->name('product.create.submit');
Route::resource('products', ProductController::class);
Route::get('/product/{id}', [ProductController::class, 'add_product_to_cart'])->name('add.to.cart');
// Route::delete('/delete-cart-product', [ProductController::class, 'delete_product_in_cart'])->name('delete.cart');
// Route::delete('/delete-cart-product', [ProductController::class, 'deleteProduct'])->name('delete.cart.product');
// Route::patch('/update-shopping-cart', [ProductController::class, 'updateCart'])->name('update.sopping.cart');
Route::patch('update-cart', [ProductController::class, 'update_cart'])->name('update_cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove_cart'])->name('remove_from_cart');

//CccessoryController
Route::resource('accessory', AccessoryController::class);

//CartController
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

//OderController
Route::resource('oder', OrderController::class);
Route::get('/userRequestOrder', [OrderController::class, 'userRequestOrder'])->name('userRequestOrder');
Route::patch('update-cart-order', [OrderController::class, 'update_cart'])->name('update-cart-order');
Route::delete('remove-from-order', [OrderController::class, 'remove_cart'])->name('remove-from-order');
Route::get('/view-user-order', [OrderController::class, 'view_user_order'])->name('view-user-order');
Route::get('/view-pay-order', [OrderController::class, 'view_pay_order'])->name('view-pay-order');

Route::get('/admin/editsubject/{id}', [OrderController::class, 'EditSubject'])->name('admin.editsubject');
Route::put('/admin/updatesubject/{id}',[OrderController::class,'UpdateSubject'])->name('admin.updatesubject');

Route::get('/carder', function () {
    return view('all_page.cart.carder');
})->name('carder');


