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


<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1> All Users Reviews</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Rated movies and Tv Shows</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="user-information">
					<div class="user-img">
						<a href="#"><img src="user/{{ Auth::user()->image }}" alt=""><br></a>
						
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
                        <div id="reviews">
						
                        </div>

				
				<div class="topbar-filter">
					<label>Movies per page:</label>
	
					<div class="pagination2">
						<span>Page 1 of 1:</span>
						<a class="active" href="#">1</a>
						<a href="#"><i class="ion-arrow-right-b"></i></a>
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
            url: "{{ route('my_reviews') }}",
            headers: {
                      'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            method:"post",
            dataType:"json",
            success:function(e){
				
                var html = '';
                $.each(e, function(key, value) {
                    html += ' <div class="movie-item-style-2 userrate">';
                    html += '<img src="'+ value.image+'" alt="">';
                    html += '<div class="mv-item-infor">';
                    html += '<h6><a href="#">'+ value.title +'</a></h6>';
                    html += '<p class="time sm-text"> '+ value.name +'</p>';
					html += '<p class="time sm-text">your rate:</p>';
                    html += '<p class="rate"><i class="ion-android-star"></i><span>'+ value.rate + '</span> /10</p>';
                    html += '<p class="time sm-text">your reviews:</p>';
                    html += '<p class="time sm">'+ value.created_at +'</p>';
                    html += '<p>“'+ value.comment +'”</p>		';
                    html += '</div>';
                    html += '</div>';
                })
                $('#reviews').append(html);
            }   
        });
			
	    			
    });

</script>
</body>

<!-- userrate14:04-->
</html>