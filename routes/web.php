<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin');


// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/dashboard', 'AdminController@admin')->middleware('auth')->middleware('is_admin')->name('admin');
Route::resource('users', 'UserController')->middleware('auth');
Route::resource('admins', 'AdminController')->middleware('auth');

Route::get('/dashboard/users', 'UserController@index')->middleware('auth');
Route::get('/dashboard/editUser', 'UserController@edit')->middleware('auth');
Route::get('users', 'UserController@ban')->name('users.ban');

Route::get('/dashboard/categories', function () {
    return view('admin.categories');
});

Route::get('/dashboard/books', function () {
    return view('admin.books');
});

Route::get('/book', function () {
    return view('book');
});

Route::get('/dashboard/admins', 'AdminController@index')->middleware('auth');
Route::get('/dashboard/editAdmin', 'AdminController@edit')->middleware('auth');
