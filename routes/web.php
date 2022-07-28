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

//Route::middleware('auth')->get('/product',[ProductController::class,'index']); //middleware 加入給他做分類 只有登入會員才會進入這個頁面

Route::middleware('auth')->group(function(){

    //把相同的前綴頁面用prefix作分別然後用group包起來
    Route::prefix('/product')->group(function(){

        Route::get('/',[ProductController::class,'index']);
        //新增資料
        Route::get('/create',[ProductController::class,'create']);
        Route::post('/store',[ProductController::class,'store']);
        //修改資料
        Route::get('/edit/{id}',[ProductController::class,'edit']);
        Route::post('/update/{id}',[ProductController::class,'update']);
        //圖片上傳/刪除
        Route::post('/imgUpload',[ProductController::class,'imgUpload']);
        Route::post('/imgDelete',[ProductController::class,'imgDelete']);
        //刪除資料
        Route::get('/delete/{id}',[ProductController::class,'delete']);
    });

    // //檢視資料
    // Route::resource('/product','App\Http\Controllers\ThingController');
    // // Route::get('/product-create','App\Http\Controllers\ThingController@create');





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



});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

