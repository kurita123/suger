@extends('layouts.regest')

@section('title','糖質制限')

@section('content')
<div class="container">
    <div class="row">
        <div id="main">
            <div class = "name">
            <!-- ログインユーザーネーム -->
            @foreach($name as $nam)
                <p>{{$nam->name}}さんのレシピ</p>
            @endforeach
            </div>
                <!-- レシピ詳細 -->
                @foreach($recipes as $recipe)
            <div class="myrecipe">
                <div class="myrecipe-coo">
                    <p><span style="color:red">料理名</p></span>{{$recipe->c_name}}<br>
                </div>
                <div class="example">
                    <img src="{{ asset('/storage/img/'.$recipe->imgpath)}}" alt=""><br><br>
                </div>
                <div class="myrecipe-su">
                    <p><span style="color:red">材料</p></span>{{$recipe->material}}<br><br>
                    <p><span style="color:red">作り方</p></span>{{$recipe->recipe}}<br><br>
                    <p><span style="color:red">糖質量</p></span>{{$recipe->t_suger}}g<br><br>
                    <p><span style="color:red">１人前の量</p></span>{{$recipe->amount}}<br><br>
                    <p><span style="color:red">平均評価</p></span><span style="color:#ffcc00;font-size: 20px;">★</span>{{$recipe->evaluation}}<br><br>
                </div>
                @endforeach
                <p style="font-size:1.4em">レビュー評価一覧</p>
                <!-- レビュー詳細 -->
                @foreach($reviews as $review)
                    <table border=2 class="table-css">
                    <tr>
                        <th>名前</th>
                        <td>{{$review->user->name}}</td>
                    </tr>
                    <tr>
                        <th>評価</th>
                        <td><span style="color:#ffcc00;font-size: 20px;">★</span>{{$review->stars}}</td>
                    </tr>
                    <tr>
                        <th>コメント</th>
                        <td>{{$review->comment}}</td><br>
                    </tr>
                    </table>
                @endforeach
                <div style="text-center; width: 150px;margin: 20px auto;">
                    {{ $reviews->appends(request()->input())->links() }} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection