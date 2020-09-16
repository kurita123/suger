<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InquiryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inquiry(Request $request)
    {
        return view('inquiry.inquiry');
    }

    public function confirm(InquiryRequest $request)
    {
        $contact = $request->all();
        
        return view('inquiry.inquiryconfirm',$contact);
    }

    public function complete(Request $request)
    {
        $contact = $request->all();
        //戻るボタンを押した際の処理
        if($request->action === 'back'){
            return redirect()->route('inquiry')->withInput($contact);
        }
        //二重送信防止
        $request->session()->regenerateToken();

        // お客様に送るメール
        \Mail::send(new \App\Mail\ContactMail([
            'to'        => $request->email,  //お客様のメールアドレス
            'to_name'   => $request->name,  //お客様の名前
            'from'      => 'kurikuri7890@gmail.com',  //Gmailアドレス
            'from_name' => 'kurita',  //Gmailの表示名
            'subject'   => 'お問い合わせ受付完了のお知らせ',  //メールの件名
            'comment'   => $request->comment  //お問い合わせ内容
        ],'to'));

        // 自分に送るメール
        \Mail::send(new \App\Mail\ContactMail([
            'to'        => 'kurikuri7890@gmail.com',  //Gmailアドレス
            'to_name'   => 'kurita',  //Gmailの表示名
            'from'      => $request->email,  //お客様のメールアドレス
            'from_name' => $request->name, //お客様の名前
            'subject'   => 'お客様からのお問い合わせ',  //メールの件名
            'comment'   => $request->comment　//お問い合わせ内容
        ], 'from')); 
    
        return view('inquiry.inquirycomplete');
    }
}
