<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //laravel內建的檔案上傳
use App\Http\Controllers\FilesController; //'方塊自製上傳檔案的方式
use App\Models\Product;
use App\Models\ProductImg;

class ProductController extends Controller
{
    //
    public function index()
    {
       
        $cookie = Product::get();
        //dd($cookie);
        return view('backstage.merchandise.merchandise', compact('cookie'));
    }
    public function create()
    {
        //dd('123');
        return view('backstage.merchandise.merchandise-create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        //儲存表單資料
        //可以先用dd($request->all());檢查是否有傳入後端

        //$path = FilesController::imgUpload($request->img, 'images');
        $product = Product::create([
            'name' => $request->name,
            'describe' => $request->describe,
            //'img' => $path, //前面已經整理好路徑了
            'price' => $request->price,
            'amount' => $request->amount,
        ]);
        foreach ($request->imgs as $value) {

            ProductImg::create([
                'img_path' => $value,
                'product_id' => $product->id,
            ]);
        }

        //原生larvel的檔案上傳，必須輸入 php artisan storage:link 並修改回傳路徑才能使用
        //put 第一個參數是你要儲存的資料夾 第二個參數是你要上傳的檔案本身
        //disk('local')->儲存的位置(可在config/filesystems定義)

        //$path= Storage::disk('local')->put('public/Getimgs',$request->img);

        return redirect('/product');
    }


    public function edit($id)
    {
        $product = Product::find($id);
        return view('backstage.merchandise.merchandise-edit', compact('product'));
    }


    public function update($id, Request $request)
    {
        // dd($request->all());
        //文字資料的修改儲存
        $product = Product::find($id);
        $product->name = $request->name;
        $product->describe = $request->describe;
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->save();
        //圖片的修改儲存
        if ($request->imgs != Null) {

            foreach ($request->imgs as $value) {

                ProductImg::create([
                    'img_path' => $value,
                    'product_id' => $product->id,
                ]);
            }
        }
        return redirect('/product');
    }


    public function delete($id)
    {
        //產品資料刪除
        $product = Product::find($id)->delete();
        //產品圖片資料刪除的話 會讓檔案留在系統內
        $img = ProductImg::where('product_id', $id)->get();
        foreach ($img as  $value) {
            FilesController::deleteUpload($value->img_path);
        }
        ProductImg::where('product_id', $id)->delete();


        return redirect('/product');
    }

    public function imgUpload(Request $request)
    {
        //把傳遞過來的資料變成陣列
        $path = '[';
        //傳過來的資料進行json格式編排
        foreach ($request->imgs as $value) {
            $path = $path . '"' . FilesController::imgUpload($value, 'images') . '",';
        }
        //去掉最後一筆資料的 ,
        $path =  rtrim($path, ',');
        //蓋上蓋子
        $path = $path . ']';
        return $path;
    }

    public function imgDelete(Request $request)
    {
        //刪除資料表的圖檔路徑
        ProductImg::where('img_path', $request->path)->delete();
        FilesController::deleteUpload($request->path);

        return 'OK';
    }
}
