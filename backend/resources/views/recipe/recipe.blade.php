@extends('layouts.recipes')

@section('title','糖質制限')

@section('content')
<!-- エラーメッセージ -->
@if (count($errors) >0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
                    <p><span style="color:red">材料</p></span><p>{!! nl2br(e($recipe->material)) !!}</p><br>
                    <p><span style="color:red">作り方</p></span><p>{!! nl2br(e($recipe->recipe)) !!}</p><br>
                    <p><span style="color:red">糖質量</p></span><p>{{$recipe->t_suger}}g</p><br>
                    <p><span style="color:red">１人前の量</p></span><p>{{$recipe->amount}}</p><br>
                    <p><span style="color:red">平均評価</p></span><span style="color:#ffcc00;font-size: 20px;">★</span>{{$recipe->evaluation}}<br><br>
                    <p><span style="color:#33CCCC">あなたの評価</span></p>
                    <form action="review" mecthod="post">
                    @csrf
                    <!-- 星評価 -->
                    <span class="star-rating">
                    <input type="radio" name="stars" value="1"><i></i>
                    <input type="radio" name="stars" value="2"><i></i>
                    <input type="radio" name="stars" value="3"><i></i>
                    <input type="radio" name="stars" value="4"><i></i>
                    <input type="radio" name="stars" value="5"><i></i>
                    </span>
                    <span style="color:#33CCCC"><p>コメント</p></span>
                    <input type="hidden" name="recipe_id" value="{{$recipe->id}}">
                    <input type="hidden" name="user_id" value="{{$recipe->user_id}}">
                    <textarea type="text"  name="comment" rows="10" >{{ old('comment') }}</textarea><br>
                    <div class="button">
                        <input type="submit" value="確認" class= 'btn-lg btn-primary'>
                    </div>
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
                    <td>{!! nl2br(e($review->comment)) !!}</td><br>
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