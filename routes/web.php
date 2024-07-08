<?php

use App\Http\Controllers\catalogController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\productController;
use App\Http\Controllers\sessionController;


Route::get('/', function () {
    $title = 'Home';
    $navTitle = 'Home';
    return view(
        'home',
        [
            'title' => $title,
            'navTitle' => $navTitle
        ]
    );
})->name('home');

Route::group([], function () {
    Route::get('/login', [sessionController::class, 'loginPage'])->name('session.loginPage');
    Route::post('/login', [sessionController::class, 'login'])->name('session.login');
    Route::get('/register', [sessionController::class, 'registerPage'])->name('session.registerPage');
    Route::post('/register', [sessionController::class, 'register'])->name('session.register');
    Route::get('/logout', [sessionController::class, 'logout'])->name('session.logout');
});


Route::group(['prefix' => 'catalog'], function () {
    Route::get('/', [catalogController::class, 'index'])->name('catalog');
    Route::get('/{slug}', [catalogController::class, 'show'])->name('catalog.detail');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect()->route('admin.user');
    })->name('admin');
    Route::get('/logout', [adminController::class, 'logout'])->name('admin.logout');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [adminController::class, 'user'])->name('admin.user');
        Route::get('/edit/{id}', [adminController::class, 'edit'])->name('admin.edit');
        Route::patch('/store', [adminController::class, 'store'])->name('admin.store');
        Route::delete('/delete/{id}', [adminController::class, 'delete'])->name('admin.delete');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [productController::class, 'index'])->name('admin.product');
        Route::get('/create', [productController::class, 'create'])->name('admin.createProduct');
        Route::post('/store', [productController::class, 'store'])->name('admin.storeProduct');
        Route::get('/edit/{id}', [productController::class, 'edit'])->name('admin.editProduct');
        Route::put('/update', [productController::class, 'update'])->name('admin.updateProduct');
        Route::delete('/delete/{id}', [productController::class, 'delete'])->name('admin.deleteProduct');
    });
    Route::group(['prefix' => 'order'], function () {
        Route::get('/', [orderController::class, 'index'])->name('admin.order');
        Route::get('/create', [orderController::class, 'create'])->name('admin.createOrder');
        Route::get('/download/{file}', [orderController::class, 'fileDownload'])->name('admin.downloadFile');
        Route::post('/store', [orderController::class, 'store'])->name('admin.storeOrder');
        Route::put('/update/{id}', [orderController::class, 'update'])->name('admin.updateOrder');
        Route::delete('/delete/{id}', [orderController::class, 'delete'])->name('admin.deleteOrder');
    });
    Route::group(['prefix' => 'payment'], function () {
        Route::get('/', [paymentController::class, 'index'])->name('admin.payment');
        Route::get('/{id}', [paymentController::class, 'view'])->name('admin.viewDetail');
    });
});




Route::get('/help', function () {
    $title = 'Help';
    $navTitle = 'Help';
    return view(
        'help',
        [
            'title' => $title,
            'navTitle' => $navTitle
        ]
    );
});

Route::get('/profile', function () {
    $title = 'Profile';
    $navTitle = 'Profile';
    return view(
        'profile',
        [
            'title' => $title,
            'navTitle' => $navTitle
        ]
    );
});