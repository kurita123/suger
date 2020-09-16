@extends('layouts.temple')

@section('title','糖質制限')

@section('content')
<div class="row">
    <div class="col">
        <div class = "name">
        <!-- ログインユーザー -->
        @foreach($name as $nam)
            <p>{{$nam->name}}さんのレシピ</p>
        </div>
            <!-- レシピ詳細 -->
            @foreach($recipes as $recipe)
                <div class="myrecipe">
                    <div class="myrecipe-coo">
                        <p><span style="color:red">料理名</p></span>{{$recipe->c_name}}<br>
                    </div>
                        <img src="{{ asset('/storage/img/'.$recipe->imgpath)}}" alt="" class="inrecipe"><br>
                    <div class="myrecipe-su">
                        <p><span style="color:red">材料</p></span>
                        <p>{!! nl2br(e($recipe->material)) !!}</p><br>
                        <p><span style="color:red">作り方</p></span>
                        <p>{!! nl2br(e($recipe->recipe)) !!}</p><br>
                        <p><span style="color:red">糖質量</p></span>
                        <p>{{$recipe->t_suger}}g</p><br>
                        <p><span style="color:red">１人前の量</p></span>
                        <p>{{$recipe->amount}}g</p><br>
                        <p><span style="color:red">評価</p></span>
                        <p>{{$recipe->evaluation}}</p><br>
                    </div>
                <div class="button">
                <!-- レシピ変更 -->
                <form action="recipechange" method="get">
                @csrf
                    <input type="hidden" name="id" value="{{$recipe->id}}">
                    <input type="submit" value="変更" class= 'btn-lg btn-primary'>
                </form>
                <!-- レシピ削除 -->
                <form action="delete" method="post">
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