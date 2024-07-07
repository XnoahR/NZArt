<?php

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
        // Route::get('/', [userController::class, 'product'])->name('admin.product');
        // Route::get('/edit/{id}', [userController::class, 'editProduct'])->name('admin.editProduct');
        // Route::post('/store', [userController::class, 'storeProduct'])->name('admin.storeProduct');
        // Route::delete('/delete/{id}', [userController::class, 'deleteProduct'])->name('admin.deleteProduct');
    });
});
