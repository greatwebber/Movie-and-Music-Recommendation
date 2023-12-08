<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', function () {
    return view('landing');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/movies', 'MoviesController@index')->middleware('auth')->name('movies');
Route::post('/movies', 'MoviesController@getmovierec')->name('movies_recommend');
Route::post('/movies/add', 'MoviesController@add')->name('movies_save');
Route::post('/movies/delete', 'MoviesController@delete')->name('movie_delete');

// Route::post('/movie-details/{id}/{title}', 'CommentController@getcomment')->name('movies_comment');
// Route::post('/movie-details', 'CommentController@specgetuserreviews')->name('my_specreviews');

Route::post('/movies/search', 'MoviesController@getfilter')->name('show.search_movie');
Route::get('/tvshows', 'TVController@index')->middleware('auth')->name('tvshows');
Route::post('/tvshows', 'TVController@gettvrec')->name('tv_recommend');
Route::post('/tvshows/add', 'TVController@add')->name('tv_save');
Route::post('/tvshows/delete', 'TVController@delete')->name('tv_delete');
Route::post('/tvshows/search', 'TVController@getfilter')->name('show.search_tv');


Route::get('/anime', 'AnimeController@index')->middleware('auth')->name('anime');
Route::get('/anime_info', 'AnimeController@anime_info')->middleware('auth')->name('anime_info');
Route::get('/anime_search', 'AnimeController@anime_search')->middleware('auth')->name('anime_search');
Route::post('/anime/add', 'AnimeController@add')->name('anime_save');
Route::post('/anime/search', 'AnimeController@getfilter')->name('show.search_anime');

Route::get('/music', 'MusicController@index')->middleware('auth')->name('music');
Route::post('/music/add', 'MusicController@add')->name('music_save');
Route::post('/music', 'MusicController@getmusicrec')->name('music_recommend');
Route::post('/music/search', 'MusicController@getfilter')->name('show.search_music');

Route::get('/youtube', 'YoutubeController@index')->middleware('auth')->name('youtube');

Route::get('/user_account', 'UserController@index')->middleware('auth')->name('user_account');
Route::post('/user_account/update', 'UserController@update')->name('user.update');
Route::post('/user_account/update_avatar', 'UserController@change_avatar')->name('user.update_avatar');

Route::get('/user_fav', 'UserFavController@index')->middleware('auth')->name('user_fav');
Route::post('/user_favorites', 'UserFavController@getuserfav')->name('user_favorites');
Route::post('/music_favorites', 'UserFavController@getmusicfav')->name('music_favorites');

Route::get('/movie-details/{id}/{title}', 'UserFavController@moviedetails')->name('movie_details');


Route::get('/tv-details/{id}/{title}', 'UserFavController@tvdetails')->name('tv_details');
Route::get('/anime-info/{id}/{title}', 'UserFavController@animeinfo')->name('anime_info');
Route::get('/music-details/{id}/{title}', 'UserFavController@musicdetails')->name('music_details');

Route::post('/user_favorites/search', 'UserFavController@getfilter')->name('show.search_favorites');
Route::get('/user_reviews', 'CommentController@index')->middleware('auth')->name('user_reviews');
Route::post('/user_reviews', 'CommentController@getuserreviews')->name('my_reviews');

Route::post('comment/save', 'CommentController@store')->name('comment.store');



