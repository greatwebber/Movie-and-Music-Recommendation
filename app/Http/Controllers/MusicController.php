<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user_favorites;
use Auth;
class MusicController extends Controller
{
    public function index()
    {
        return view('music');
    }

    public function getmusicrec(Request $request)
    {
        $id = Auth::user()->id;
        $music_recommend = user_favorites::where('userID','!=', $id)
            ->where('type','LIKE','music')
            ->inRandomOrder()
            ->take(12)
            ->get();
        return json_encode($music_recommend);
    }

    public function getfilter(Request $request)
    {
        $music_recommend = user_favorites::where('type','LIKE','music')->where('genre', 'LIKE', "%$request->search%")->get();
        return json_encode($music_recommend);
    }
    
    public function add(Request $request){
        $music = new user_favorites;
        $music->userID = Auth::user()->id;
        $music->title = $request->music_fav;
        $music->genre = $request->music_fav_genre;
        $music->rate = $request->music_fav_rating;
        $music->descrip = $request->music_fav_desc;
        $music->Writer = $request->music_fav_writer;
        $music->actors = $request->music_fav_actors;
        $music->production = $request->music_fav_prod;
        $music->director = $request->music_fav_direc;
        $music->year = $request->music_fav_year;
        $music->image = $request->music_fav_image;
        $music->type = $request->music_fav_type;
        $music->video = $request->music_fav_video;
        $music->lyrics = $request->music_fav_lyrics;
    	$music->save();
    	return redirect('/music');
    }
}
