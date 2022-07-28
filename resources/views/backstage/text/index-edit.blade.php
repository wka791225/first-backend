@extends('layouts.index-template')
@section('css')
    <link rel="stylesheet" href="{{asset('css/create.css')}}">
@endsection
@section('main')
<div class="container">
               <form action="/blog/update/{{$article->id}}" method="POST">
                   <!-- 419 金鑰解法加入這段 -->
                   @csrf

                   <div class="row">
                       <label for="text">文章標題</label>
                       <input type="text" id="text" name="text" value="{{$article->text}}">
                   </div>
                   <div class="row">
                    <label for="auther">文章作者</label>
                    <input type="text" id="auther" name="auther" value="{{$article->auther}}">
                </div>
                <div class="row custom">
                    <label for="content">文章內容</label>
                    <textarea id="content" name="content">{{$article->content}}</textarea>
                </div>
                <div class="row btn">
                    <a href="/blog">取消</a>
                    <!-- 419金鑰解法 -->
                     {{ csrf_field() }}
                    <button type="submit" >編輯 文章</button>
                </div>
               </form>


            </div>
@endsection
