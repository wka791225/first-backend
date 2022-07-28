@extends('layouts.index-template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/merchandise.css') }}">
@endsection
@section('main')
    <div class="container">
        <h1>商品清單</h1>
        <a href="/product/create">新增商品</a>
        {{-- {{ $cookie[0]->imgs[0]->img_path  }} --}}
        @foreach ($cookie as $item)
            {{-- 迴圈跑資料庫時 要記得每個資料都要有要不然會報錯 --}}
            {{-- {{dd($item->imgs);}} --}}
            {{-- @dd($item->imgs); --}}


            <div class="commodity-list">
                {{-- @foreach ($item->imgs as $img)
                    <img src=" {{$img->img_path }}" alt="">
                @endforeach --}}
                <img  src="{{$item->imgs[0]->img_path }}" alt="">
                {{-- {{$item->imgs}} --}}

                <div class="commodity-introduce">
                    <div class="name">商品名稱：{{ $item->name }}</div>
                    <div class="describe">{{ $item->describe }}</div>
                    <div class="price">價格${{ $item->price }}元</div>
                    <div class="amount">剩餘數量：{{ $item->amount }}個</div>
                </div>
                <div class="manage">
                    <a href="/product/edit/{{$item->id}}">編輯商品</a>
                    <a href="/product/delete/{{$item->id}}">刪除商品</a>
                </div>


            </div>
        @endforeach
    </div>
@endsection
