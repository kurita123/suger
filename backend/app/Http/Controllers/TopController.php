<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB;

class TopController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $sort = $request->sort;
        //sortの値が無い場合の処理
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
      
        return view('top',compact('sort','recipes'));
    }

}
