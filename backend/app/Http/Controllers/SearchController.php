<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        $sort = $request->sort;
        $user = Auth::id();
        //ログインしていない場合の処理
        if (is_null($user)){
            return redirect(route('guestsearch',[
                'search' => $search,
                'sort'   => $sort,
            ]));
        }
        //sortに値が無い場合の処理
        if (is_null($sort)) {
            $sort = 'id';
           }
        //並び替え処理
        if($sort =='evaluation'){ //評価順
        $recipes = $recipes = DB::table('recipes')->where('c_name','like','%'.$search.'%') //料理名から検索
                                                  ->orWhere('material','like','%'.$search.'%') //食材から検索
                                                  ->orderBy($sort,'desc')
                                                  ->simplePaginate(12);
        }elseif($sort == 'id'){ //投稿が古い順
        $recipes = $recipes = DB::table('recipes')->where('c_name','like','%'.$search.'%')
                                                  ->orWhere('material','like','%'.$search.'%')
                                                  ->orderBy($sort,'asc')
                                                  ->simplePaginate(12);
        }else{ //投稿が新しい順
        $recipes = $recipes = DB::table('recipes')->where('c_name','like','%'.$search.'%')
                                                  ->orWhere('material','like','%'.$search.'%')
                                                  ->orderBy($sort,'desc')
                                                  ->simplePaginate(12);
        };

        return view('search.search',compact('recipes','search','sort'));
    }

    public function guestsearch(Request $request)
    {
        $search = $request->search;
        $sort = $request->sort;
        //sortに値が無い場合の処理
        if (is_null($sort)) {
            $sort = 'id';
           }
        if($sort =='evaluation'){ //評価順
        $recipes = $recipes = DB::table('recipes')->where('c_name','like','%'.$search.'%')
                                                  ->orWhere('material','like','%'.$search.'%')
                                                  ->orderBy($sort,'desc')
                                                  ->simplePaginate(12);
        }elseif($sort == 'id'){ //投稿が古い順
        $recipes = $recipes = DB::table('recipes')->where('c_name','like','%'.$search.'%')
                                                  ->orWhere('material','like','%'.$search.'%')
                                                  ->orderBy($sort,'asc')
                                                  ->simplePaginate(12);
        }else{ //投稿が新しい順
        $recipes = $recipes = DB::table('recipes')->where('c_name','like','%'.$search.'%')
                                                  ->orWhere('material','like','%'.$search.'%')
                                                  ->orderBy($sort,'desc')
                                                  ->simplePaginate(12);
        };

        return view('search.guestsearch',compact('recipes','search','sort'));
    }
}
