@extends('layouts.temple')

@section('title','糖質制限')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <h2>投稿しました。</h2>
                        <form action="mypage" method="post">
                        @csrf
                        <input type="submit" value="詳細" class= 'btn-lg btn-primary'>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection