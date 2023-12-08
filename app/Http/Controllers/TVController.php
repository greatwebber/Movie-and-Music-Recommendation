<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user_favorites;
use Auth;

class TVController extends Controller
{
    public function index()
    {
        return view('tvshows');
    }

    public function add(Request $request){
        $tv = new user_favorites;
        $tv->userID = Auth::user()->id;
        $tv->title = $request->tv_fav;
        $tv->genre = $request->tv_fav_genre;
        $tv->rate = $request->tv_fav_rating;
        $tv->descrip = $request->tv_fav_desc;
        $tv->Writer = $request->tv_fav_writer;
        $tv->production = $request->tv_fav_prod;
        $tv->director = $request->tv_fav_direc;
        $tv->year = $request->tv_fav_year;
        $tv->image = $request->tv_fav_image;
        $tv->type = $request->tv_fav_type;
        $tv->video = $request->tv_fav_video;
    	$tv->save();
    	return redirect('/tvshows');
    }
    
    public function gettvrec(Request $request)
    {
        $id = Auth::user()->id;
        $tv_recommend = user_favorites::where('userID','!=', $id)
            ->where('type','LIKE','tvshow')
            ->inRandomOrder()
            ->take(12)
            ->get();
        return json_encode($tv_recommend);
    }

    public function getfilter(Request $request)
    {
        $tv_recommend = user_favorites::where('type','LIKE','tvshow')->where('genre', 'LIKE', "%$request->search%")->get();
        return json_encode($tv_recommend);
    }
    
    public function delete(Request $request)
    {
        $tv = user_favorites::where('id', $request->id)->first();
        $tv->delete();

        return response()->json($tv);
    }
}
