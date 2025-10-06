<?php

use App\Http\Controllers\Dashboard\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::group([
//     'prefix' => LaravelLocalization::setLocale(),
//     'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
// ], function () {


Route::get('login', 'App\Http\Controllers\Dashboard\LoginController@login')
    ->name('admin.login');
Route::post('admin/login', 'App\Http\Controllers\Dashboard\LoginController@postLogin')
    ->name('admin.post.login');

Route::group(['middleware' => ['auth', 'permission'], 'prefix' => 'admin'], function () {

    Route::get('/', 'App\Http\Controllers\Dashboard\DashboardController@index')->name('admin.dashboard');

    Route::resource('admin', 'App\Http\Controllers\Dashboard\AdminsController');
    Route::resource('contract_terms', 'App\Http\Controllers\Dashboard\ContractTermsController');
    Route::get('users', 'App\Http\Controllers\Dashboard\UsersController@index')->name('users');
    Route::get('users/{user}', 'App\Http\Controllers\Dashboard\UsersController@show')->name('users.show');
    Route::get('users/{user}/orders', 'App\Http\Controllers\Dashboard\UsersController@userOrders')->name('users.orders');
    Route::get('/orders', 'App\Http\Controllers\Dashboard\OrdersController@index')->name('orders.index');
    Route::put('/orders/{order}/update-price', 'App\Http\Controllers\Dashboard\OrdersController@updatePrice')->name('orders.updatePrice');

    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'store'])->name('settings.store');

    Route::get('profile/edit', 'App\Http\Controllers\Dashboard\ProfileController@editProfile')
        ->name('edit.profile');
    Route::put('profile/update', 'App\Http\Controllers\Dashboard\ProfileController@updateprofile')
        ->name('update.profile');
    Route::get('logout', 'App\Http\Controllers\Dashboard\LoginController@logout')->name('admin.logout');
});
// });
