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
					<!-- Authentication Links -->
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
			
			<form id = "tvForm" autocomplete = "off">
                
				<div class="form-group">
					<input class="form-control" type="text" id="tvshow" placeholder="Search for tv show that you are looking for">
				
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
					<h1>TV Show Recommendations</h1>
					<ul class="breadcumb">
						<li> <span class="ion-ios-arrow-right"></span> TV listing</li>
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
						<option value='Drama'>Drama</option> 
						<option value='Action'>Action</option> 
						<option value='Science-Fiction'>Sci-Fi</option> 
						<option value='Romance'>Romance</option> 
						<option value='Mystery'>Mystery</option> 
					</select>
					<a class="list"><i class="ion-ios-list-outline "></i></a>
					<a class="grid"><i class="ion-grid active"></i></a>
				</div>
			</div>
			<div class="flex-wrap-movielist grid-fav" style="padding-left:50px;" id="tv_recommend">
			</div>	
				<div class="topbar-filter">
					<label>TV shows per recommendation:</label>
					
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
	$('#tvsave').on('click', function() {
        alert('save')
    });
    });
</script>


<script>
   $(document).ready(function() {
        
        $.ajax({
            url: "{{ route('tv_recommend') }}",
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
                    html += '<div class="hvr-inner" style="color:red; >';
                    html += '<button type="button" onclick="topFunction()" class="btn btn-warning btn-sm" style="color:red; font-family: century gothic;" id="view" data-id="'+value.title+'"><a>Read more</a></button>';
                    html += '</div>';
                    html += '<div class="mv-item-infor">';
					
                    html += '<h6><a href="#">' + value.title + '</a></h6>';
                    html += '<p class="rate"><i class="ion-android-star"></i><span>' +  value.rate + '</span> /10</p>';
                    html += '</div>';
                    html += '</div>';
					
                })
                $('#tv_recommend').append(html);
            }   
        });

        
    });

</script>


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


<script>
		//function for filter recommendations based on genre
		$('#searchText').click(function(e) {
				e.preventDefault();
				var txt = $(this).val();
				
				//if esc is pressed or nothing is entered
				if(e.keyCode === 27) {
					$(this).val('');
				}

				$.ajax({
					url: "{{ route('show.search_tv') }}",
					headers: {
						'X-CSRF-TOKEN': "{{ csrf_token() }}"
					},
					data: {
						search: txt,
					},
					method:"post",
					dataType:"json",
					success:function(data){
						$("#tv_recommend").empty();
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
								html += '<div class="hvr-inner" style="color:red; >';
								html += '<button type="button" onclick="topFunction()" class="btn btn-warning btn-sm" style="color:red; font-family: century gothic;" id="view" data-id="'+value.title+'"><a>Read more</a></button>';
								html += '</div>';
								html += '<div class="mv-item-infor">';
								
								html += '<h6><a href="#">' + value.title + '</a></h6>';
								html += '<p class="rate"><i class="ion-android-star"></i><span>' +  value.rate + '</span> /10</p>';
								html += '</div>';
								html += '</div>';

							})
						}
						$('#tv_recommend').append(html);
					},
					error:function(data){
						console.log(data);
					}
				});
			});
</script>
<script>
  $(document).on('click', '#view[data-id]', function() {

			var apikey = "-PFKKxVwBszSRN_wIWkP0bjgPyvf_ShA"
			var yt_apikey = "AIzaSyAa6xpnMEGgVKAE_19hIiCZwo4C2AvnTJs"
			var tv = $(this).data('id');
			var result = ""
			var url = "http://api.tvmaze.com/singlesearch/shows?q=" 
			var tvdata
			var ytdata
			var ID = $("cPAbx5kgCJo").val()
			
			//SEARCH TV INFO FROM TV MAZE API
			$.ajax({
				method:'GET',
				async: false,
				url:url+tv,
				success:function(data){
					tvdata = data
				}
			})
			


			//SEARCH TRAILER OF THE MOVIE ON YT
			videoSearch(yt_apikey,tv,10)
			function videoSearch(key, tv, maxResults){
		
			$.ajax({
				method:'GET',
				async: false,
				url:"https://www.googleapis.com/youtube/v3/search?key=" + key + "&type=video&part=snippet&maxResults=" + maxResults + "&q=" + tv + "trailer",
				success:function(data){
					ytdata = data
				}
			})
			}


			console.log(tvdata)
			console.log(ytdata)
			result= `	
							<div class="hero sr-single-hero sr-single">
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
												<img src="${tvdata.image.original}" alt="">
												<div class="movie-btn">	
												
													<div class="btn-transform transform-vertical">
													<div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i>Return</a></div>
													<div><a href=""{{ url('/tvshows') }} class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
													
												</div>
												</div>
											</div>
										</div>
										<div class="col-md-8 col-sm-12 col-xs-12">
											<div class="movie-single-ct main-content">


											<form action="{{ route('tv_save') }}" id="tvform" method="POST">
												@csrf
												<input type="hidden" class="form-control" name="tv_fav" value="${tvdata.name}">
												<input type="hidden" class="form-control" name="tv_fav_genre" value="${tvdata.genres}">
												<input type="hidden" class="form-control" name="tv_fav_status" value="${tvdata.status}">
												<input type="hidden" class="form-control" name="tv_fav_rating" value="${tvdata.rating.average}">
												<input type="hidden" class="form-control" name="tv_fav_desc" value="${tvdata.summary}">
												<input type="hidden" class="form-control" name="tv_fav_writer" value="null">
												<input type="hidden" class="form-control" name="tv_fav_actors" value="null">
												<input type="hidden" class="form-control" name="tv_fav_prod" value="null">
								
												<input type="hidden" class="form-control" name="tv_fav_direc" value="null">
												<input type="hidden" class="form-control" name="tv_fav_year" value="${tvdata.premiered}">
												<input type="hidden" class="form-control" name="tv_fav_image" value="${tvdata.image.original}">
												<input type="hidden" class="form-control" name="tv_fav_video" value="http://www.youtube.com/embed/${ytdata.items[1].id.videoId}">
												<input type="hidden" class="form-control" name="tv_fav_type" value="tvshow">
											</form>

												<h1 class="bd-hd">${tvdata.name}<span> ${tvdata.language}</span></h1>
												<div class="social-btn">
												<a href="javascript:void(0)" onclick="$('#tvform').submit()" class="parent-btn" id="tvsave"><i class="ion-heart" ></i> Add to Favorite</a>
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
														<p><span>${tvdata.rating.average}</span> /10<br>
															<span class="rv">${tvdata.externals.thetvdb} Votes</span>
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
																		<p>${tvdata.summary}</p>
																		
																		<div class="mvsingle-item ov-item">
																			<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image11.jpg" ><img src="images/uploads/image1.jpg" alt=""></a>
																			<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image21.jpg" ><img src="images/uploads/image2.jpg" alt=""></a>
																			<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image31.jpg" ><img src="images/uploads/image3.jpg" alt=""></a>
																			<div class="vd-it">
																				<img class="vd-img" src="images/uploads/image4.jpg" alt="">
																				<a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
																			</div>
																		</div>
																		<div class="title-hd-sm">
																			<h4>Schedules</h4>
																			<a href="#" class="time">Additional Details  <i class="ion-ios-arrow-right"></i></a>
																		</div>
																		
																		<div class="mvcast-item">											
																			<div class="cast-it">
																				<div class="cast-left">
																					
																					<a >${tvdata.schedule.days}  ${tvdata.schedule.time}</a>
																				</div>
																				
																			</div>
																			
																		</div>
																		
																		<div class="title-hd-sm">
																			<h4>Status</h4>											
																		</div>
																		<div class="mv-user-review-item">												
																			<p class="time">
																			${tvdata.status}
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
																			<h6>Language: </h6>
																			<p><a href="#">${tvdata.language}</a> </p>
																		</div>
																		<div class="sb-it">
																			<h6>Type: </h6>
																			<p><a href="#">${tvdata.type}</a></p>
																		</div>
																		<div class="sb-it">
																			<h6>Genres:</h6>
																			<p><a href="#">${tvdata.genres}</a></p>
																		</div>
																		<div class="sb-it">
																			<h6>Release Date:</h6>
																			<p>${tvdata.premiered}</p>
																		</div>
																		<div class="sb-it">
																			<h6>Run Time:</h6>
																			<p>${tvdata.runtime}</p>
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

</body>

<!-- SCRIPT FOR SEARCH TV SHOW WITH TRAILER  -->
<script>
	$(document).ready(function(){

		var apikey = "-PFKKxVwBszSRN_wIWkP0bjgPyvf_ShA"
		var yt_apikey = "AIzaSyAa6xpnMEGgVKAE_19hIiCZwo4C2AvnTJs"
    	var video = ''

		$("#tvForm").submit(function(event){
			event.preventDefault()

			var tv = $("#tvshow").val()
			var result = ""
			var url = "http://api.tvmaze.com/singlesearch/shows?q=" 
			var tvdata
			var ytdata
			var ID = $("cPAbx5kgCJo").val()

			//SEARCH TV INFO FROM TV MAZE API
			$.ajax({
				method:'GET',
				async: false,
				url:url+tv,
				success:function(data){
					tvdata = data
				}
			})
			
			//SEARCH TRAILER OF THE MOVIE ON YT
			videoSearch(yt_apikey,tv,10)
			function videoSearch(key, tv, maxResults){
			$.ajax({
				method:'GET',
				async: false,
				url:"https://www.googleapis.com/youtube/v3/search?key=" + key + "&type=video&part=snippet&maxResults=" + maxResults + "&q=" + tv + "trailer",
				success:function(data){
					ytdata = data
				}
			})
			}


			console.log(tvdata)
			console.log(ytdata)
			$("#tv_recommend").empty()

			result= `	
							<div class="hero sr-single-hero sr-single">
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
												<img src="${tvdata.image.original}" alt="">
												<div class="movie-btn">	
													
													<div class="btn-transform transform-vertical">
													<div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i>Return</a></div>
													<div><a href=""{{ url('/tvshows') }} class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
													
												</div>
												</div>
											</div>
										</div>
										<div class="col-md-8 col-sm-12 col-xs-12">
											<div class="movie-single-ct main-content">


											<form action="{{ route('tv_save') }}" id="tvform" method="POST">
												@csrf
												<input type="hidden" class="form-control" name="tv_fav" value="${tvdata.name}">
												<input type="hidden" class="form-control" name="tv_fav_genre" value="${tvdata.genres}">
												<input type="hidden" class="form-control" name="tv_fav_status" value="${tvdata.status}">
												<input type="hidden" class="form-control" name="tv_fav_rating" value="${tvdata.rating.average}">
												<input type="hidden" class="form-control" name="tv_fav_desc" value="${tvdata.summary}">
												<input type="hidden" class="form-control" name="tv_fav_writer" value="null">
												<input type="hidden" class="form-control" name="tv_fav_actors" value="null">
												<input type="hidden" class="form-control" name="tv_fav_prod" value="null">
								
												<input type="hidden" class="form-control" name="tv_fav_direc" value="null">
												<input type="hidden" class="form-control" name="tv_fav_year" value="${tvdata.premiered}">
												<input type="hidden" class="form-control" name="tv_fav_image" value="${tvdata.image.original}">
												<input type="hidden" class="form-control" name="tv_fav_video" value="http://www.youtube.com/embed/${ytdata.items[1].id.videoId}">
												<input type="hidden" class="form-control" name="tv_fav_type" value="tvshow">
											</form>

												<h1 class="bd-hd">${tvdata.name}<span> ${tvdata.language}</span></h1>
												<div class="social-btn">
												<a href="javascript:void(0)" onclick="$('#tvform').submit()" class="parent-btn" id="tvsave"><i class="ion-heart" ></i> Add to Favorite</a>
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
														<p><span>${tvdata.rating.average}</span> /10<br>
															<span class="rv">${tvdata.externals.thetvdb} Votes</span>
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
																		<p>${tvdata.summary}</p>
																		
																		<div class="mvsingle-item ov-item">
																			<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image11.jpg" ><img src="images/uploads/image1.jpg" alt=""></a>
																			<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image21.jpg" ><img src="images/uploads/image2.jpg" alt=""></a>
																			<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image31.jpg" ><img src="images/uploads/image3.jpg" alt=""></a>
																			<div class="vd-it">
																				<img class="vd-img" src="images/uploads/image4.jpg" alt="">
																				<a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
																			</div>
																		</div>
																		<div class="title-hd-sm">
																			<h4>Schedules</h4>
																			<a href="#" class="time">Additional Details  <i class="ion-ios-arrow-right"></i></a>
																		</div>
																		
																		<div class="mvcast-item">											
																			<div class="cast-it">
																				<div class="cast-left">
																					
																					<a >${tvdata.schedule.days}  ${tvdata.schedule.time}</a>
																				</div>
																				
																			</div>
																			
																		</div>
																		
																		<div class="title-hd-sm">
																			<h4>Status</h4>											
																		</div>
																		<div class="mv-user-review-item">												
																			<p class="time">
																			${tvdata.status}
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
																			<h6>Language: </h6>
																			<p><a href="#">${tvdata.language}</a> </p>
																		</div>
																		<div class="sb-it">
																			<h6>Type: </h6>
																			<p><a href="#">${tvdata.type}</a></p>
																		</div>
																		<div class="sb-it">
																			<h6>Genres:</h6>
																			<p><a href="#">${tvdata.genres}</a></p>
																		</div>
																		<div class="sb-it">
																			<h6>Release Date:</h6>
																			<p>${tvdata.premiered}</p>
																		</div>
																		<div class="sb-it">
																			<h6>Run Time:</h6>
																			<p>${tvdata.runtime}</p>
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
</html>
