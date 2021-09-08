<?php

use App\Http\Controllers\CustomerController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/hanlin', function () {
        return view('pages.dashboard');
    })->name('hanlin');

    Route::get('/product', function () {
        return view('pages.product');
    })->name('product');

    // Route::get('/customer', function () {
    //     return view('pages.customer');
    // })->name('customer');
});

// Route::resource('customer', CustomerController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('customer', CustomerController::class);

// Route::middleware(['auth:sanctum', 'verified'])->get('/hanlin', function () {
//     return view('pages.dashboard');
// })->name('hanlin');

// Route::get('/hanlin', function () {
//     return view('pages.dashboard');
// })->name('hanlin');

// Route::group(['prefix' => 'user'], function () {
//     Route::group(['prefix' => 'auth'], function(){
//         Route::get('/facebook-sign-in',)
//     });
// });

Route::get('auth/facebook/callback', function () {
    return Socialite::driver('facebook')->redirect();
})->name('facebook_auth');
