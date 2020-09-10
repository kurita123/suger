@extends('layouts.guest')

@section('title','糖質制限')

@section('content')
<div class="row">
    <div class="col">
        <div class = "name">
        @foreach($name as $nam)
            <p>{{$nam->name}}さんのレシピ</p>
        @endforeach
        </div>
            @foreach($recipes as $recipe)
                <div class="myrecipe">
                    <div class="myrecipe-coo">
                        <p><span style="color:red">料理名 : </span>{{$recipe->c_name}}<br>
                    </div>
                        <img src="{{ asset('/storage/img/'.$recipe->imgpath)}}" alt="" class="inrecipe"><br><br>
                    <div class="myrecipe-su">
                        <span style="color:red">材料 : </span>{{$recipe->material}}<br><br>
                        <span style="color:red">作り方 : </span>{{$recipe->recipe}}<br></br>
                        <span style="color:red">糖質量 : </span>{{$recipe->t_suger}}g<br><br>
                        <span style="color:red">１人前の量 : </span>{{$recipe->amount}}g<br><br>
                        <span style="color:red">評価 : </span>{{$recipe->evaluation}}<br><br>
                        <span style="color:#33CCCC">あなたの評価</span></p>
                        <span class="star-rating">
                        <input type="radio" name="rating" value="1"><i></i>
                        <input type="radio" name="rating" value="2"><i></i>
                        <input type="radio" name="rating" value="3"><i></i>
                        <input type="radio" name="rating" value="4"><i></i>
                        <input type="radio" name="rating" value="5"><i></i>
                        </span>
                        <span style="color:red"><p>評価とコメントには新規登録かログインが必要です。</p></span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection