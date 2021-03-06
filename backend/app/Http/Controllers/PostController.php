<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Models\Recipe;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        return view('post.post');
    }

    public function complete(PostRequest $request)
    {
        //二重送信防止
        $request->session()->regenerateToken();
        //入力情報
        $user_id    = Auth::id();
        $c_name     = $request->c_name;
        //画像保管
        $path       = $request->file('imgpath')->store('public/img');
        $recipes[]  = array();
        $recipes    = new Recipe();
        //投稿内容保存
        $recipes ->create ([
            'user_id'  => $user_id,
            'c_name'   => $request->c_name,
            't_suger'  => $request->t_suger,
            'material' => $request->material,
            'amount'   => $request->amount,
            'recipe'   => $request->recipe,
            'imgpath'  => str_replace('public/img/','',$path),
        ]);
                                
        return view('post.postcomplete');
    }
}