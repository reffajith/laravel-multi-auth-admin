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

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){

    Route::get('/', 'DashboardController@dashboard')->name('dashboard');
    Route::get('/home', 'DashboardController@dashboard')->name('dashboard');

    // admin login routes
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login')->name('login.submit');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    
    // Password reset routes
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

    Route::get('/password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    Route::post('/password/confirm', 'Auth\ConfirmPasswordController@confirm')->name('password.confirm.submit');


});
