<?php

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
    Route::get('/user', [userController::class, 'user'])->name('admin.user');
    Route::get('/user/edit/{id}', [userController::class, 'edit'])->name('admin.edit');
    Route::post('/user/store', [userController::class, 'store'])->name('admin.store');
    Route::delete('/user/delete/{id}', [userController::class, 'delete'])->name('admin.delete');
});
