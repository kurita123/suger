@extends('layouts.temple')

@section('title','糖質制限')

@section('content')
<div class="row">
    <div class="col">
        <div class = "name">
        <!-- ログインユーザーネーム -->
        @foreach($name as $nam)
            <p>{{$nam->name}}の投稿レシピ一覧</p>
        @endforeach
        </div>
            <div class="d-flex flex-row flex-wrap">
                <!-- レシピ詳細 -->
                @foreach($recipes as $recipe)
                    <div class="col-xs-6 col-sm-6 col-md-6 ">
                        <div class="myrecipe">
                            <p>料理名 : {{$recipe->c_name}}</p>
                            <p>画像</p><img src="{{ asset('/storage/img/'.$recipe->imgpath)}}" alt="" class="inrecip"><br>
                            <p>糖質量 : {{$recipe->t_suger}}g</p>
                            <p>評価 : {{$recipe->evaluation}}</p>
                            <form action="recipeuser" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$recipe->id}}">
                            <input type="hidden" name="user_id" value="{{$recipe->user_id}}">
                            <input type="hidden" name="name" value="{{$name}}">
                            <input type="submit" value="詳細" class= 'btn-lg btn-primary'><br>
                            </form>
                        </div>
                    </div>
                @endforeach
                <div style="text-center; width: 200px;margin: 20px auto;">
                    {{ $recipes->appends(request()->input())->links() }} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection