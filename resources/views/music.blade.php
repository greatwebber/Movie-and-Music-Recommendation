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

			<form id = "musicForm" autocomplete = "off">
				<div class="form-group">
					<input class="form-control" type="text" id="music" placeholder="Search for a music that you are looking for">
					<input class="form-control" type="text" id="artist" placeholder="Search for a artist that you are looking for">
				</div>

				<div>
				<button class="btn btn-danger btn-block">
						Search
				</button>
				</div>
			</form>
		</div>
	</div>
</header>
<!-- END | Header -->
<div id="result">

</div>


</div>
</div>
<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Music Recommendations</h1>
					<ul class="breadcumb">
						<li> <span class="ion-ios-arrow-right"></span> Music listing</li>
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
						<option value='0'>Select Category</option>
						<option value='pop'>Pop</option>
						<option value='rock'>Rock</option>
						<option value='jazz'>Jazz</option>
						<option value='acoustic'>Acoustic</option>
						<option value='rap'>Rap</option>
					</select>
					<a class="list"><i class="ion-ios-list-outline "></i></a>
					<a class="grid"><i class="ion-grid active"></i></a>
			</div>
			</div>
			<div class="flex-wrap-movielist grid-fav" style="padding-left:50px;" id="music_recommend">
			</div>
				<div class="topbar-filter">
					<label>Music per recommendation:</label>
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
				 <a href="{{ url('/movies') }}"><img class="logo" src="my_res/images/mediahub.png" alt="" style = "width:119px ; height:60px;" >
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
        crossorigin="anonymous">
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
<script>
   $(document).ready(function() {

        $.ajax({
            url: "{{ route('music_recommend') }}",
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
                    html += '<button type="button" onclick="topFunction()" class="btn btn-warning btn-sm" style="color:red; font-family: century gothic;" id="view" data-id="'+value.title+'" data-artist="'+value.Writer+'"><a>Read more <a/></button>';
				    html += '</div>';
                    html += '<div class="mv-item-infor">';
                    html += '<h6><a href="#">' + value.title + '</a></h6>';
                    html += '<p class="rate"><i class="ion-android-star"></i><span>' +  value.rate + '</span>votes</p>';
                    html += '</div>';
                    html += '</div>';
                })
                $('#music_recommend').append(html);
            }
        });
    });
</script>

<script>
		$('#searchText').click(function(e) {
				e.preventDefault();
				var txt = $(this).val();
				if(e.keyCode === 27) {
					$(this).val('');
				}

				$.ajax({
					url: "{{ route('show.search_music') }}",
					headers: {
						'X-CSRF-TOKEN': "{{ csrf_token() }}"
					},
					data: {
						search: txt,
					},
					method:"post",
					dataType:"json",
					success:function(data){
						$("#music_recommend").empty();
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
								html += '<p class="rate"><i class="ion-android-star"></i><span>' +  value.rate + '</span> votes</p>';
								html += '</div>';
								html += '</div>';
							})
						}
						$('#music_recommend').append(html);
					},
					error:function(data){
						console.log(data);
					}
				});
			});
</script>

<script>
    $(document).on('click', '#view[data-id]', function() {
		$("#music_recommend").empty();
			var apikey = "f28d93f80cmsh3abcae865fd39afp1491c8jsn09cb95e10459"
			var yt_apikey = "AIzaSyAa6xpnMEGgVKAE_19hIiCZwo4C2AvnTJs"
			var music =  $(this).data('id');
			var artist =  $(this).data('artist');
			var result = ""
			var video = ''
			var musicdata
			var ytdata
			var ID = $("cPAbx5kgCJo").val()

			var deezerURL = "https://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=c082bc41ea9eedac48a751193517817c&artist="
			var lyricsURL = "https://api.lyrics.ovh/v1/"
			var ytURL = "https://www.googleapis.com/youtube/v3/search?key="

			//SEARCH SONG INFO
			$.ajax({
				method:'GET',
				async: false,
				url: deezerURL + artist + "&track=" + music + "&format=json",
				success:function(data){

					musicdata = data
				}
			})
			//SEARCH SONG LYRICS
			// $.ajax({
			// 	method:'GET',
			// 	async: false,
			// 	url: lyricsURL + artist +"/" + music,
			// 	success:function(data){
            //
			// 		musiclyrics = data.lyrics.replace(new RegExp("\n","g"),"<br>");
			//
			// 	}
			// })
			//SEARCH TRAILER OF THE MOVIE ON YT
			videoSearch(ytURL,yt_apikey,music,artist,10)
			function videoSearch(ytURL,key, music, artist, maxResults){
			$.ajax({
				method:'GET',
				async: false,
				url:ytURL + key + "&type=video&part=snippet&maxResults=" + maxResults + "&q=" + music + artist,
				success:function(data){
					ytdata = data
				}
			})
			}

			console.log(musicdata)
			// console.log(musiclyrics)
			console.log(ytdata)

			// var desc = musicdata.track.wiki.summary
			// var descrip = desc.replace(/"/g, "")
			// console.log(descrip)
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
											<img src="${musicdata.track.album.image[2]["#text"]}" alt="">
											<div class="movie-btn">

												<div class="btn-transform transform-vertical">
													<div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i>Return</a></div>
													<div><a href=""{{ url('/music') }} class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>

												</div>

											</div>
										</div>
									</div>
									<div class="col-md-8 col-sm-12 col-xs-12">
										<div class="movie-single-ct main-content">
										<div  style ="opacity: 0;">
											<form action="{{ route('music_save') }}" id="musicform" method="POST">
													@csrf
													<input type="hidden" class="form-control" name="music_fav" value="${musicdata.track.name}">
													<input type="hidden" class="form-control" name="music_fav_genre" value="${(musicdata && musicdata.track && musicdata.track.toptags && musicdata.track.toptags.tag && musicdata.track.toptags.tag[0]) ? musicdata.track.toptags.tag[0].name : ''}">

													<input type="hidden" class="form-control" name="music_fav_rating" value="${musicdata.track.listeners}">

													<input type="hidden" class="form-control" name="music_fav_writer" value="${musicdata.track.artist.name}">
													<input type="hidden" class="form-control" name="music_fav_actors" value="${musicdata.track.artist.name}">
													<input type="hidden" class="form-control" name="music_fav_prod" value="${musicdata.track.artist.name}">

													<input type="hidden" class="form-control" name="music_fav_direc" value="null">
													<input type="hidden" class="form-control" name="music_fav_image" value="${musicdata.track.album.image[2]["#text"]}">
													<input type="hidden" class="form-control" name="music_fav_video" value="http://www.youtube.com/embed/${ytdata.items[0].id.videoId}">
													<input type="hidden" class="form-control" name="music_fav_type" value="music">
												</form>
											</div>
											<h1 class="bd-hd">${musicdata.track.name}<span> ${musicdata.track.artist.name}</span></h1>
											<div class="social-btn">
												<a href="javascript:void(0)" onclick="$('#musicform').submit()" class="parent-btn" id="musicsave"><i class="ion-heart" ></i> Add to Favorite</a>

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
													<p><span>${musicdata.track.playcount}</span> playcounts<br>
														<span class="rv">${musicdata.track.listeners} listeners</span>
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

																	<div class="title-hd-sm">
																		<h4>Music Video</h4>
																	</div>
																	<br>
																		<iframe width="540" height="315" src="http://www.youtube.com/embed/${ytdata.items[0].id.videoId}" frameborder="0" allowfullscreen></iframe>
																	<br>
																	<div class="title-hd-sm">
																		<h4>Lyrics</h4>
																	</div>


																</div>
																<div class="col-md-4 col-xs-12 col-sm-12">

																	<div class="sb-it">
																		<h6>Date Released</h6>
																		<p class="tags">

																		</p>
																	</div>
																	<div class="sb-it">
																		<h6>Album </h6>
																		<p class="tags">
																			<span class="time"><a href="#">${musicdata.track.album.title}</a></span>

																		</p>
																	</div>
																	<div class="sb-it">
																		<h6>Genre</h6>
																		<p class="tags">
																			<span class="time"><a href="#">${(musicdata && musicdata.track && musicdata.track.toptags && musicdata.track.toptags.tag && musicdata.track.toptags.tag[0]) ? musicdata.track.toptags.tag[0].name : ''}</a></span>

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

    });
</script>


<script>
	$(document).ready(function(){

		var apikey = "f28d93f80cmsh3abcae865fd39afp1491c8jsn09cb95e10459"
		var yt_apikey = "AIzaSyAa6xpnMEGgVKAE_19hIiCZwo4C2AvnTJs"

		$("#musicForm").submit(function(event){
			event.preventDefault()

			var music = $("#music").val()
			var artist = $("#artist").val()
			var result = ""
			var video = ''

			var musicdata
			// var musiclyrics
			var ytdata
			var ID = $("cPAbx5kgCJo").val()

			var deezerURL = "https://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=c082bc41ea9eedac48a751193517817c&artist="
			var lyricsURL = "https://api.lyrics.ovh/v1/"
			var ytURL = "https://www.googleapis.com/youtube/v3/search?key="

			//SEARCH SONG INFO
			$.ajax({
				method:'GET',
				async: false,
				url: deezerURL + artist + "&track=" + music + "&format=json",
				success:function(data){

					musicdata = data
				}
			})
			//SEARCH SONG LYRICS
			// $.ajax({
			// 	method:'GET',
			// 	async: false,
			// 	url: lyricsURL + artist +"/" + music,
			// 	success:function(data){
            //
			// 		musiclyrics = data.lyrics.replace(new RegExp("\n","g"),"<br>");
			//
			// 	}
			// })
			//SEARCH TRAILER OF THE MOVIE ON YT
			videoSearch(ytURL,yt_apikey,music,artist,10)
			function videoSearch(ytURL,key, music, artist, maxResults){
			$.ajax({
				method:'GET',
				async: false,
				url:ytURL + key + "&type=video&part=snippet&maxResults=" + maxResults + "&q=" + music + artist,
				success:function(data){
					ytdata = data
				}
			})
			}

			console.log(musicdata)
			// console.log(musiclyrics)
			console.log(ytdata)

			// var desc = musicdata.track.wiki.summary
			// var descrip = desc.replace(/"/g, "")
			// console.log(descrip)
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
											<img src="${musicdata.track.album.image[2]["#text"]}" alt="">
											<div class="movie-btn">

												<div class="btn-transform transform-vertical">
													<div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i>Return</a></div>
													<div><a href=""{{ url('/music') }} class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>

												</div>

											</div>
										</div>
									</div>
									<div class="col-md-8 col-sm-12 col-xs-12">
										<div class="movie-single-ct main-content">
										<div  style ="opacity: 0;">
											<form action="{{ route('music_save') }}" id="musicform" method="POST">
													@csrf
													<input type="hidden" class="form-control" name="music_fav" value="${musicdata.track.name}">
													<input type="hidden" class="form-control" name="music_fav_genre" value="${(musicdata && musicdata.track && musicdata.track.toptags && musicdata.track.toptags.tag && musicdata.track.toptags.tag[0]) ? musicdata.track.toptags.tag[0].name : ''}">

													<input type="hidden" class="form-control" name="music_fav_rating" value="${musicdata.track.listeners}">
													<input type="hidden" class="form-control" name="music_fav_writer" value="${musicdata.track.artist.name}">
													<input type="hidden" class="form-control" name="music_fav_actors" value="${musicdata.track.artist.name}">
													<input type="hidden" class="form-control" name="music_fav_prod" value="${musicdata.track.artist.name}">

													<input type="hidden" class="form-control" name="music_fav_direc" value="null">
													<input type="hidden" class="form-control" name="music_fav_image" value="${musicdata.track.album.image[2]["#text"]}">
													<input type="hidden" class="form-control" name="music_fav_video" value="http://www.youtube.com/embed/${ytdata.items[0].id.videoId}">
													<input type="hidden" class="form-control" name="music_fav_type" value="music">
												</form>
											</div>
											<h1 class="bd-hd">${musicdata.track.name}<span> ${musicdata.track.artist.name}</span></h1>
											<div class="social-btn">
												<a href="javascript:void(0)" onclick="$('#musicform').submit()" class="parent-btn" id="musicsave"><i class="ion-heart" ></i> Add to Favorite</a>

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
													<p><span>${musicdata.track.playcount}</span> playcounts<br>
														<span class="rv">${musicdata.track.listeners} listeners</span>
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

																	<div class="title-hd-sm">
																		<h4>Music Video</h4>
																	</div>
																	<br>
																		<iframe width="540" height="315" src="http://www.youtube.com/embed/${ytdata.items[0].id.videoId}" frameborder="0" allowfullscreen></iframe>
																	<br>
																	<div class="title-hd-sm">
																		<h4>Lyrics</h4>
																	</div>


																</div>
																<div class="col-md-4 col-xs-12 col-sm-12">

																	<div class="sb-it">
																		<h6>Date Released</h6>
																		<p class="tags">

																		</p>
																	</div>
																	<div class="sb-it">
																		<h6>Album </h6>
																		<p class="tags">
																			<span class="time"><a href="#">${musicdata.track.album.title}</a></span>

																		</p>
																	</div>
																	<div class="sb-it">
																		<h6>Genre</h6>
																		<p class="tags">
																			<span class="time"><a href="#">${(musicdata && musicdata.track && musicdata.track.toptags && musicdata.track.toptags.tag && musicdata.track.toptags.tag[0]) ? musicdata.track.toptags.tag[0].name : ''}</a></span>

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



<!-- moviegridfw07:38-->
</html>
