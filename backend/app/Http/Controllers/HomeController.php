<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB;
use App\Models\Review;

class HomeController extends Controller
{   
    public function index(Request $request){
        $sort = $request->sort;
        if (is_null($sort)) {
            $sort = 'id';
           }
        if($sort =='evaluation'){
        $recipes = Recipe::orderBy($sort,'desc')->Paginate(12);
        }elseif($sort == 'id'){
        $recipes = Recipe::orderBy($sort,'asc')->Paginate(12);
        }else{
        $recipes = Recipe::orderBy($sort,'desc')->Paginate(12);
        };

        return view('home',compact('sort','recipes'));
    }

    public function recipe(Request $request){
        $id = $request->id;

        $recipes = DB::table('recipes')->where('id',$id)->get();

        foreach($recipes as $val){
            $users_id[$val->id] = $val ->user_id;
        }
        
        $name = DB::table('users')->where('id',$users_id)->get('name');
        $reviews = Review::with('user')->where('recipe_id',$id)->Paginate(5);

        return view('recipegest',compact('recipes','reviews','name'));
    }
}
