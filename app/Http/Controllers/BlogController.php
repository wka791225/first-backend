<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Text;

class BlogController extends Controller
{


    //讀取資料的總頁面時 通常會叫 index /list
    public function index()
    {
        $news = DB::table('texts')->get();
        //    dd($news);
        return view('backstage.text.index', compact('news'));
    }
    public function create()
    {
        return view('index-create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        // dd('',$request->all());
        //如果表單資料與request完全相符，可以用create($request->all())直接建立
        //DB::table('texts')->insert($request->all());

        //直接使用DB操作資料庫
        // DB::table('texts')->insert([
        //     //輸入資料的 ID 跟NAME 要跟資料庫的一致才能存資料
        //     "text" => $request->text,
        //     "auther" => $request->auther,
        //     "content" => $request->content,
        //     "created_at"=> \Carbon\Carbon::now(),
        //     "updated_at"=>\Carbon\Carbon::now()
        // ]);

        //藉由model操作資料庫
        Text::create([
            "text" => $request->text,
            "auther" => $request->auther,
            "content" => $request->content,

        ]);

        //回傳到原位置，但是輸入的表單會在一次的傳進資料庫裡
        //$texts =DB::table('texts')->get();
        //return view('blog',compact('texts'));
        //回傳到index 用redirect重新導向(代替你key網址到指定的頁面)
        //重新整理也不會再一次傳輸表單
        return redirect('/blog');
    }
    public function edit($id)
    {
        //關於laravel的Model 進行資料搜尋/處理
        //抓單筆/特定條件
        //where('欄位名稱',條件) 單純判斷欄位的資料是否符合條件 Ex:where('auther','john')
        //where('欄位名稱',比對的方法,條件) EX; where('totalprice','<',6000)

        //排序資料
        //sortBy('欄位') 升序排列
        //sortBydesc('欄位') 降序排列


        //如果只要取特定數量
        //take(數量)
        //------------------以下是取資料的方法，須注意回傳的型態----------
        //將資料過濾/排序後實際抓取的指令
        //這個指令雖然可以抓到資料庫符合條件所有資料，但即使只有抓到一筆，他的資料還是會以陣列的方式呈現
        // Text::get();
        //會直接以ID(主key)去搜尋，搜尋到後直接返回單筆資料
        // Text::find();
        //抓取所有符合條件的資料的第一筆
        // Text::first();


        //以下是 假設出屋網的搜尋 使用者輸入 租金12000以下，至少3防，有電梯，以屋齡排序，雅房，台中市
        // $result= House::where('price','<=',12000)->where('room','>=',3)->where('elevator',1)->where('type','雅房')->where('city','台中')->sortBy('yrear')->get();
        // return view('搜尋結果頁',compact('result'));

        //抓要編輯的那筆資料，並且回傳至編輯頁讓使用者編輯
        //Text::where()->get();

        $article = Text::find($id);
        //dd($article);
        return view('index-edit', compact('article'));
    }
    public function update($id, Request $request)
    {
        //第一個寫法，使用query builder 較為嚴謹 一輸入錯誤就會報錯
        // $article = Text::find($id)->update([
        //     "text" => $request->text,
        //     "auther" => $request->auther,
        //     "content" => $request->content,

        // ]);

        //第二種寫法，使用orm 相對上一個寫法來的較不嚴僅
        $article = Text::find($id);
        $article->text =  $request->text;
        $article->auther =  $request->auther;
        $article->content =  $request->content;
        $article->save();

        return redirect('/blog');
    }

    public function delete($id)
    {
        // dd('0 0 '.$id);

        //開始進行刪除

        //第一個寫法，使用query builder 較為嚴謹 一輸入錯誤就會報錯
        $article = Text::find($id)->delete();
        //第二種寫法，使用orm 相對上一個寫法來的較不嚴僅
        //    $article = Text::find($id);
        //    $article->delete();

        //刪除完回到首頁
        return redirect('/blog');
    }
}
