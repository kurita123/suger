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
        $id = $request->id;

        $recipes = DB::table('recipes')->where('id',$id)->get();

        foreach($recipes as $val){
            $users_id[$val->id] = $val ->user_id;
        }
        
        $name = DB::table('users')->where('id',$users_id)->get('name');
        $reviews = Review::with('user')->where('recipe_id',$id)->Paginate(5);

        return view('recipe',compact('recipes','reviews','name'));
    }

    public function review(ReviewRequest $request){
       
        $user_id  = Auth::id();
        $recipe_id = $request->recipe_id;
        $comment   = $request->comment;
        $stars  = $request->stars;
    
        DB::table('reviews')->updateOrInsert(
            ['user_id' => $user_id,'recipe_id' => $recipe_id],
            ['user_id' => $user_id,'recipe_id' => $recipe_id,'comment'=>$comment,'stars'=>$stars]
        );

        $evaluations = DB::table('reviews')->where('recipe_id',$recipe_id)->avg('stars');
        $evaluation = round(collect($evaluations)->avg(),2,PHP_ROUND_HALF_UP);
        
        DB::table('recipes')->where('id',$recipe_id)->update(['evaluation'  => $evaluation]);

        return view('review');
    }
}
