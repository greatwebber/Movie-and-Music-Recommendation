<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user_favorites;
use App\comments;
use Auth;

class MoviesController extends Controller
{
    public function index()
    {
        return view('movies');
    }

   public function getmovierec(Request $request)
    {
        $id = Auth::user()->id;
        $movies_recommend = user_favorites::where('userID','!=', $id)
            ->where('type','LIKE','movie')
            ->inRandomOrder()
            ->take(12)
            ->get();
        return json_encode($movies_recommend);
    }

    public function getfilter(Request $request)
    {
        $movies_recommend = user_favorites::where('type','LIKE','movie')->where('genre', 'LIKE', "%$request->search%")->get();
        return json_encode($movies_recommend);
    }
    

    public function add(Request $request){
        $movie = new user_favorites;
        $movie->userID = Auth::user()->id;
        $movie->title = $request->movie_fav;
        $movie->genre = $request->movie_fav_genre;
        $movie->rate = $request->movie_fav_rating;
        $movie->descrip = $request->movie_fav_desc;
        $movie->Writer = $request->movie_fav_writer;
        $movie->actors = $request->movie_fav_actors;
        $movie->production = $request->movie_fav_prod;
        $movie->director = $request->movie_fav_direc;
        $movie->year = $request->movie_fav_year;
        $movie->image = $request->movie_fav_image;
        $movie->type = $request->movie_fav_type;
        $movie->video = $request->movie_fav_video;
    	$movie->save();
    	
    	return redirect('/movies');
    }

    public function delete(Request $request)
    {
        $movie = user_favorites::where('id', $request->id)->first();
        $movie->delete();

        return response()->json($movie);
    }

    public function getcomment(Request $request)
    {
        $comment = comments::where('title', 'LIKE', "%$request->search%")->get();
        return json_encode($comment);

   
    }


}
