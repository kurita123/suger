<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB;
use App\Models\Review;

class HomeController extends Controller
{   
    public function index(Request $request)
    {
        //並び替え変数
        $sort = $request->sort;
        if (is_null($sort)) {
            $sort = 'id';
        }
        //並び替え
        if($sort =='evaluation'){ //評価順
        $recipes = Recipe::orderBy($sort,'desc')->Paginate(12);
        }elseif($sort == 'id'){ //投稿が古い順
        $recipes = Recipe::orderBy($sort,'desc')->Paginate(12);
        }else{ //投稿が新しい順
        $recipes = Recipe::orderBy($sort,'asc')->Paginate(12);
        };

        return view('home',compact('sort','recipes'));
    }

    public function recipe(Request $request)
    {
        $id = $request->id;
        $user_id = $request->user_id;
        //レシピから該当結果を検索
        $recipes = DB::table('recipes')->where('id',$id)->get();
        
        //検索結果からname取得
        $name    = DB::table('users')->where('id',$user_id)->get('name');
        //検索結果のレビュー取得
        $reviews = Review::with('user')->where('recipe_id',$id)->Paginate(5);

        return view('recipe.recipegest',compact('recipes','reviews','name'));
    }
}
