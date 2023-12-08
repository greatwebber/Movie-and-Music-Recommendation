<?php

namespace App\Http\Controllers;

use Auth;
use App\user_favorites;
use App\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserFavController extends Controller
{
    public function index()
    {
        return view('user_fav');
    }

    public function getfilter(Request $request)
    {
        $id = Auth::user()->id;
        $favorites = user_favorites::where('userID','=', $id)->where('type', 'LIKE', "%$request->search%")->get();
        return json_encode($favorites);
    }

    public function getuserfav(Request $request)
    {
        $id = Auth::user()->id;
       

            $favorites = DB::table('user_favorites')
           
            ->where('userID','=', $id)
            ->orderBy('type')
            ->get();

        return json_encode($favorites);   
    }
    public function getmusicfav(Request $request)
    {
        $id = Auth::user()->id;
            $music = DB::table('user_favorites')
            ->where('userID','=', $id)
            ->where('type', 'LIKE', 'music')
            ->orderBy('type')
            ->get();
        return json_encode($music);
    }
    
    public function moviedetails($id)
    {
         
    	$movie = user_favorites::where('id', $id)->first();
        $reviews = DB::table('comments')
                ->select('users.image', 'comments.name', 'comments.comment','rate','comments.created_at')
                ->join('users', 'users.id', '=', 'comments.userID')
                ->where('title', 'LIKE', $movie->title)
                ->get();

                $total_rate = array_sum($reviews->pluck('rate')->toArray());
                $total_reviews = $reviews->count();
 
                if ($total_reviews == null){
                     $total_rate = 1;
                }
 
                if ($total_reviews == null){
                 $total_reviews = 1;
                 }
         $ratings = $total_rate/$total_reviews;

    	return view('movie_details', compact('movie','reviews','ratings'));
    }
    
    public function tvdetails($id)
    {
    	$tv = user_favorites::where('id', $id)->first();
        $reviews = DB::table('comments')
                ->select('users.image', 'comments.name', 'comments.comment','comments.rate','comments.created_at')
                ->join('users', 'users.id', '=', 'comments.userID')
                ->where('title', 'LIKE', $tv->title)
                ->get();

                $total_rate = array_sum($reviews->pluck('rate')->toArray());
                $total_reviews = $reviews->count();
 
                if ($total_reviews == null){
                     $total_rate = 1;
                }
 
                if ($total_reviews == null){
                 $total_reviews = 1;
                 }
         $ratings = $total_rate/$total_reviews;

    	return view('tv_details', compact('tv', 'reviews','ratings'));
    }

    public function animeinfo($id)
    {
    	$anime = user_favorites::where('id', $id)->first();
        // $reviews = comments::where('title', 'LIKE', $anime->title)->get();
        $reviews = DB::table('comments')
                ->select('users.image', 'comments.name', 'comments.comment','comments.rate','comments.created_at')
                ->join('users', 'users.id', '=', 'comments.userID')
                ->where('title', 'LIKE', $anime->title)
                ->get();

                
                $total_rate = array_sum($reviews->pluck('rate')->toArray());
                $total_reviews = $reviews->count();
 
                if ($total_reviews == null){
                     $total_rate = 1;
                }
 
                if ($total_reviews == null){
                 $total_reviews = 1;
                 }
         $ratings = $total_rate/$total_reviews;

    	return view('anime_info', compact('anime', 'reviews','ratings'));
    }

    public function musicdetails($id)
    {
    	$music = user_favorites::where('id', $id)->first();

        $reviews = DB::table('comments')
                ->select('users.image', 'comments.name', 'comments.comment','comments.rate','comments.created_at')
                ->join('users', 'users.id', '=', 'comments.userID')
                ->where('title', 'LIKE', $music->title)
                ->get();

               $total_rate = array_sum($reviews->pluck('rate')->toArray());
               $total_reviews = $reviews->count();

               if ($total_reviews == null){
                    $total_rate = 1;
               }

               if ($total_reviews == null){
                $total_reviews = 1;
                }
        $ratings = $total_rate/$total_reviews;
    	return view('music_details', compact('music', 'reviews','ratings'));
    }

}
