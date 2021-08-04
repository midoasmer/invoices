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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
//Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/download/{invoiceId}/{attachName}', "App\Http\Controllers\DownloadsController@download");
//Route::group(['middleware'=>'login'],function (){
Route::get('products/{id}',"App\Http\Controllers\InvoicesController@getproducts");
Route::get('invoicesDetails/{id}',"App\Http\Controllers\invoiceDetailsController@edit");
Route::resource('invoices',"App\Http\Controllers\InvoicesController");
Route::resource('sections',"App\Http\Controllers\SectionController");
Route::resource('products',"App\Http\Controllers\ProductController");
Route::get('/{page}', 'App\Http\Controllers\AdminController@index');
//});

//Route::get('/test', function () {
//    return view('invoices/add_invoice');
//});
