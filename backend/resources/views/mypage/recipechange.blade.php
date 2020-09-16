@extends('layouts.temple')

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
<div class="row">
    <div class="col">
        <div class = "name">
            <form action="changecomplete" method="post" enctype="multipart/form-data">
            @csrf
            <!-- ログインユーザーネーム -->
            @foreach($name as $nam)
            <input type="hidden" name="name" value="{{$nam->name}}">
                <p>{{$nam->name}}さんのレシピ</p>
            @endforeach
        </div>
        <!-- 変更レシピ詳細 -->
        @foreach($recipes as $recipe)
            <div class="myrecipe">
                <div class="myrecipe-coo">
                    <p><span style="color:red">料理名 : </span>{{$recipe->c_name}}<br>
                </div>
                    <img src="{{ asset('/storage/img/'.$recipe->imgpath)}}" alt="" class="inrecipe"><br>
                <div class="myrecipe-su"> 
                    <span style="color:red"><p>材料 :</p></span>
                    <p>{!! nl2br(e($recipe->material)) !!}</p><br>
                    <span style="color:red"><p>作り方 :</p></span>
                    <p>{!! nl2br(e($recipe->recipe)) !!}</p><br>
                    <span style="color:red"><p>糖質量 :</p></span>
                    <p>{{$recipe->t_suger}}g</p><br>
                    <span style="color:red"><p>１人前の量 :</p></span>
                    <p>{{$recipe->amount}}g</p><br>
                    <span style="color:red"><p>評価 :</p></span>
                    <p>{{$recipe->evaluation}}</p><br>
                </div>
            </div>
        @endforeach
            <div class="recipe">
                <input type="hidden" name="id" value="{{$id}}">
                <p>料理名</p><input type="text" name="c_name" value="{{ old('c_name') }}">
                <p>食材＆調味料</p><input type="text" name="material" value="{{ old('material') }}">
                <p>総糖質量</p><input type="number" name="t_suger" min="1" max="30" value="{{ old('t_suger') }}">
                <p>１人前の量</p><input type="number" name="amount" min="1" max="300" value="{{ old('amount') }}">
                <p>作り方：</p><textarea type="text"  name="recipe" rows="10" >{{ old('recipe') }}</textarea>
                <input type="file" name="imgpath" class="text-center"><br>
                <button class="btn btn-success">登録</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection