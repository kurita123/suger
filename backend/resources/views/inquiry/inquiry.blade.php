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
<div class="container">
    <div class="row">
        <div class="col-md-12">                 
            <div class="text-center">
                <h2>お問い合わせ</h2>
                <form action="inquiryconfirm" method="post">
                @csrf
                <div class="container">
                    <div class="row form-group">
                        <label for="name" class="col">お名前</label>
                        <div class="col-12">
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}"><br>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="email" class="col">メールアドレス</label>
                        <div class="col-12">
                            <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}"><br>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="comment" class="col">お問い合わせ内容</label>
                        <div class="col-12">
                            <textarea name="comment" id="comment" class="form-control" cols="40" rows="6">{{ old('comment') }}</textarea><br>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row  justify-content-center">
                        <div class="col-sm-6 mt-3">
                            <button type="submit" name="action" value="send" class= 'btn-lg btn-primary'>確認</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>    
        </div>    
    </div>
</div>
@endsection