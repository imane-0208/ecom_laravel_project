<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\GoogleController;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::middleware(['auth'])->group(function () {

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('hero', [ProductController::class, 'indexhero'])->name('indexhero');
    Route::put('updateetat/{id}', [ProductController::class, 'updateetat'])->name('updateetat');
    Route::resource('photos', PhotoController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('pages', PageController::class);
    Route::get('/settings', [MainController::class, 'settings'])->name('settings');
    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
});

Route::get('/ar', [MainController::class, 'ar'])->name('ar');
Route::get('/fr', [MainController::class, 'fr'])->name('fr');
Route::get('/en', [MainController::class, 'en'])->name('en');

Route::middleware(['lang'])->group(function () {
Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::post('/contact/send', [MainController::class, 'sendemail'])->name('contact.send');
Route::post('/newslatter', [MainController::class, 'newslatter'])->name('newslatter');
Route::get('/details/{id}', [MainController::class, 'details'])->name('details');
Route::get('/catalog', [MainController::class, 'catalog'])->name('catalog');
Route::get('/catalog/search', [MainController::class, 'catalog_search'])->name('catalog.search');

Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.add');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.delete');







// auth with google
Route::get('auth/google', 'App\Http\Controllers\Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'App\Http\Controllers\Auth\GoogleController@handleGoogleCallback');
// auth with facebook
Route::get('auth/facebook', 'App\Http\Controllers\Auth\GoogleController@redirectToFacebook');
Route::get('auth/facebook/callback', 'App\Http\Controllers\Auth\GoogleController@handleFacebookCallback');


Auth::routes();
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
