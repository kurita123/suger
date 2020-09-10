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
<h1 style="color:#555555; text-align:center; font-size:2em; padding:24px 0px; font-weight:bold;">レシピ投稿</h1>
    <div class="recipe">
        <form action="postcomplete" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="user_id">
            <p>料理名</p><input type="text" name="c_name" value="{{ old('c_name') }}">
            <p>総糖質量</p><input type="number" name="t_suger" min="1" max="30" value="{{ old('t_suger') }}">
            <p>食材＆調味料</p><input type="text" name="material" value="{{ old('material') }}">
            <p>１人前の量</p><input type="number" name="amount" min="1" max="300" value="{{ old('amount') }}">
            <p>作り方：</p><textarea type="text"  name="recipe" rows="10" >{{ old('recipe') }}</textarea>
            <input type="file" name="imgpath" class="text-center"><br>
            <button class="btn btn-success">登録</button>
        </form>
    </div>
</div>
@endsection