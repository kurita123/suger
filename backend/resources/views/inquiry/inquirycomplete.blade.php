@extends('layouts.temple')

@section('title','糖質制限')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-center">           
            <h2>お問い合わせ内容を送信しました</h2>
            <div class="mt-3">
                <p class="pl-2 mt-2">お問い合わせありがとうございました。ご回答までしばらくお待ち下さい。</p>
            </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-6 mt-5">
                        <a href="{{ route('top') }}" class="btn btn-primary btn-block" role="button">トップへ戻る</a>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection