<?php

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