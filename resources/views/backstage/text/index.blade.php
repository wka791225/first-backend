@extends('layouts.index-template')
@section('css')
<link rel="stylesheet" href="{{asset('css/main.css')}}">

@endsection
@section('main')

<div class="container">
    <div class="function-area">

        <a class="create-msg" href="/blog/create">新增貼文</a>
    </div>
    @foreach ($news as $item )
    <div class="news">
        <div class="news-info">
            <div class="title">{{$item->text}}</div>
            <div class="news-author">{{$item->auther}}</div>
            <div class="news-time">{{substr( $item->created_at , 0 , 10)}}</div>
            <a href="/blog/edit/{{$item->id}}" class="edit">編輯</a>
            <a href="/blog/delete/{{$item->id}}" class="delete">刪除</a>
          
        </div>
        <div class="news-content">
            <p>{{$item->content}}

            </p>
        </div>
    </div>
    @endforeach


    <!-- <div class="news">
        <div class="news-info">
            <div class="title">這是測試標題</div>
            <div class="news-author">文章作者</div>
            <div class="news-time">PO文時間</div>
        </div>
        <div class="news-content">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum nulla deserunt doloremque
                dignissimos sunt nobis error dolores fugiat debitis quisquam pariatur, exercitationem nam numquam
                magni temporibus voluptatum quibusdam animi, alias harum maiores. Recusandae, similique repudiandae
                facilis explicabo tempora eaque a nemo doloremque natus aliquid quibusdam molestiae consequatur
                debitis perferendis cum placeat unde velit quaerat rerum quasi! Maxime exercitationem voluptates,
                quam recusandae dolorem totam hic quisquam delectus cupiditate id! Nam iste praesentium, dolores
                vitae similique doloremque facilis nesciunt quia ab porro dicta aliquam nihil provident aspernatur
                sit tenetur, veritatis aliquid quas est sunt dolorem et rerum! Corrupti quia voluptates cupiditate
                perferendis.

            </p>
        </div>
    </div> -->
</div>
@endsection
