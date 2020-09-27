@extends('layouts.temple')

@section('title','糖質制限')

@section('content')
    <div class="col">
        <div class = "name">
            <p>{{$name}}さんのレシピを変更しました。</p>
            <div class="myrecipe">
                <form action="recipeuser" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$id}}">
                <input type="hidden" name="user_id" value="{{$user_id}}">
                <input type="hidden" name="name" value="{{$name}}">
                <input type="submit" value="詳細" class= 'btn-lg btn-primary'><br>
                </form>
            </div>
        </div>
    </div>
@endsection