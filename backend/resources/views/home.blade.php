<div class="wrap">
@extends('layouts.index')

@section('title','糖質制限')

@section('content')
<div class="container">
    <div class="row">
        <div id="main">
            <div class = "example">
                <img src="img/top.png">
                <h1 style="color:red; text-align:center; font-size:2em; padding:30px 0px 0px 0px; font-weight:bold;">レシピ一覧</h1>
                <ul class="nav-list">
                    <li class="nav-list-item">
                    <span style="color:red">並び替え</span>
                    </li>
                    <li class="nav-list-item">
                    <a href="/home?sort=created_at">投稿日が新しい順</a>
                    </li>
                    <li class="nav-list-item">
                    <a href="/home?sort=id">投稿日が古い順</a>
                    </li>
                    <li class="nav-list-item">
                    <a href="/home?sort=evaluation"> 評価の高い順</a>
                    </li>
                </ul>
                <div class="d-flex flex-row flex-wrap">
                    <!-- レシピ詳細 -->
                    @foreach($recipes as $recipe)
                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <div class="myrecipe">
                            <p>料理名 : {{$recipe->c_name}}</p>
                            <img src="{{ asset('/storage/img/'.$recipe->imgpath)}}" alt="" class="inrecipe"><br>
                            <p>糖質量 : {{$recipe->t_suger}}g</p>
                            <p>評価 : {{$recipe->evaluation}}</p>
                            <form action="recipegest" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$recipe->id}}">
                            <input type="hidden" name="user_id" value="{{$recipe->user_id}}">
                            <input type="submit" name="action" value="詳細" class= 'btn-lg btn-primary'><br>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    <div style="text-center; width: 150px;margin: 20px auto;">
                        {{ $recipes->appends(['sort' => $sort])->links() }} 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection