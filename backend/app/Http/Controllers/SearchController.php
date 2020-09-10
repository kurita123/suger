<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $sort = $request->sort;

        if (is_null($sort)) {
            $sort = 'id';
           }
        if($sort =='evaluation'){
        $recipes = $recipes = DB::table('recipes')->where('c_name','like','%'.$search.'%')
                                                  ->orWhere('material','like','%'.$search.'%')
                                                  ->orderBy($sort,'desc')
                                                  ->simplePaginate(12);
        }elseif($sort == 'id'){
        $recipes = $recipes = DB::table('recipes')->where('c_name','like','%'.$search.'%')
                                                  ->orWhere('material','like','%'.$search.'%')
                                                  ->orderBy($sort,'asc')
                                                  ->simplePaginate(12);
        }else{
        $recipes = $recipes = DB::table('recipes')->where('c_name','like','%'.$search.'%')
                                                  ->orWhere('material','like','%'.$search.'%')
                                                  ->orderBy($sort,'desc')
                                                  ->simplePaginate(12);
        };

        return view('search',compact('recipes','search','sort'));
    }
}
