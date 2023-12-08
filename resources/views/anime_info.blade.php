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
	<link rel="stylesheet" href="../../my_res/css/plugins.css">
	<link rel="stylesheet" href="../../my_res/css/style.css">
	<link rel="stylesheet" href="../../my_res/css/comment-form.css">
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

margin-bottom: 50px !important;
		    border: 1px solid #edeff2;
		    border-radius: 2px;
		    padding: 50px 70px;
		    border:1px solid #ffffff;
		}

		.comments-title {
		    font-size: 16px;
		    color: #262626;
		    margin-bottom: 15px;
		    font-family: century gothic;
		}

		.be-img-comment {
		    width: 60px;
		    height: 60px;
		    float: left;
		    margin-bottom: 15px;
		}

		.be-ava-comment {
		    width: 60px;
		    height: 60px;
		    border-radius: 50%;
		}

		.be-comment-content {
		    margin-left: 80px;
		}

		.be-comment-content span {
		    display: inline-block;
		    width: 49%;
		    margin-bottom: 15px;
		}

		.be-comment-name {
		    font-size: 13px;
		    font-family: 'Conv_helveticaneuecyr-bold';
		}

		.be-comment-content a {
		    color: #383b43;
		}

		.be-comment-content span {
		    display: inline-block;
		    width: 49%;
		    margin-bottom: 15px;
		}

		.be-comment-time {
		    text-align: right;
		}

		.be-comment-time {
		    font-size: 11px;
		    color: #b4b7c1;
		}

		.be-comment-text {
		    font-size: 13px;
		    line-height: 18px;
		    color: #7a8192;
		    display: block;
		    background: #f6f6f7;
		    border: 1px solid #edeff2;
		    padding: 15px 20px 20px 20px;
		}
</style>
</head>
<body>
<!--preloading-->
<div id="preloader">
    <img class="logo" src="../../my_res/images/mediahub.png" alt="" width="119" height="58">
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
				    <a href="{{ url('/movies') }}"><img class="logo" src="../../my_res/images/mediahub.png" alt="" width="119" height="58"></a>
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
	</div>
</header>

<div>
<div class="hero mv-single-hero">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12">
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-single movie-single movie_single">
                <div class="container">						
                    <div class="row ipad-width2">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="movie-img sticky-sb">
                                <img src="{{ $anime->image }}" alt="">
                                <div class="movie-btn">	
                                    <div class="btn-transform transform-vertical">
                                        <div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i>Return</a></div>
                                        <div><a href="{{ url('/user_fav') }}" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="movie-single-ct main-content">
                      
                                <h1 class="bd-hd">{{ $anime->title }}<span> {{ $anime->year }}</span></h1>
								<div class="movie-rate">
													<div class="rate">
														<p>
														<!-- <i class="ion-android-star"></i> -->
														<!-- <p><span>{{$ratings}}</span> /10 -->
													          <span >
													              @for($i = 0; $i < $ratings; $i++)
													               <i class="ion-android-star"></i>
													              @endfor
													              /10 Star
													            </span>
															<br>
														</p>
													</div>
										
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
                                                        <p>{{ $anime->descrip }}</p>
                                                        <div class="title-hd-sm">
                                                            <h4>Studio</h4>
                                                            
                                                        </div>
                                                        <div class="mvcast-item">											
                                                            <div class="cast-it">
                                                                <div class="cast-left">
                                                                    <a href="#">{{ $anime->director }}</a>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="title-hd-sm">
                                                        <h4>Writer </h4>
                                                        </div>
                                                  
                                                        <div class="mvcast-item">											
                                                        <div class="cast-it">
                                                            <div class="cast-left">
                                                                <a href="#">{{ $anime->production }}</a>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                       <br>
                                                       <div class="title-hd-sm">
														    <h4>Trailer</h4>											
														</div>
                                                        <iframe src="{{ $anime->video }}" frameBorder="0" width="560" height="315"></iframe>
                                                   
                                                    <div class="title-hd-sm">
														    <h4>Comments</h4>											
														</div>       
                                                    </div>


                                                    <div class="col-md-4 col-xs-12 col-sm-12">
                                                        
                                                        <div class="sb-it">
                                                            <h6>Genres:</h6>
                                                            <p><a href="#">{{ $anime->genre }}</a></p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
														
																<div class="row">
                                                            		@foreach($reviews as $review)
																		<div class="col-md-12">
																			<div class="ceb-item-style-2">
																				<img src="/user/{{ $review-> image }}" alt="" style="height:140px; width:100px;" >
																				<div class="ceb-infor">
																					<h2><a href="#" style="font-size: 11px;">{{ $review->name }}</a></h2>
																					<span  style="font-size: 11px;">{{ date('M d, Y', strtotime($review->created_at)) }}</span>
																					<div class="mv-item-infor">
																					<p class="rate"  style="font-size: 11px;"><i class="ion-android-star"></i><span>{{ $review->rate }}</span> /10</p>
																					</div>
																				
																					<p style="font-size: 11px;">{{ $review->comment }}</p>
																				</div>
																			</div>
																		</div>
																	@endforeach
																</div>

                                        				</br></br></br>
														<div class="col-md-9 col-sm-12 col-xs-12">
															<div class="form-style-1 user-pro" action="#">
																<form method="POST" action="{{ route('comment.store') }}">
																@csrf
																
																	<h4>Review Form</h4>
																	<div class="row">
																	<input class="form-input" type="hidden" name="poster" value="{{ $anime->image }}">
																	<input class="form-input" type="hidden" name="title" value="{{ $anime->title }}">
																		<div class="col-md-6 form-it">
																			<label>Username</label>
																			<input type="text" name="name" placeholder="Your name" >
																		</div>
																		<div class="col-md-6 form-it">
																			<label>Email Address</label>
																			<input type="text" name="email" placeholder="Your email">
																		</div>
																	</div>
																	
																	<div class="row">
																		<div class="col-md-15 form-it">
																			<label>Comment</label>
																			<textarea  class="form-input"  required="" name="comment" placeholder="Your comment" cols="10"></textarea>
																		</div>

																	</div>
																	<div class="row">
																		
																	<p>Rate from 1-5 (each star is equal to 2)</p>
																	<div class="post_ratings">
																		<div class="form-group fl_icon">
																		
																					<!-- {{-- Form Open --}} -->
																					<input type="hidden" name="post_id" value="${data.Title}">
																					<div class="rating_submit_inner">
																					<input id="radio1" type="radio" name="rating" value="10" class="star"/>
																					<label for="radio1">&#9733;</label>
																					<input id="radio2" type="radio" name="rating" value="8" class="star"/>
																					<label for="radio2">&#9733;</label>
																					<input id="radio3" type="radio" name="rating" value="6" class="star"/>
																					<label for="radio3">&#9733;</label>
																					<input id="radio4" type="radio" name="rating" value="4" class="star"/>
																					<label for="radio4">&#9733;</label>
																					<input id="radio5" type="radio" name="rating" value="2" class="star"/>
																					<label for="radio5">&#9733;</label>
																					</div>
																					<div class="rating_submit_wrap">
																					<!-- {{-- Form Open -- }} -->
																			
																					<!-- {{-- Form Close--}} -->
																					</div>
																				
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-md-2">
																			<input class="submit" type="submit">
																		</div>
																	</div>	
																</form>
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


<!-- footer section-->
<footer class="ht-footer">
	<div class="container">
		<div class="flex-parent-ft">
			<div class="flex-child-ft item1">
				 <a href="#"><img class="logo" src="../../my_res/images/mediahub.png" alt="" style = "width:119px ; height:60px;" >
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

<script src="../../my_res/js/jquery.js"></script>
<script src="../../my_res/js/plugins.js"></script>
<script src="../../my_res/js/plugins2.js"></script>
<script src="../../my_res/js/custom.js"></script>

</html>