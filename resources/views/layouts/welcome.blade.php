
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/movie.css">
    <script type="text/javascript" src="/js/movie.js"></script>
	

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <style>
		h3,h2{
			color: #ffffff;
			font-family: century gothic;
		}
	h3{
			
			font-size:15px;
			font-family: century gothic;
		}
		body{

		    background-color:#450909;
			font-family: century gothic;
		}

		.be-comment-block {
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

		.form-group.fl_icon .icon {
		    position: absolute;
		    top: 1px;
		    left: 16px;
		    width: 48px;
		    height: 48px;
		    background: #f6f6f7;
		    color: #b5b8c2;
		    text-align: center;
		    line-height: 50px;
		    -webkit-border-top-left-radius: 2px;
		    -webkit-border-bottom-left-radius: 2px;
		    -moz-border-radius-topleft: 2px;
		    -moz-border-radius-bottomleft: 2px;
		    border-top-left-radius: 2px;
		    border-bottom-left-radius: 2px;
		}

		.form-group .form-input {
		    font-size: 13px;
		    line-height: 50px;
		    font-weight: 400;
		    color: #b4b7c1;
		    width: 100%;
		    height: 50px;
		    padding-left: 20px;
		    padding-right: 20px;
		    border: 1px solid #edeff2;
		    border-radius: 3px;
		}

		.form-group.fl_icon .form-input {
		    padding-left: 70px;
		}

		.form-group textarea.form-input {
		    height: 150px;
		}
    </style>
</head>


<body>
		<div class="w3-main"; ">
		@yield('content')
		</div>
		
	</body>



