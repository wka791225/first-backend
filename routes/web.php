<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/product',[ProductController::class,'index']);
//新增資料
Route::get('/product/create',[ProductController::class,'create']);
Route::post('/product/store',[ProductController::class,'store']);
//修改資料
Route::get('/product/edit/{id}',[ProductController::class,'edit']);
Route::post('/product/update/{id}',[ProductController::class,'update']);
//圖片上傳/刪除
Route::post('/product/imgUpload',[ProductController::class,'imgUpload']);
Route::post('/product/imgDelete',[ProductController::class,'imgDelete']);
//刪除資料
Route::get('/product/delete/{id}',[ProductController::class,'delete']);





//根據請求，對應到相對的controller
Route::get('/page',[NewsController::class,'index']);
//檢視資料
Route::get('/blog',[BlogController::class,'index']);
//屬性要一樣 新增/儲存資料表
Route::get('/index/create',[BlogController::class,'create']);
Route::post('/blog/store',[BlogController::class,'store']);

//編輯資料 laravel的路由中，可以利用花括弧{}去將網址的特定區段轉換成變數
Route::get('/blog/edit/{id}',[BlogController::class,'edit']);
//更新資料
Route::post('/blog/update/{id}',[BlogController::class,'update']);
//刪除
Route::get('/blog/delete/{id}',[BlogController::class,'delete']);


// //檢視資料
// Route::resource('/product','App\Http\Controllers\ThingController');
// // Route::get('/product-create','App\Http\Controllers\ThingController@create');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 