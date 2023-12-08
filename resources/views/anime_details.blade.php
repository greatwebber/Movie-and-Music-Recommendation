<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MediaHub</title>

     <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="my_res/css/plugins.css">
	<link rel="stylesheet" href="my_res/css/style.css">


	<style>
.dropbtn {
  background-color: #78000c;
  color: white;
  padding: 9px;
  font-size: 12px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 7px 9px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #002d6b;}
</style>
</head>
<body>
<!--preloading-->
<div id="preloader">
    <img class="logo" src="my_res/images/mediahub.png" alt="" width="119" height="58">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>
<!--end of preloading-->


<!-- BEGIN | Header -->
<header class="ht-header">
	<div class="container">
		<nav class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
				    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle navigation</span>
					    <div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
				    </div>
				    <a href="{{ url('/movies') }}"><img class="logo" src="my_res/images/mediahub.png" alt="" width="119" height="58"></a>
			    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						
							<li><a href="{{ url('/movies') }}">MOVIES</a></li>	
							<li><a href="{{ url('/tvshows') }}">TV SHOWS</a></li>	
                            <li><a href="{{ url('/anime') }}">ANIME</a></li>
                            <li><a href="{{ url('/music') }}">MUSIC</a></li>
                            <li><a href="{{ url('/youtube') }}">YOUTUBE</a></li>				
							<li><a href="{{ url('/user_fav') }}">FAVORITES</a></li>	
							<li><a href="{{ url('/user_reviews') }}">REVIEWS</a></li>
							
					</ul>
			
					<ul class="nav navbar-nav flex-child-menu menu-right">               
					@guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else 
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <br>
                                    <a href="{{ url('/user_account') }}">ACCOUNT SETTING</a>
                                </div>
                            </li>
                        @endguest
					</ul>
				</div>
			<!-- /.navbar-collapse -->
	    </nav>
	    
	    <!-- top search form -->
	    <div class="container" >
			
			<form id="SubmitBox" autocomplete = "off">
				<div class="form-group">
					<input class="form-control" type="text" id="searchbox" placeholder="Search for a anime that you are looking for">
				</div>
				<div>
				</div>
			</form>
		</div>
	</div>
</header>

<div id="animepage">
						
</div>


<!-- footer section-->
<footer class="ht-footer">
	<div class="container">
		<div class="flex-parent-ft">
			<div class="flex-child-ft item1">
				 <a href="#"><img class="logo" src="my_res/images/mediahub.png" alt="" style = "width:119px ; height:60px;" >
				 <p>Created by:<br>
				Dave Estopa, Angela Dagoro</p>
				<p> <a href="#">BSIT-3A</a></p>
			</div>
			
		</div>
	</div>
	<div class="ft-copyright">
		<div class="ft-left">
	
		</div>
		<div class="backtotop">
			<p><a href="#" id="back-to-top">Back to top  <i class="ion-ios-arrow-thin-up"></i></a></p>
		</div>
	</div>
</footer>
<!-- end of footer section-->

<script src="my_res/js/jquery.js"></script>
<script src="my_res/js/plugins.js"></script>
<script src="my_res/js/plugins2.js"></script>
<script src="my_res/js/custom.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" 
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" 
        crossorigin="anonymous"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="anime_script.js"></script>

<script>
        $(document).ready(() => {
        var anime = "https://api.jikan.moe/v3/anime/"+localStorage.getItem("animeid");
        GetAnime(anime);
    });
        console.log(localStorage.getItem("animeid"));
</script>
<script>
    
function GetAnime(anime) {
    let output = ""; 
    axios.get(anime)
    .then (function (response) {
        let anime = response.data;
        var genres = "";
        for(var i in anime.genres) {
             genres += anime.genres[i].name +", ";
        }
        console.log(response);
                output += `
                <div class="hero mv-single-hero">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12">
                            <!-- <h1> movie listing - list</h1>
                            <ul class="breadcumb">
                                <li class="active"><a href="#">Home</a></li>
                                <li> <span class="ion-ios-arrow-right"></span> movie listing</li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-single movie-single movie_single">
                <div class="container">						
                    <div class="row ipad-width2">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="movie-img sticky-sb">
                                <img src="${anime.image_url}" alt="">
                                <div class="movie-btn">	
                                   
                                    <div class="btn-transform transform-vertical">
                                        <div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i>Return</a></div>
                                        <div><a href="{{ url('/anime') }}" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="movie-single-ct main-content">

                            <form action="{{ route('anime_save') }}" id="animeform" method="POST">
                            @csrf
                                <input type="hidden" class="form-control" name="anime_fav" value="${anime.title}">
                                <input type="hidden" class="form-control" name="anime_fav_genre" value="${anime.genres[0].name} ${anime.genres[1].name} ${anime.genres[2].name}">
                                <input type="hidden" class="form-control" name="anime_fav_rating" value="${anime.score}">
                                <input type="hidden" class="form-control" name="anime_fav_desc" value="${anime.synopsis}">
                                <input type="hidden" class="form-control" name="anime_fav_writer" value="${anime.studios[0].name}">											
                                <input type="hidden" class="form-control" name="anime_fav_prod" value="${anime.producers[0].name} ${anime.producers[1].name}">
                                <input type="hidden" class="form-control" name="anime_fav_direc" value="${anime.studios[0].name}">
                                <input type="hidden" class="form-control" name="anime_fav_year" value="${anime.premiered}">
                                <input type="hidden" class="form-control" name="anime_fav_image" value="${anime.image_url}">
                                <input type="hidden" class="form-control" name="anime_fav_video" value="${anime.trailer_url}">
                                <input type="hidden" class="form-control" name="anime_fav_type" value="anime">
                            </form>

                                <h1 class="bd-hd">${anime.title}<span> ${anime.premiered}</span></h1>
                                <div class="social-btn">
                                    <a href="javascript:void(0)" onclick="$('#animeform').submit()" class="parent-btn" id="animesave"><i class="ion-heart" ></i> Add to Favorite</a>
                                    
                                    <div class="hover-bnt">
                                        <a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>share</a>
                                        <div class="hvr-item">
                                            <a href="#" class="hvr-grow"><i class="ion-social-facebook"></i></a>
                                            <a href="#" class="hvr-grow"><i class="ion-social-twitter"></i></a>
                                            <a href="#" class="hvr-grow"><i class="ion-social-googleplus"></i></a>
                                            <a href="#" class="hvr-grow"><i class="ion-social-youtube"></i></a>
                                        </div>
                                    </div>		
                                </div>
                                
                                <div class="movie-rate">
                                    <div class="rate">
                                        <i class="ion-android-star"></i>
                                        <p><span>${anime.score}</span> /10<br>
                                            <span class="rv">${anime.favorites} Votes</span>
                                        </p>
                                    </div>
                                    <!-- <div class="rate-star">
                                        <p>Rate This Movie:  </p>
                                        <i class="ion-ios-star"></i>
                                        <i class="ion-ios-star"></i>
                                        <i class="ion-ios-star"></i>
                                        <i class="ion-ios-star"></i>
                                        <i class="ion-ios-star"></i>
                                        <i class="ion-ios-star"></i>
                                        <i class="ion-ios-star"></i>
                                        <i class="ion-ios-star"></i>
                                        <i class="ion-ios-star-outline"></i>
                                    </div> -->
                                </div>
                                <div class="movie-tabs">
                                    <div class="tabs">
                                        <ul class="tab-links tabs-mv">
                                            <li class="active"><a href="#overview">Overview</a></li>                       
                                        </ul>
                                        <div class="tab-content">
                                            <div id="overview" class="tab active">
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                                        <p>${anime.synopsis}</p>
                                                        <div class="title-hd-sm">
                                                            <h4>Studio</h4>
                                                            
                                                        </div>
                                                        <div class="mvcast-item">											
                                                            <div class="cast-it">
                                                                <div class="cast-left">
                                                                    <a href="#">${anime.studios[0].name}</a>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="title-hd-sm">
                                                            <h4>Ending Themes </h4>
                                                            <a href="#" class="time">Full list of ost   <i class="ion-ios-arrow-right"></i></a>
                                                        </div>
                                                      
                                                        <div class="mvcast-item">											
                                                            <div class="cast-it">
                                                                <div class="cast-left">
                                                                    <a href="#">${anime.opening_themes[0]} <br>${anime.opening_themes[1]}</a>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="title-hd-sm">
                                                        <h4>Ending Themes </h4>
                                                        <a href="#" class="time">Full list of ost   <i class="ion-ios-arrow-right"></i></a>
                                                    </div>
                                                  
                                                    <div class="mvcast-item">											
                                                        <div class="cast-it">
                                                            <div class="cast-left">
                                                                <a href="#">${anime.ending_themes[0]} <br>${anime.ending_themes[1]}</a>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                       <br>
                                                        <iframe src="${anime.trailer_url}" frameBorder="0" width="560" height="315"></iframe>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-12">
                                                        <div class="sb-it">
                                                            <h6>Director: </h6>
                                                            <p><a href="#">${anime.producers[0].name} ${anime.producers[1].name} </a></p>
                                                        </div>

                                                        <div class="sb-it">
                                                            <h6>Stars: </h6>
                                                            <p><a href="#">${anime.rating}</a></p>
                                                        </div>
                                                        <div class="sb-it">
                                                            <h6>Genres:</h6>
                                                            <p><a href="#">${anime.genres[0].name} ${anime.genres[1].name} ${anime.genres[2].name}</a></p>
                                                        </div>
                                                    
                                                        <div class="sb-it">
                                                            <h6>Run Time:</h6>
                                                            <p>${anime.duration}</p>
                                                        </div>
            
                                                        <div class="sb-it">
                                                        <h6>Status:</h6>
                                                        <p>${anime.status}</p>
                                                        </div>

                                                        <div class="sb-it">
                                                        <h6>No of Episodes:</h6>
                                                        <p>${anime.episodes} episodes</p>
                                                         </div>
                                                        <div class="ads">
                                                            <img src="my_res/images/uploads/ads1.png" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    
                </div>
            </div>

        `;
    
        $("#animepage").html(output);
    })

}
</script>

</html>