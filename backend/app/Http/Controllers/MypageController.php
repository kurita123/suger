<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class MypageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mypage(Request $request)
    {
        $user_id  = Auth::id();
        //user_idから名前を検索
        $name     = DB::table('users')->where('id',$user_id)->get('name');
        //user_idからレシピを検索
        $recipes  = DB::table('recipes')->where('user_id',$user_id)
                                       ->paginate(12);;

        return view('mypage.mypage',compact('recipes','name'));
    }

    public function recipe(Request $request)
    {
        $id = $request->id;
        $user_id = $request->user_id;
        //idからレシピ検索
        $recipes = DB::table('recipes')->where('id',$id)->get();
        //usernameのみ取得
        $name = DB::table('users')->where('id',$user_id)->get('name');
        
        return view('mypage.recipeuser',compact('recipes','name'));
    }

    public function change(Request $request)
    {
        $user_id  = $request->user_id;
        $id       = $request->id;
        //レシピからid検索
        $recipes  = DB::table('recipes')->where('id',$id)->get();
        //ユーザーの名前取得
        $name     = DB::table('users')->where('id',$user_id)->get('name');
        
        return view('mypage.recipechange',compact('recipes','name','id'));
    }

    public function complete(PostRequest $request)
    {
        //二重送信防止
        $request->session()->regenerateToken();
        $id       = $request->id;
        $name     = $request->name;
        $user_id  = $request->user_id;
        //画像保管
        $path     = $request->file('imgpath')->store('public/img');
        //更新内容格納
        $recipes  = [
            'user_id'  => $request->user_id,
            'c_name'   => $request->c_name,
            't_suger'  => $request->t_suger,
            'material' => $request->material,
            'amount'   => $request->amount,
            'recipe'   => $request->recipe,
            'imgpath'  => str_replace('public/img/','',$path),
        ];

        //DB保存
        DB::table('recipes')->where('id',$id)->update($recipes);

        return view('mypage.recipecomplete',compact('name','id','user_id'));
    }

    public function delete(Request $request)
    {
        $name = $request->name;
        //削除実行
        DB::table('recipes')->where('id',$request->id)->delete();

        return view('mypage.delete',compact('name'));
    }
}