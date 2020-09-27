<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;
use App\Models\Review;
use App\Models\User;
use App\Http\Requests\ReviewRequest;
use Illuminate\Validation\Rule;

class RecipeController extends Controller
{
    public function index(Request $request){
        $id      = $request->id;
        $user_id = $request->user_id;
        //レシピ検索
        $recipes = DB::table('recipes')->where('id',$id)->get();
        //ユーザーの名前取得
        $name    = DB::table('users')->where('id',$user_id)->get('name');
        //レビュー内容取得
        $reviews = Review::with('user')->where('recipe_id',$id)->Paginate(5);

        return view('recipe.recipe',compact('recipes','reviews','name'));
    }

    public function review(ReviewRequest $request){
        $user_id   = Auth::id();
        $recipe_id = $request->recipe_id;
        $comment   = $request->comment;
        $stars     = $request->stars;
        //レビューを投稿している場合と新規投稿対応
        DB::table('reviews')->updateOrInsert(
            ['user_id' => $user_id,'recipe_id' => $recipe_id],
            ['user_id' => $user_id,'recipe_id' => $recipe_id,'comment'=>$comment,'stars'=>$stars]
        );
        //検索結果を平均化
        $evaluations = DB::table('reviews')->where('recipe_id',$recipe_id)->avg('stars');
        //小数点第2まで表示
        $evaluation = round(collect($evaluations)->avg(),2,PHP_ROUND_HALF_UP);
        //レシピの平均評価変更
        DB::table('recipes')->where('id',$recipe_id)->update(['evaluation'  => $evaluation]);

        return view('review');
    }
}
