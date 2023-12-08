<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">

<!-- userfavoritegrid13:40-->
<head>
	<!-- Basic need -->
	
    <title>MediaHub</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="my_res/css/plugins.css">
	<link rel="stylesheet" href="my_res/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	

<script>
//Get the button
var mybutton = document.getElementById("view");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</head>
<body>
<!--preloading-->
<div id="preloader">
    <img class="logo" src="my_res/images/logo1.png" alt="" width="119" height="58">
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
	    
	   
	</div>
</header>
<!-- END | Header -->
<div id="result">
						
</div>


<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>{{ Auth::user()->name }}'s Favorites</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Favorite Movies, TV Shows, Anime, Music</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-3 col-sm-12 col-xs-12" style="height:1800px;">
				<div class="user-information">
					<div class="user-img">
						<a href="#"><img src="user/{{ Auth::user()->image }}" alt=""><br></a>

					</div>
					<div class="user-fav">
						<p>Account Details</p>
						<ul>
							<li class="active"><a href="{{ url('/user_fav') }}">Favorite Movies, TV Shows, Anime, Music</a></li>
							<!-- <li><a href="{{ url('/user_fav_tv') }}">Favorite Tv Shows</a></li> -->
						</ul>
					</div>
					
				</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">

				<div class="topbar-filter">
					<p>Movie, Tv show, and Anime Section</p>
					<select id='searchText'>
						<option value='0'>Select Category</option> 
						<option value='movie'>Movies</option> 
						<option value='tvshow'>Tv Shows</option> 
						<option value='anime'>Anime</option> 
					</select>
				</div>
			</div>
			<div class="flex-wrap-movielist grid-fav" style="padding-left:50px;" id="tv_recommend">
               
				<div class="flex-wrap-movielist grid-fav"  id="favorites">
	
				</div>		
				
			</div>
			<div>
			<div class="col-md-9 col-sm-12 col-xs-12">

				<div class="topbar-filter">
					<p>Music Section</p>
					<select id='searchmusic'>
						<option value='0'>Playlist</option> 
						<option value='pop'>Pop</option> 
						<option value='rock'>Rock</option> 
						<option value='jazz'>Jazz</option> 
						<option value='acoustic'>Acoustic</option> 
						<option value='rap'>Rap</option> 
					</select>
				</div>
			
				<div class="col-md-9 col-sm-12 col-xs-12"  id="music_favorites">
            		<!--- display the list of favorite music of  the user -->
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

<script>
   $(document).ready(function() {
        
        $.ajax({
            url: "{{ route('user_favorites') }}",
            headers: {
                      'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            method:"post",
            dataType:"json",
            success:function(e){
				
                var html = '';
                $.each(e, function(key, value) {
					if ((value.type == "movie")) {
						//movie
						html += '<div class="movie-item-style-2 movie-item-style-1 style-3">';
						html += '<img src="'+ value.image +'" alt="">';
						html += '<div class="hvr-inner" style="color:red;>';
						html += '<button type="button" class="btn btn-warning btn-sm" style="color:red; font-family: century gothic;"><a href= "/movie-details/'+ value.id +'/'+ value.title +'">Read more</a> </button>';
						html += '</div>';
						html += '<div class="mv-item-infor">';
						html += '<h6><a href="#">' + value.title + '</a></h6>';
						// html += '<p class="rate"><i class="ion-android-star"></i><span>' +  value.rate + '</span> /10</p>';
						html += '<div class="cate">';
						html += '<span class="blue"><a href="#">'+ value.type +'</a></span>';
						html += '</div>';
						html += '<button type="button" class="btn btn-danger" btn-sm id="delete" data-id="'+value.id+'">';
						html += '<span class="glyphicon glyphicon-trash"></span>';
						html += ' </button>';
						html += '</div>';
						html += '</div>';
					} 
					if ((value.type == "tvshow")) {
						//tv show
						html += '<div class="movie-item-style-2 movie-item-style-1 style-3">';
						html += '<img src="'+ value.image +'" alt="">';
						html += '<div class="hvr-inner" style="color:red;>';
						// html += '<button type="button" onclick="topFunction()" class="btn btn-warning btn-sm" style="color:red; font-family: century gothic;" id="view" data-id="'+value.title+'"><a>Read more</a> </button>';
						html += '<button type="button" class="btn btn-warning btn-sm" style="color:red; font-family: century gothic;"><a href= "/tv-details/'+ value.id +'/'+ value.title +'">Read more</a> </button>';
						html += '</div>';
						html += '<div class="mv-item-infor">';
						html += '<h6><a href="#">' + value.title + '</a></h6>';
						// html += '<p class="rate"><i class="ion-android-star"></i><span>' +  value.rate + '</span> /10</p>';
						html += '<div class="cate">';
						html += '<span class="blue"><a href="#">'+ value.type +'</a></span>';
						html += '</div>';
						html += '<button type="button" class="btn btn-danger" btn-sm id="delete" data-id="'+value.id+'">';
						html += '<span class="glyphicon glyphicon-trash"></span>';
						html += ' </button>';
						html += '</div>';
						html += '</div>';
					}
					if ((value.type == "anime")) {
						//for anime
						html += '<div class="movie-item-style-2 movie-item-style-1 style-3">';
						html += '<img src="'+ value.image +'" alt="">';
						html += '<div class="hvr-inner" style="color:red;>';
						html += '<button type="button" class="btn btn-warning btn-sm" style="color:red; font-family: century gothic;"><a href= "/anime-info/'+ value.id +'/'+ value.title +'">Read more</a> </button>';
						html += '</div>';
						html += '<div class="mv-item-infor">';
						html += '<h6><a href="#">' + value.title + '</a></h6>';
						// html += '<p class="rate"><i class="ion-android-star"></i><span>' +  value.rate + '</span> /10</p>';
						html += '<div class="cate">';
						html += '<span class="blue"><a href="#">'+ value.type +'</a></span>';
						html += '</div>';
						html += '<button type="button" class="btn btn-danger" btn-sm id="delete" data-id="'+value.id+'">';
						html += '<span class="glyphicon glyphicon-trash"></span>';
						html += ' </button>';
						html += '</div>';
						html += '</div>';
					}
                })
                $('#favorites').append(html);
            }   
        }); 			
    });

</script>

<script>
   $(document).ready(function() {
        
        $.ajax({
            url: "{{ route('music_favorites') }}",
            headers: {
                      'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            method:"post",
            dataType:"json",
            success:function(e){
				
                var html = '';
                $.each(e, function(key, value) {
						html += '<div class="blog-item-style-1 blog-item-style-3" style="width:800px; height:100px;">';
						html += '<img src="'+ value.image +'" alt="" style="width:150px;">';
						html += '<div class="blog-it-infor">';
						html += '<h3><a href= "/music-details/'+ value.id +'/'+ value.title +'">' + value.title + '</a></h3>';
						html += '<span class="time">' + value.Writer + '</span>';
						html += '<p>' + value.descrip + '</p>';
						html += '</div>';
						html += '<button type="button" class="btn btn-danger" btn-sm id="delete" data-id="'+value.id+'">';
						html += '<span class="glyphicon glyphicon-trash"></span>';
						html += '</button>';
						html += '</div>';
                })
                $('#music_favorites').append(html);
            }   
        });	
    });

</script>


<script>
		$('#searchText').click(function(e) {
				e.preventDefault();
				var txt = $(this).val();
				
				//if esc is pressed or nothing is entered
				if(e.keyCode === 27) {
					$(this).val('');
				}

				$.ajax({
					url: "{{ route('show.search_favorites') }}",
					headers: {
						'X-CSRF-TOKEN': "{{ csrf_token() }}"
					},
					data: {
						search: txt,
					},
					method:"post",
					dataType:"json",
					success:function(data){
						$("#favorites").empty();
						var html = '';
						if(data == '') {
							var count = 6;
							html += '<tr>';
							html += '<td colspan="'+count+'" style="text-align:center;">No record found!</td>';
							html += '<tr>';
						} else {
							$.each(data, function(key, value) {
								if ((value.type == "movie")) {
									//movie
									html += '<div class="movie-item-style-2 movie-item-style-1 style-3">';
									html += '<img src="'+ value.image +'" alt="">';
									html += '<div class="hvr-inner" style="color:red;>';
									html += '<button type="button" class="btn btn-warning btn-sm" style="color:red; font-family: century gothic;"><a href= "/movie-details/'+ value.id +'/'+ value.title +'">Read more</a> </button>';
									html += '</div>';
									html += '<div class="mv-item-infor">';
									html += '<h6><a href="#">' + value.title + '</a></h6>';
									// html += '<p class="rate"><i class="ion-android-star"></i><span>' +  value.rate + '</span> /10</p>';
									html += '<div class="cate">';
									html += '<span class="blue"><a href="#">'+ value.type +'</a></span>';
									html += '</div>';
									html += '<button type="button" class="btn btn-danger" btn-sm id="delete" data-id="'+value.id+'">';
									html += '<span class="glyphicon glyphicon-trash"></span>';
									html += ' </button>';
									html += '</div>';
									html += '</div>';
								} 
								if ((value.type == "tvshow")) {
									//tv show
									html += '<div class="movie-item-style-2 movie-item-style-1 style-3">';
									html += '<img src="'+ value.image +'" alt="">';
									html += '<div class="hvr-inner" style="color:red;>';
									html += '<button type="button" class="btn btn-warning btn-sm" style="color:red; font-family: century gothic;"><a href= "/tv-details/'+ value.id +'/'+ value.title +'">Read more</a> </button>';
									html += '</div>';
									html += '<div class="mv-item-infor">';
									html += '<h6><a href="#">' + value.title + '</a></h6>';
									// html += '<p class="rate"><i class="ion-android-star"></i><span>' +  value.rate + '</span> /10</p>';
									html += '<div class="cate">';
									html += '<span class="blue"><a href="#">'+ value.type +'</a></span>';
									html += '</div>';
									html += '<button type="button" class="btn btn-danger" btn-sm id="delete" data-id="'+value.id+'">';
									html += '<span class="glyphicon glyphicon-trash"></span>';
									html += ' </button>';
									html += '</div>';
									html += '</div>';
								}
								if ((value.type == "anime")) {
									//for anime
									html += '<div class="movie-item-style-2 movie-item-style-1 style-3">';
									html += '<img src="'+ value.image +'" alt="">';
									html += '<div class="hvr-inner" style="color:red;>';
									html += '<button type="button" class="btn btn-warning btn-sm" style="color:red; font-family: century gothic;"><a href= "/anime-info/'+ value.id +'/'+ value.title +'">Read more</a> </button>';
									html += '</div>';
									html += '<div class="mv-item-infor">';
									html += '<h6><a href="#">' + value.title + '</a></h6>';
									// html += '<p class="rate"><i class="ion-android-star"></i><span>' +  value.rate + '</span> /10</p>';
									html += '<div class="cate">';
									html += '<span class="blue"><a href="#">'+ value.type +'</a></span>';
									html += '</div>';
									html += '<button type="button" class="btn btn-danger" btn-sm id="delete" data-id="'+value.id+'">';
									html += '<span class="glyphicon glyphicon-trash"></span>';
									html += ' </button>';
									html += '</div>';
									html += '</div>';
								}
							})
						}
						$('#favorites').append(html);
					},
					error:function(data){
						console.log(data);
					}
				});
			});
</script>

<script>
		$('#searchmusic').click(function(e) {
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
						$("#music_favorites").empty();
						var html = '';
						if(data == '') {
							var count = 6;
							html += '<tr>';
							html += '<td colspan="'+count+'" style="text-align:center;">No record found!</td>';
							html += '<tr>';
						} else {
							$.each(data, function(key, value) {
								html += '<div class="blog-item-style-1 blog-item-style-3" style="width:800px; height:100px;">';
								html += '<img src="'+ value.image +'" alt="" style="width:150px;">';
								html += '<div class="blog-it-infor">';
								html += '<h3><a href= "/music-details/'+ value.id +'/'+ value.title +'">' + value.title + '</a></h3>';
								html += '<span class="time">' + value.Writer + '</span>';
								html += '<p>' + value.descrip + '</p>';
								html += '</div>';
								html += '<button type="button" class="btn btn-danger" btn-sm id="delete" data-id="'+value.id+'">';
								html += '<span class="glyphicon glyphicon-trash"></span>';
								html += '</button>';
						html += '</div>';
							})
						}
						$('#music_favorites').append(html);
					},
					error:function(data){
						console.log(data);
					}
				});
			});
</script>
<script>
// Delete Script
$(document).on('click', '#delete[data-id]', function(e) {

        var id =$(this).data('id');

        $.ajax({
            url: "{{ route('movie_delete') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                id:id
            },
            method:"post",
            dataType:"json",
            success:function(e){
                if(e.status == "OK")
                {
                    alert("Successfully deleted movie!");
                    location.reload();
                }
            },
            error:function(e){
                console.log(e);
            }
        });

			if (confirm("Successfully deleted!")) {
				txt = "You pressed OK!";
				location.reload();
			} else {
				txt = "You pressed Cancel!";
			}
	
    });

</script>

<script>
    // View specific movie details from api 
    $(document).on('click', '#view[data-id]', function() {
		var apikey = "bcdad87d"
		var movie = $(this).data('id');
		var result = ""

		var url = "http://www.omdbapi.com/?apikey=" + apikey


		$.ajax({
				method:'GET',
				url:url+"&t="+movie,
				success:function(data){
					console.log(data)


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
											<img src="${data.Poster}" alt="">
											<div class="movie-btn">	
												<div class="btn-transform transform-vertical red">
													<div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Watch Trailer</a></div>
													<div><a href="https://www.youtube.com/embed/o-0hcF97wy0" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
												</div>
												<div class="btn-transform transform-vertical">
													<div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i>Return</a></div>
													<div><a href=""{{ url('/user_fav') }} class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
													
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-md-8 col-sm-12 col-xs-12">
										<div class="movie-single-ct main-content">
											<h1 class="bd-hd">${data.Title}<span> ${data.Year}</span></h1>
											<div class="social-btn">
												
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
													<p><span>${data.imdbRating}</span> /10<br>
														<span class="rv">${data.imdbVotes} Votes</span>
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
																	<p>${data.Plot}</p>
																	<div class="title-hd-sm">
																		<h4>Writers</h4>
																		
																	</div>
																	<div class="mvcast-item">											
																		<div class="cast-it">
																			<div class="cast-left">
																				<a href="#">${data.Writer}</a>
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
																				<a href="#">${data.Actors}</a>
																			</div>
																			
																		</div>
																		
																	</div>
																	
																	<div class="title-hd-sm">
																		<h4>Awards</h4>											
																	</div>
																	<div class="mv-user-review-item">												
																		<p class="time">
																		${data.Awards}
																		</p>
																	</div>

																	<div class="title-hd-sm">
																		<h4>Productions</h4>											
																	</div>
																	<div class="mv-user-review-item">												
																		<p class="time">
																		${data.Production}
																		</p>
																	</div>
																	<div class="title-hd-sm">
																		<h4>Box Office</h4>											
																	</div>
																	<div class="mv-user-review-item">												
																		<p class="time">
																		${data.BoxOffice}
																		</p>
																	</div>
																</div>
																<div class="col-md-4 col-xs-12 col-sm-12">
																	<div class="sb-it">
																		<h6>Director: </h6>
																		<p><a href="#">${data.Director}</a></p>
																	</div>

																	<div class="sb-it">
																		<h6>Stars: </h6>
																		<p><a href="#">${data.Actors}</a></p>
																	</div>
																	<div class="sb-it">
																		<h6>Genres:</h6>
																		<p><a href="#">${data.Genre}</a></p>
																	</div>
																	<div class="sb-it">
																		<h6>Release Date:</h6>
																		<p>${data.Released}</p>
																	</div>
																	<div class="sb-it">
																		<h6>Run Time:</h6>
																		<p>${data.RunTime}</p>
																	</div>
																	<div class="sb-it">
																		<h6>MMPA Rating:</h6>
																		<p>${data.Rated}</p>
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
																	<div class="ads">
																		<img src="my_res/images/uploads/ads1.png" alt="">
																	</div>
																</div>
															</div>
														</div>



			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro" action="#">
					<form method="POST" action="{{ route('comment.store') }}">
					@csrf
					
						<h4>Review Form</h4>
						<div class="row">
						<input class="form-input" type="hidden" name="poster" value="${data.Poster}">
						<input class="form-input" type="hidden" name="movie" value="${data.Title}">
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
							<div class="col-md-6 form-it">
								<label>Comment</label>
								<textarea class="form-input" required="" name="comment" placeholder="Your comment" cols="10"></textarea>
							</div>

						</div>
						<div class="row">
							
						<p>Rate from 1-5 (each star is equal to 2)</p>
						<div class="post_ratings">
							<div class="form-group fl_icon">
								<div class="icon"><i class="fa fa-star"></i></div>
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
										</div>
										<!-- {{-- Form Close--}} -->
										</div>
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

					`;
					$("#result").html(result)
				}
			})
    });
</script>
</body>
							
							
	            		


<!-- userfavoritegrid13:49-->
</html>