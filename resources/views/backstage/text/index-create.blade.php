@extends('layouts.index-template')
@section('css')
    <link rel="stylesheet" href="{{asset('css/create.css')}}">
@endsection
@section('main')
<div class="container">
    <!-- 上傳檔案 form要加上 enctype="multipart/form-data" -->
               <form action="/blog/store" method="POST" enctype="multipart/form-data">
                   <!-- 419 金鑰解法加入這段 -->
                   @csrf
                   <div class="row">
                       <label for="text">文章標題</label>
                       <input type="text" id="text" name="text">
                   </div>
                   <div class="row">
                    <label for="auther">文章作者</label>
                    <input type="text" id="auther" name="auther">
                </div>
                <div class="row custom">
                    <label for="content">文章內容</label>
                    <textarea id="content" name="content"></textarea>
                </div>
                <div class="row custom">
                    <label for="sign">簽名文檔</label>
                    <input type="file" id="sign" name="sign">
                </div>
                <div class="row btn">
                    <a href="/blog">取消</a>
                    <!-- 419金鑰解法 -->
                     {{ csrf_field() }}
                    <button type="submit" >新增文章</button>
                </div>
               </form>


            </div>
@endsection
