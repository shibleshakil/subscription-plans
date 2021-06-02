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

// Route::get('/', function () {
//     return view('admin.dashboard');
// });

// Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'greatings'])->name('greatings');

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');
// Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user')->middleware('user');

Route::middleware(['admin'])->group(function(){
    Route::resource('/admin-user', 'App\Http\Controllers\Admin\UserController')->parameters('admin-user', 'id');
    Route::post('/admin-user.update', 'App\Http\Controllers\Admin\UserController@update')->name('admin-user.update');
    Route::post('/admin-user/fund', 'App\Http\Controllers\Admin\UserController@fund')->name('admin-user.fund');
    // Route::get('/admin-subscribed-member', 'App\Http\Controllers\Admin\UserController@subscribedMember')->name('admin-subscribed-member');
    
    Route::resource('/admin-subscription', 'App\Http\Controllers\Admin\SubscriptionController')->parameters('admin-subscription', 'id');
    Route::post('/admin-subscription/update', 'App\Http\Controllers\Admin\SubscriptionController@update')->name('admin-subscription.update');
    Route::get('/admin-subscribed-member', 'App\Http\Controllers\Admin\SubscriptionController@subscribedMember')->name('admin-subscribed-member');
    // Route::get('/admin-subscription/member', 'App\Http\Controllers\Admin\SubscriptionController@subscribedMember')->name('admin-subscribed-member');
});

Route::middleware(['user'])->group(function(){
    Route::resource('/user/subscriptions/recomanded', 'App\Http\Controllers\User\SubscriptionController')->parameters('user-recomanded-subscriptions', 'id');
    Route::post('/user/subscription/add', 'App\Http\Controllers\User\SubscriptionController@userSubAdd')->name('user-subscriptions.store');
    Route::post('/user/subscription/delete', 'App\Http\Controllers\User\SubscriptionController@userSubCancel')->name('user-subscriptions.delete');
    Route::get('/user/subscription/list', 'App\Http\Controllers\User\SubscriptionController@userSubList')->name('user-subscriptions-list');
    
    Route::get('/user/subscription/upgrade/list', 'App\Http\Controllers\User\SubscriptionController@upgradeList')->name('user-subscriptions-upgrade-list');
    Route::post('/user/subscription/upgrade/list', 'App\Http\Controllers\User\SubscriptionController@upgradeList')->name('user-subscriptions-upgrade-list');
    Route::post('/user/subscription/upgrade', 'App\Http\Controllers\User\SubscriptionController@subUpgrade')->name('user-subscriptions-upgrade');

    Route::get('/user/subscription/downgrade/list', 'App\Http\Controllers\User\SubscriptionController@downgradeList')->name('user-subscriptions-downgrade-list');
    Route::post('/user/subscription/downgrade/list', 'App\Http\Controllers\User\SubscriptionController@downgradeList')->name('user-subscriptions-downgrade-list');
    Route::post('/user/subscription/downgrade', 'App\Http\Controllers\User\SubscriptionController@subDowngrade')->name('user-subscriptions-downgrade');

});
