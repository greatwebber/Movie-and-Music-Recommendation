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

@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css);
.card .card-image{
    overflow: hidden;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    -o-transform-style: preserve-3d;
    transform-style: preserve-3d;
}


.card{
    margin-top: 10px;
    position: relative;
    -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  -moz-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  box-shadow: 4 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
}

.card .card-content {
    padding: 10px;    
}

.card .card-content .card-title, .card-reveal .card-title{
    font-size: 24px;
    font-weight: 200;    
}

.card .card-action{
    padding: 20px;
    border-top: 1px solid rgba(160, 160, 160, 0.2);
}
.card .card-action a{
    font-size: 15px;
    color: #ffab40;
    text-transform:uppercase;
    margin-right: 20px;    
    -webkit-transition: color 0.3s ease;
    -moz-transition: color 0.3s ease;
    -o-transition: color 0.3s ease;
    -ms-transition: color 0.3s ease;
    transition: color 0.3s ease;
}
.card .card-action a:hover{    
    color:#ffd8a6;
    text-decoration:none;
}

.card .card-reveal{    
    padding: 20px;
    position: absolute;
    background-color: #FFF;
    width: 100%;
    overflow-y: auto;
    /*top: 0;*/
    left:0;
    bottom:0;a
    height: 100%;
    z-index: 1;
    display: none;    
}

.card .card-reveal p{
    color: rgba(0, 0, 0, 0.71);
    margin:20px ;
}

.btn-custom{
    background-color: transparent;
    font-size:18px;
}

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
			
			<form id = "ytForm" autocomplete = "off">
				<div class="form-group">
					<input class="form-control" type="text" id="video_title" placeholder="Search anything that you are looking for">
				</div>
				<div>
				</div>
			</form>
		</div>
	</div>
</header>
<!-- END | Header -->
<!-- <div id="result">
						
</div> -->

<div class="hero common-hero" style="height:120px;">
	
</div>
<div class="page-single">
	<div class="container">
		<div class="row">
			<div class="container">
				<div class="row" id="videos" >  
				</div> 
			</div>

			</div>	
				<div class="topbar-filter">
					<label>Youtube per recommendation:</label>
					
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
$(document).ready(function(){

var API_KEY = "AIzaSyAa6xpnMEGgVKAE_19hIiCZwo4C2AvnTJs"
var video = ''


$("#ytForm").submit(function (event){
	event.preventDefault()
	// alert("form is submitted")
	var search = $("#video_title").val()
	var ID = $("cPAbx5kgCJo").val()

	videoSearch(API_KEY,search,10)
	// videoView('cPAbx5kgCJo',API_KEY,10)
})

function videoSearch(key, search, maxResults){

	$("#videos").empty()

	$.get("https://www.googleapis.com/youtube/v3/search?key=" + key + "&type=video&part=snippet&maxResults=" + maxResults + "&q=" + search,function(data){
		console.log(data)
		data.items.forEach(item => {
			video = `


			<div class="col-md-6 " style="padding-left:50px; padding-bottom:50px; ">
								<div class="card" style="background:#021e30; color:white;">
									<div class="card-image">
										<div class="embed-responsive embed-responsive-16by9">
									<iframe width="560" height="315" src="http://www.youtube.com/embed/${item.id.videoId}" frameborder="0" allowfullscreen></iframe>
									</div>									
									</div>								
									<div class="card-content">
										<span class="card-title" style="font-size:12px;">${item.snippet.title}</span>   
										<br> 
										<span style="font-size:12px;"> ${item.snippet.channelTitle}  </span><br>  
                    					<span style="font-size:12px;"> ${item.snippet.publishedAt}  </span><br>        
									   									
									</div>
								</div>
							</div>

			`
			$("#videos").append(video)
		})
	})
}
})
</script>


<script>
             $(document).ready(function(){

                var API_KEY = "AIzaSyA3L06zZ5eM3To-BOF5Q9HcSu5eLisKt_s"
                var video = ''

                    $.get("https://www.googleapis.com/youtube/v3/videos?part=snippet&chart=mostPopular&regionCode=IN&maxResults=8&key=" + API_KEY,function(data){

                        console.log(data)
                        data.items.forEach(item => {
                            video = `
                            <div class="col-md-6 " style="padding-left:50px; padding-bottom:50px; ">
								<div class="card" style="background:#021e30; color:white;">
									<div class="card-image">
										<div class="embed-responsive embed-responsive-16by9">
									<iframe width="560" height="315" src="http://www.youtube.com/embed/${item.id}" frameborder="0" allowfullscreen></iframe>
									</div>									
									</div>								
									<div class="card-content">
										<span class="card-title" style="font-size:12px;">${item.snippet.title}</span>   
										<br> 
										<span style="font-size:12px;"> ${item.snippet.channelTitle}  </span><br>  
                    					<span style="font-size:12px;"> ${item.snippet.publishedAt}  </span>      
								             									
									</div>
								</div>
							</div>
                            `
                            $("#videos").append(video)
                        })
                    })
                        
                   
            })
        </script>

<!-- moviegridfw07:38-->
</html>