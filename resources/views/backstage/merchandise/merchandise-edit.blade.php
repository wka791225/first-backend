@extends('layouts.index-template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/mrch-create.css') }}">
@endsection




@section('main')
    <div class="container">
        <form action="/product/update/{{$product->id}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <label for="name">商品名稱</label>
                <input type="text" id="name" name="name" value="{{$product->name}}">
            </div>
            <div class="row">
                <label for="img">上傳商品圖片</label>
                <input type="file" id="img"  multiple onchange="imgupload()">
            </div>
            <div class="upload-img">
                @foreach ($product->imgs as $img)

                <div class="img-card">
                    <div class="delete-img" onclick="imgdelete(this,'{{$img->img_path}}')" >X</div>
                    <img src="{{$img->img_path}}" alt="">
                     <input type="text"  id="" value="{{$img->img_path}}" hidden>
                 </div>
                @endforeach
            </div>
            <div class="row">
                <label for="price">商品價格NT$</label>
                <input type="number" id="price" name="price"value="{{$product->price}}" >
            </div>
            <div class="row">
                <label for="amount">剩餘數量</label>
                <input type="number" id="amount" name="amount" value="{{$product->amount}}">個
            </div>
            <div class="row custom">
                <label for="describe">商品描述</label>
                <textarea id="describe" name="describe">{{$product->describe}}</textarea>
            </div>

            <div class="row btn">
                <a href="/product">取消</a>
                <button type="submit">編輯商品</button>
            </div>
        </form>


    </div>
@endsection

@section('js')
    <script>
        var input = document.querySelector('#img');
        var upImg = document.querySelector('.upload-img');

        function imgupload() {
            var formdata = new FormData();
            //加入csrf
            formdata.append('_token','{{csrf_token()}}')

            for (let index = 0; index < input.files.length; index++) {
                console.log(input.files[index]);
                formdata.append('imgs[]', input.files[index])

            }
            // console.log(formdata);

            fetch('/product/imgUpload', {
                    method: 'POST',
                    body: formdata
                })
                .then(response => response.json())

                .then(response => {
                    console.log('Success:', response)
                    response.forEach(element => {
                        upImg.innerHTML+=`

                        <div class="img-card">
                            <div class="delete-img" onclick="imgdelete(this,'${element}')" >X</div>
                            <img src="${element}" alt="">
                             <input type="text" name="imgs[]" id="" value="${element}" hidden>
                         </div>`
                    });
                });
        }
        function imgdelete(element, path){
            var chice =confirm('確定要刪除圖片嗎?(此操作為不可逆)')
            console.log(path);
            if(chice){

                var formdata = new FormData();
                formdata.append('_token','{{csrf_token()}}')
                formdata.append('path',path)
                fetch('/product/imgDelete', {
                        method: 'POST',
                        body: formdata
                    })
                    element.parentElement.remove()
            }
            }

    </script>
@endsection
