<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user_favorites;
use Auth;

class AnimeController extends Controller
{
    public function index()
    {
        return view('anime');
    }

    public function anime_info()
    {
        return view('anime_details');
    }
    public function anime_search()
    {
        return view('anime_searchlist');
    }
    public function getfilter(Request $request)
    {
        $movies_recommend = user_favorites::where('type','LIKE','anime')->where('genre', 'LIKE', "%$request->search%")->get();
        return json_encode($movies_recommend);
    }


    public function add(Request $request){
        $anime = new user_favorites;
        $anime->userID = Auth::user()->id;
        
        $anime->title = $request->anime_fav;
        $anime->genre = $request->anime_fav_genre;
        $anime->rate = $request->anime_fav_rating;
        $anime->descrip = $request->anime_fav_desc;
        $anime->Writer = $request->anime_fav_writer;
        $anime->actors = $request->anime_fav_actors;
        $anime->production = $request->anime_fav_prod;
        $anime->director = $request->anime_fav_direc;
        $anime->year = $request->anime_fav_year;
        $anime->image = $request->anime_fav_image;
        $anime->type = $request->anime_fav_type;
        $anime->video = $request->anime_fav_video;
        $anime->lyrics = $request->anime_fav_lyrics;
    	$anime->save();
    	return redirect('/anime');
    }
}
