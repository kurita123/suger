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

    public function mypage(Request $request){
        $user_id  = Auth::id();
        $name = DB::table('users')->where('id',$user_id)->get('name');
        $recipes = DB::table('recipes')->where('user_id',$user_id)
                                       ->paginate(12);;

        return view('mypage.mypage',compact('recipes','name'));
    }

    public function recipe(Request $request){
        $id = $request->id;

        $recipes = DB::table('recipes')->where('id',$id)->get();

        foreach($recipes as $val){
            $users_id[$val->id] = $val ->user_id;
        }
        
        $name = DB::table('users')->where('id',$users_id)->get('name');
        
        return view('mypage.recipeuser',compact('recipes','name'));
    }

    public function change(Request $request){
        $user_id  = Auth::id();
        $id = $request->id;

        $recipes = DB::table('recipes')->where('id',$id)->get();
        
        $name = DB::table('users')->where('id',$user_id)->get('name');
        
        return view('mypage.recipechange',compact('recipes','name','id'));
    }

    public function complete(Request $request){
        $user_id  = Auth::id();
        $id = $request->id;
        $name = $request->name;
        $path = $request->file('imgpath')->store('public/img');
        $recipes = [
            'user_id'  => $user_id,
            'c_name'   => $request->c_name,
            't_suger'  => $request->t_suger,
            'material' => $request->material,
            'amount'   => $request->amount,
            'recipe'   => $request->recipe,
            'imgpath'  => str_replace('public/img/','',$path),
        ];

        //DB保存
        DB::table('recipes')->where('id',$id)->update($recipes);

        return view('mypage.recipecomplete',compact('name'));
    }

    public function delete(Request $request)
    {
        $name = $request->name;
        DB::table('recipes')->where('id',$request->id)->delete();

        return view('mypage.delete',compact('name'));

        // return redirect()->action('MypageController@mypage');
    }
}