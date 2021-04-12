<?php

use App\Http\Controllers\TestController;
use App\Models\phone;
use App\Models\User;
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
    // return view('welcome');
    return redirect('/home');
});

Route::group(['prefix' => 'Orders','middleware'=>'auth'], function () {

    Route::get('AddView', 'OrderController@orderAddView');
    // Route::post('Add', 'OrderController@storeOrder');
    Route::get('All', 'OrderController@viewAllData');
    Route::get('edit/{orderId}', 'OrderController@editOrder');
    Route::post('deleteOrderAjax', 'OrderController@deleteOrderAjax')->name('delete');
    Route::post('deleteOrder/{orderId}', 'OrderController@deleteorder')->name('deletelaravel');
    Route::get('RecycleBin', 'OrdersDeleted@RecycleBin');
    Route::post('restore/{orderId}', 'OrdersDeleted@restore');
    Route::post('update/{orderId}', 'OrderController@orderUpdate')->name('update');
    Route::get('totalmeter', 'OrderController@TotalMeter');
    Route::post('Add', 'OrderController@storeOrder')->name('AddOrders');

});

Route::group(['prefix' => 'Comment','middleware'=>'auth'], function () {

Route::get('NewComment','CommentController@NewComment');
Route::post('StoreComment','CommentController@StoreComment')->name('StoreComment');

});


//AUTH LARAVEL LOGIN TO ADMIN
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// authentication and guards
Route::get('CA','CustomeAuthController@adu')->middleware('age');






