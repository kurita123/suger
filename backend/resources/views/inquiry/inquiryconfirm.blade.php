@extends('layouts.temple')

@section('title','糖質制限')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">                 
            <div class="text-center">
                <h2>お問い合わせ内容確認</h2>
                <p style="font-size:1.4em"><span style="color:red">お問い合わせ内容に誤りがなければ送信ボタンを押して下さい</span><p>
            </div>
            <div class="text-css">
                <table border=2>
                    <tr>
                    <th>お名前</th>
                    <td>{{$name}}</td>
                    </tr>
                    <tr>
                    <th>メールアドレス</th>
                    <td>{{$email}}</td>
                    </tr>
                    <tr>
                    <th>お問い合わせ内容</th>
                    <!-- 改行 -->
                    <td>{!! nl2br(e($comment)) !!}</td>
                    </tr>
                </table>
            </div>
            <div class="text-center">
                <form action="inquirycomplete" method="post">
                @csrf
                <input type="hidden" name="name" value="{{$name}}">
                <input type="hidden" name="email" value="{{$email}}">
                <input type="hidden" name="comment" value="{{$comment}}">
                <button type="submit" name="action" value="back" class='btn-lg btn-primary'>戻る</button>
                <button type="submit" name="action" value="sent" class='btn-lg btn-primary'>送信</button>
            </div>
                </form>
            </div>    
        </div>    
    </div>
</div>
@endsection