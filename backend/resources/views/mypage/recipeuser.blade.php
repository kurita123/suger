@extends('layouts.temple')

@section('title','糖質制限')

@section('content')
<div class="row">
    <div class="col">
        <div class = "name">
        @foreach($name as $nam)
            <p>{{$nam->name}}さんのレシピ</p>
        </div>
            @foreach($recipes as $recipe)
                <div class="myrecipe">
                    <div class="myrecipe-coo">
                        <p><span style="color:red">料理名</p></span>{{$recipe->c_name}}<br>
                    </div>
                        <img src="{{ asset('/storage/img/'.$recipe->imgpath)}}" alt="" class="inrecipe"><br><br>
                    <div class="myrecipe-su">
                        <span style="color:red">材料</p></span>{{$recipe->material}}<br><br>
                        <span style="color:red">作り方</p></span>{{$recipe->recipe}}<br><br>
                        <span style="color:red">糖質量</p></span>{{$recipe->t_suger}}g<br><br>
                        <span style="color:red">１人前の量</p></span>{{$recipe->amount}}g<br><br>
                        <span style="color:red">評価</p></span>{{$recipe->evaluation}}<br><br>
                    </div>
                <div class="button">
                <form action="/mypage/recipechange" method="post">
                @csrf
                    <input type="hidden" name="id" value="{{$recipe->id}}">
                    <input type="submit" value="変更" class= 'btn-lg btn-primary'>
                </form>
                <form action="/mypage/delete" method="post">
                @csrf
                    <input type="hidden" name="id" value="{{$recipe->id}}">
                    <input type="hidden" name="name" value="{{$nam->name}}">
                    <input type="submit" value="削除" class= 'btn-lg btn-primary'>
                </form>
                @endforeach
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
@endsection