<?php

use App\Http\Controllers\orderController;
use App\Http\Controllers\productController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;



//Group
// Route::group(['prefix' => 'main'], function () {
//     Route::get('/', function () {
//         $title = 'Home';
//         $navTitle = 'Home';
//         return view(
//             'home',
//             [
//                 'title' => $title,
//                 'navTitle' => $navTitle
//             ]
//         );
//     });

//     Route::get('/catalog', function () {
//         $title = 'Katalog';
//         $navTitle = 'Catalog';
//         return view(
//             'catalog',
//             [
//                 'title' => $title,
//                 'navTitle' => $navTitle
//             ]
//         );
//     });

//     Route::get('/help', function () {
//         $title = 'Help';
//         $navTitle = 'Help';
//         return view(
//             'help',
//             [
//                 'title' => $title,
//                 'navTitle' => $navTitle
//             ]
//         );
//     });

//     Route::get('/profile', function () {
//         $title = 'Profile';
//         $navTitle = 'Profile';
//         return view(
//             'profile',
//             [
//                 'title' => $title,
//                 'navTitle' => $navTitle
//             ]
//         );
//     });
// });
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
});

Route::get('/catalog', function () {
    $title = 'Katalog';
    $navTitle = 'Catalog';
    return view(
        'catalog',
        [
            'title' => $title,
            'navTitle' => $navTitle
        ]
    );
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

Route::group(['prefix' => 'catalog'], function () {
    Route::get('/detail', function () {
        $title = 'Detail Produk';
        $navTitle = 'Catalog';
        return view(
            'Catalog.detail',
            [
                'title' => $title,
                'navTitle' => $navTitle,
                // 'slug' => $slug
            ]
        );
    })->name('catalog.detail');
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix'=>'user'], function(){
        Route::get('/', [userController::class, 'user'])->name('admin.user');
        Route::get('/edit/{id}', [userController::class, 'edit'])->name('admin.edit');
        Route::patch('/store', [userController::class, 'store'])->name('admin.store');
        Route::delete('/delete/{id}', [userController::class, 'delete'])->name('admin.delete');
    });
    Route::group(['prefix'=>'product'], function(){
        Route::get('/',[productController::class, 'index'])->name('admin.product');
        Route::get('/create',[productController::class, 'create'])->name('admin.createProduct');
        Route::post('/store',[productController::class, 'store'])->name('admin.storeProduct');
        Route::get('/edit/{id}',[productController::class, 'edit'])->name('admin.editProduct');
        Route::put('/update',[productController::class, 'update'])->name('admin.updateProduct');
        Route::delete('/delete/{id}',[productController::class, 'delete'])->name('admin.deleteProduct');
    });
    Route::group(['prefix'=>'order'], function(){
        Route::get('/',[orderController::class, 'index'])->name('admin.order');
        Route::get('/create',[orderController::class, 'create'])->name('admin.createOrder');
        Route::get('/download/{file}',[orderController::class, 'fileDownload'])->name('admin.downloadFile');
        Route::post('/store',[orderController::class, 'store'])->name('admin.storeOrder');
        Route::put('/update/{id}',[orderController::class, 'update'])->name('admin.updateOrder');
        Route::delete('/delete/{id}',[orderController::class, 'delete'])->name('admin.deleteOrder');
    });
});
