<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailController;
use App\Http\Controllers\ProductPageController;

use App\Http\Middleware\CheckAdminMiddleware;
use App\Http\Middleware\CheckLoginMiddleware;


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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/product-page', [ProductPageController::class, 'productPage'])->name('product-page');

Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/show/{id}', [HomeController::class, 'show'])->name('show');

Route::get('/ViewCart', [CartController::class, 'ViewCart'])->name('ViewCart');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'process_login'])->name('process_login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'process_register'])->name('process_register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => checkLoginMiddleware::class], function () {
    Route::get('/order-history', [InvoiceController::class, 'orderHistory'])->name('order-history');
    Route::PUT('/change-status/{id}', [InvoiceController::class, 'changeStatus'])->name('change-status');
    Route::PUT('/cancel-order/{id}', [InvoiceController::class, 'cancelOrder'])->name('cancel-order');

    Route::post('/addToCart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
    Route::post('/addToCartInDetail/{id}', [CartController::class, 'addToCartInDetail'])->name('addToCartInDetail');
    
    Route::post('/save-selected-items', 'App\Http\Controllers\InvoiceController@saveSelectedItems')->name('saveSelectedItems');
    Route::put('/incre/{id}', [CartController::class, 'incre'])->name('incre');
    Route::put('/decre/{id}', [CartController::class, 'decre'])->name('decre');
    Route::delete('/delCart/{id}', [CartController::class, 'delCart'])->name('delCart');
    Route::get('PagePay', [InvoiceController::class, 'PagePay'])->name('PagePay');
    Route::put('/pay', [InvoiceController::class, 'pay'])->name('pay');

    Route::post('/comment/{id}', [HomeController::class, 'comment'])->name('comment');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // import file excel
    Route::post('/export-excel', [ProductController::class, 'exportIntoExcel'])->name('export-excel');
    Route::post('/export-CSV', [ProductController::class, 'exportIntoCSV'])->name('export-CSV');

    Route::group(['prefix' => 'Category', 'as' => 'Category.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/create', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy')->middleware(checkAdminMiddleware::class);;
    });

    Route::group(['prefix' => 'Brand', 'as' => 'Brand.'], function () {
        Route::get('/', [BrandController::class, 'index'])->name('index');
        Route::get('/create', [BrandController::class, 'create'])->name('create');
        Route::post('/create', [BrandController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [BrandController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [BrandController::class, 'destroy'])->name('destroy')->middleware(checkAdminMiddleware::class);;
    });

    Route::group(['prefix' => 'Product', 'as' => 'Product.'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/create', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('destroy')->middleware(checkAdminMiddleware::class);;
    });
});
