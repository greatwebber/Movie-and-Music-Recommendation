<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comments;
use Auth;
use Validator;
use Session;
use Redirect;
use Snipe\BanBuilder\CensorWords;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index()
    {
        return view('user_reviews');


    }

    public function getuserreviews(Request $request)
    {
        
        Auth::user()->id;
        $reviews = comments::orderBy('id', 'DESC')->get();
        return json_encode($reviews);
    }

    public function create()
    {
        $user = User::all();
        $movie = Movie::all();

        return view('movie.show_movie', compact('user', 'movie'));
    }

    public function store(Request $request)
    {
    	
	        $censor = new CensorWords;
	        $profanity = $censor->censorString($request->comment);

	        $comment = new comments;
            $comment->userID = Auth::user()->id;
            $comment->title = $request->title;
            $comment->image = $request->poster;
	        $comment->name = $request->name;
	        $comment->email = $request->email;
	        $comment->rate = $request->rating;
	        $comment->comment = $profanity['clean'];
	        $comment->save();
            

        return redirect('/user_fav');
    }

    // public function specgetuserreviews(Request $request)
    // {
    //         $title = $request->searchtitle;
    //         $reviews = DB::table('comments')
    //                 ->select('users.image', 'comments.name', 'comments.comment','comments.rate','comments.created_at')
    //                 ->join('users', 'users.id', '=', 'comments.userID')
    //                 ->where('comments.title', 'LIKE', $title)
    //                 ->get();

    //         // $reviews = comments::where('title', 'LIKE', $title)->get();
    //         dd($reviews);

    //     return view('movie_details', compact('reviews'));
    // }
}
