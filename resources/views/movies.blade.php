<!DOCTYPE html>
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
    <!-- <link rel="stylesheet" href="my_res/css/style2.css"> -->

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
			
			<form id = "movieForm" autocomplete = "off">
				<div class="form-group">
					<input class="form-control" type="text" id=movie placeholder="Search for a movie that you are looking for">
				</div>
				<div>
				</div>
			</form>
		</div>
	</div>
</header>
<!-- END | Header -->
<div id="result">
						
</div>

<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Movie Recommendations</h1>
					<ul class="breadcumb">
						<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12" >
		
				<div class="topbar-filter fw">
					<p>Found <span>results</span> in total</p>
					<label>Sort by:</label>
					<select id='searchText'>
						<<option value='0'>Select Category</option> 
						<option value='Drama'>Drama</option> 
						<option value='Action'>Action</option> 
						<option value='Horror'>Horror</option> 
						<option value='Sci-Fi'>Sci-Fi</option> 
						<option value='Thriller'>Thriller</option> 
						<option value='Crime'>Crime</option> 
					</select>
					<a class="list"><i class="ion-ios-list-outline "></i></a>
					<a class="grid"><i class="ion-grid active"></i></a>
				</div>
			</div>
			</div>
			<div class="flex-wrap-movielist grid-fav" style="padding-left:50px;" id="movies_recommend">
			</div>	
				<div class="topbar-filter">
					<label>Movies per recommendation:</label>
					
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
				 <a><img class="logo" src="my_res/images/mediahub.png" alt="" style = "width:119px ; height:60px;" >
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

<script>
   $(document).ready(function() {
        
        $.ajax({
            url: "{{ route('movies_recommend') }}",
            headers: {
                      'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            method:"post",
            dataType:"json",
            success:function(e){
                var html = '';
                $.each(e, function(key, value) {
					html += '<div class="movie-item-style-2 movie-item-style-1 style-3">';
                    html += '<img src="'+ value.image +'" alt="">';
                    html += '<div  class="hvr-inner" style="color:red; >';
                    html += '<button type="button" onclick="topFunction()" class="btn btn-warning btn-sm" style="color:red; font-family: century gothic;" id="view" data-id="'+value.title+'"><a>Read more <a/></button>';
				    html += '</div>';
                    html += '<div class="mv-item-infor">';
                    html += '<h6><a href="#">' + value.title + '</a></h6>';
                    html += '<p class="rate"><i class="ion-android-star"></i><span>' +  value.rate + '</span> /10</p>';        
                    html += '</div>';
                    html += '</div>';
                })
                $('#movies_recommend').append(html);
            }   
        });									
    });

</script>


<script>
//Get the button
var mybutton = document.getElementById("view");

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

<!-- SCRIPT FOR FILTER THE MOVIE RECOMMENDATIONS  -->
<script>
		$('#searchText').click(function(e) {
				e.preventDefault();
				var txt = $(this).val();
				if(e.keyCode === 27) {
					$(this).val('');
				}

				$.ajax({
					url: "{{ route('show.search_movie') }}",
					headers: {
						'X-CSRF-TOKEN': "{{ csrf_token() }}"
					},
					data: {
						search: txt,
					},
					method:"post",
					dataType:"json",
					success:function(data){
						$("#movies_recommend").empty();
						var html = '';
						if(data == '') {
							var count = 6;
							html += '<tr>';
							html += '<td colspan="'+count+'" style="text-align:center;">No record found!</td>';
							html += '<tr>';
						} else {
							$.each(data, function(key, value) {
								html += '<div class="movie-item-style-2 movie-item-style-1 style-3">';
								html += '<img src="'+ value.image +'" alt="">';
								html += '<div  class="hvr-inner" style="color:red; >';
								html += '<button type="button" onclick="topFunction()" class="btn btn-warning btn-sm" style="color:red; font-family: century gothic;" id="view" data-id="'+value.title+'"><a>Read more <a/></button>';
								html += '</div>';
								html += '<div class="mv-item-infor">';
								html += '<h6><a href="#">' + value.title + '</a></h6>';
								html += '<p class="rate"><i class="ion-android-star"></i><span>' +  value.rate + '</span> /10</p>';        
								html += '</div>';
								html += '</div>';
							})
						}
						$('#movies_recommend').append(html);
					},
					error:function(data){
						console.log(data);
					}
				});
			});
</script>

<script>
    $(document).on('click', '#view[data-id]', function() {

		var movie = $(this).data('id');
		var result = ""
		var video = ''
		var omdb_apikey = "bcdad87d"
		var yt_apikey = "AIzaSyAa6xpnMEGgVKAE_19hIiCZwo4C2AvnTJs"

    
		var url = "http://www.omdbapi.com/?apikey=" + omdb_apikey
		var moviedata
		var ytdata
		var ID = $("cPAbx5kgCJo").val()

		//SEARCH MOVIE INFO ON OMDB
		$.ajax({
				method:'GET',
				async: false,
				url:url+"&t="+movie,
				success:function(data){
					
					moviedata = data
				}
			})
		//SEARCH TRAILER OF THE MOVIE ON YT
		videoSearch(yt_apikey,movie,10)
		function videoSearch(key, movie, maxResults){

			$.ajax({
				method:'GET',
				async: false,
				url:"https://www.googleapis.com/youtube/v3/search?key=" + key + "&type=video&part=snippet&maxResults=" + maxResults + "&q=" + movie + "trailer",
				success:function(data){
					ytdata = data
				}
			})
			}

			console.log(moviedata)
			console.log(ytdata)
		
			result= `	
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
												<img src="${moviedata.Poster}" alt="">
												<div class="movie-btn">	

													<div class="btn-transform transform-vertical">
														<div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i>Return</a></div>
														<div><a href="{{ url('/movies') }}" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
														
													</div>
													
												</div>
											</div>
										</div>
										<div class="col-md-8 col-sm-12 col-xs-12">
											<div class="movie-single-ct main-content">

											<form action="{{ route('movies_save') }}" id="movieform" method="POST">
													@csrf
													<input type="hidden" class="form-control" name="movie_fav" value="${moviedata.Title}">
													<input type="hidden" class="form-control" name="movie_fav_genre" value="${moviedata.Genre}">
											
													<input type="hidden" class="form-control" name="movie_fav_rating" value="${moviedata.imdbRating}">
													<input type="hidden" class="form-control" name="movie_fav_desc" value="${moviedata.Plot}">
													<input type="hidden" class="form-control" name="movie_fav_writer" value="${moviedata.Writer}">
													<input type="hidden" class="form-control" name="movie_fav_actors" value="${moviedata.Actors}">
													<input type="hidden" class="form-control" name="movie_fav_prod" value="${moviedata.Production}">
									
													<input type="hidden" class="form-control" name="movie_fav_direc" value="${moviedata.Director}">
													<input type="hidden" class="form-control" name="movie_fav_year" value="${moviedata.Released}">
													<input type="hidden" class="form-control" name="movie_fav_image" value="${moviedata.Poster}">
													<input type="hidden" class="form-control" name="movie_fav_video" value="http://www.youtube.com/embed/${ytdata.items[1].id.videoId}">
													<input type="hidden" class="form-control" name="movie_fav_type" value="movie">
												</form>


												<h1 class="bd-hd">${moviedata.Title}<span> ${moviedata.Year}</span></h1>
												<div class="social-btn">
													<a href="javascript:void(0)" onclick="$('#movieform').submit()" class="parent-btn" id="moviesave"><i class="ion-heart" ></i> Add to Favorite</a>
													
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
														<p><span>${moviedata.imdbRating}</span> /10<br>
															<span class="rv">${moviedata.imdbVotes} Votes</span>
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
																		<p>${moviedata.Plot}</p>
																		<div class="title-hd-sm">
																			<h4>Writers</h4>
																			
																		</div>
																		<div class="mvcast-item">											
																			<div class="cast-it">
																				<div class="cast-left">
																					<a href="#">${moviedata.Writer}</a>
																				</div>
																				
																			</div>
																			
																		</div>
																		<div class="title-hd-sm">
																			<h4>cast</h4>
																			<a href="#" class="time">Full Cast  <i class="ion-ios-arrow-right"></i></a>
																		</div>
																		<!-- movie cast -->
																		<div class="mvcast-item">											
																			<div class="cast-it">
																				<div class="cast-left">
																					<a href="#">${moviedata.Actors}</a>
																				</div>
																				
																			</div>
																			
																		</div>
																		
																		<div class="title-hd-sm">
																			<h4>Awards</h4>											
																		</div>
																		<div class="mv-user-review-item">												
																			<p class="time">
																			${moviedata.Awards}
																			</p>
																		</div>

																		<div class="title-hd-sm">
																			<h4>Productions</h4>											
																		</div>
																		<div class="mv-user-review-item">												
																			<p class="time">
																			${moviedata.Production}
																			</p>
																		</div>
																		<div class="title-hd-sm">
																			<h4>Box Office</h4>											
																		</div>
																		<div class="mv-user-review-item">												
																			<p class="time">
																			${moviedata.BoxOffice}
																			</p>
																		</div>
																		<div class="title-hd-sm">
																			<h4>Movie Trailer</h4>											
																		</div>
																		<br>
																		<iframe width="560" height="315" src="http://www.youtube.com/embed/${ytdata.items[1].id.videoId}" frameborder="0" allowfullscreen></iframe>
																		<br>
																	</div>
																	<div class="col-md-4 col-xs-12 col-sm-12">
																		<div class="sb-it">
																			<h6>Director: </h6>
																			<p><a href="#">${moviedata.Director}</a></p>
																		</div>

																		<div class="sb-it">
																			<h6>Stars: </h6>
																			<p><a href="#">${moviedata.Actors}</a></p>
																		</div>
																		<div class="sb-it">
																			<h6>Genres:</h6>
																			<p><a href="#">${moviedata.Genre}</a></p>
																		</div>
																		<div class="sb-it">
																			<h6>Release Date:</h6>
																			<p>${moviedata.Released}</p>
																		</div>
																		<div class="sb-it">
																			<h6>Run Time:</h6>
																			<p>${moviedata.RunTime}</p>
																		</div>
																		<div class="sb-it">
																			<h6>MMPA Rating:</h6>
																			<p>${moviedata.Rated}</p>
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
						$("#result").html(result)
    });
</script>


<!-- SCRIPTS FOR SEARCH MOVIE WITH TRAILER  -->
<script>
	$(document).ready(function(){

		var omdb_apikey = "bcdad87d"
		var yt_apikey = "AIzaSyAa6xpnMEGgVKAE_19hIiCZwo4C2AvnTJs"
    	var video = ''
			
		$("#movieForm").submit(function(event){
			event.preventDefault()

			var movie = $("#movie").val()
			var result = ""
			var url = "http://www.omdbapi.com/?apikey=" + omdb_apikey


			var moviedata
			var ytdata
			var ID = $("cPAbx5kgCJo").val()

			//SEARCH MOVIE INFO ON OMDB
			$.ajax({
				method:'GET',
				async: false,
				url:url+"&t="+movie,
				success:function(data){
					
					moviedata = data
				}
			})

			//SEARCH TRAILER OF THE MOVIE ON YT
			videoSearch(yt_apikey,movie,10)
			function videoSearch(key, movie, maxResults){
			
			$.ajax({
				method:'GET',
				async: false,
				url:"https://www.googleapis.com/youtube/v3/search?key=" + key + "&type=video&part=snippet&maxResults=" + maxResults + "&q=" + movie + "trailer",
				success:function(data){
					ytdata = data
				}
			})
			}

			console.log(moviedata)
			console.log(ytdata)
	
		
			result= `	
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
												<img src="${moviedata.Poster}" alt="">
												<div class="movie-btn">	
											
													<div class="btn-transform transform-vertical">
														<div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i>Return</a></div>
														<div><a href="{{ url('/movies') }}" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
														
													</div>
													
												</div>
											</div>
										</div>
										<div class="col-md-8 col-sm-12 col-xs-12">
											<div class="movie-single-ct main-content">

											<form action="{{ route('movies_save') }}" id="movieform" method="POST">
													@csrf
													<input type="hidden" class="form-control" name="movie_fav" value="${moviedata.Title}">
													<input type="hidden" class="form-control" name="movie_fav_genre" value="${moviedata.Genre}">
											
													<input type="hidden" class="form-control" name="movie_fav_rating" value="${moviedata.imdbRating}">
													<input type="hidden" class="form-control" name="movie_fav_desc" value="${moviedata.Plot}">
													<input type="hidden" class="form-control" name="movie_fav_writer" value="${moviedata.Writer}">
													<input type="hidden" class="form-control" name="movie_fav_actors" value="${moviedata.Actors}">
													<input type="hidden" class="form-control" name="movie_fav_prod" value="${moviedata.Production}">
									
													<input type="hidden" class="form-control" name="movie_fav_direc" value="${moviedata.Director}">
													<input type="hidden" class="form-control" name="movie_fav_year" value="${moviedata.Released}">
													<input type="hidden" class="form-control" name="movie_fav_image" value="${moviedata.Poster}">
													<input type="hidden" class="form-control" name="movie_fav_video" value="http://www.youtube.com/embed/${ytdata.items[1].id.videoId}">
													<input type="hidden" class="form-control" name="movie_fav_type" value="movie">
												</form>


												<h1 class="bd-hd">${moviedata.Title}<span> ${moviedata.Year}</span></h1>
												<div class="social-btn">
													<a href="javascript:void(0)" onclick="$('#movieform').submit()" class="parent-btn" id="moviesave"><i class="ion-heart" ></i> Add to Favorite</a>
													
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
														<p><span>${moviedata.imdbRating}</span> /10<br>
															<span class="rv">${moviedata.imdbVotes} Votes</span>
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
																		<p>${moviedata.Plot}</p>
																		<div class="title-hd-sm">
																			<h4>Writers</h4>
																			
																		</div>
																		<div class="mvcast-item">											
																			<div class="cast-it">
																				<div class="cast-left">
																					<a href="#">${moviedata.Writer}</a>
																				</div>
																				
																			</div>
																			
																		</div>
																		<div class="title-hd-sm">
																			<h4>cast</h4>
																			<a href="#" class="time">Full Cast  <i class="ion-ios-arrow-right"></i></a>
																		</div>
																		<!-- movie cast -->
																		<div class="mvcast-item">											
																			<div class="cast-it">
																				<div class="cast-left">
																					<a href="#">${moviedata.Actors}</a>
																				</div>
																				
																			</div>
																			
																		</div>
																		
																		<div class="title-hd-sm">
																			<h4>Awards</h4>											
																		</div>
																		<div class="mv-user-review-item">												
																			<p class="time">
																			${moviedata.Awards}
																			</p>
																		</div>

																		<div class="title-hd-sm">
																			<h4>Productions</h4>											
																		</div>
																		<div class="mv-user-review-item">												
																			<p class="time">
																			${moviedata.Production}
																			</p>
																		</div>
																		<div class="title-hd-sm">
																			<h4>Box Office</h4>											
																		</div>
																		<div class="mv-user-review-item">												
																			<p class="time">
																			${moviedata.BoxOffice}
																			</p>
																		</div>
																		<div class="title-hd-sm">
																			<h4>Trailer</h4>											
																		</div>
																		<br>
																		<iframe width="560" height="315" src="http://www.youtube.com/embed/${ytdata.items[1].id.videoId}" frameborder="0" allowfullscreen></iframe>
																		<br>
																	</div>
																	<div class="col-md-4 col-xs-12 col-sm-12">
																		<div class="sb-it">
																			<h6>Director: </h6>
																			<p><a href="#">${moviedata.Director}</a></p>
																		</div>

																		<div class="sb-it">
																			<h6>Stars: </h6>
																			<p><a href="#">${moviedata.Actors}</a></p>
																		</div>
																		<div class="sb-it">
																			<h6>Genres:</h6>
																			<p><a href="#">${moviedata.Genre}</a></p>
																		</div>
																		<div class="sb-it">
																			<h6>Release Date:</h6>
																			<p>${moviedata.Released}</p>
																		</div>
																		<div class="sb-it">
																			<h6>Run Time:</h6>
																			<p>${moviedata.RunTime}</p>
																		</div>
																		<div class="sb-it">
																			<h6>MMPA Rating:</h6>
																			<p>${moviedata.Rated}</p>
																		</div>
																		<div class="sb-it">
																			<h6>Plot Keywords:</h6>
																			<p class="tags">
																				<span class="time"><a href="#">superhero</a></span>
																				<span class="time"><a href="#">marvel universe</a></span>
																				<span class="time"><a href="#">comic</a></span>
																				<span class="time"><a href="#">blockbuster</a></span>
																				<span class="time"><a href="#">final battle</a></span>
																			</p>
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
						$("#result").html(result)
		})
	})

</script>
</body>
</html>