
<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
		<style type="text/css">
			.container{
				margin-top: 20px;
			}
			#header{
				position: static;
			}
			.btn-primary{
				background-color: #060606
			}
			.btn-primary:hover{
				background-color: #2d3436
			}
			@yield('extraStyle')
		</style>
	</head>
	<body>

		<!-- Header -->
			<header id="header" @yield('alt')>
				<div class="logo"><a href="{{url('/')}}">AZM<span> Backup System</span></a></div>
				@if(auth()->check())
					<a href="{{ route('logout') }}"
	                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
	                        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
	                    </a>
	                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                        {{ csrf_field() }}
	                    </form>
				@else
				<a href="{{url('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
				<a href="{{route('register')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
				@endif
				<a href="#menu">Menu</a>
			</header>
			@if($errors->any())
				<div class="alert alert-danger">
					@foreach($errors->all() as $error)
						{{$error}}<br>
					@endforeach
				</div>
			@endif
			@if(session()->has('message'))
				<div class="alert alert-success">
					{{session()->get('message')}}
				</div>
			@endif
			@if(session()->has('warning'))
				<div class="alert alert-warning">
					{{session()->get('warning')}}
				</div>
			@endif
			@if(session()->has('custom-error'))
				<div class="alert alert-danger">
					{{session()->get('custom-error')}}
				</div>
			@endif
			@if(session()->has('block'))
				<script type="text/javascript">window.alert('{{session()->get("block")}}')</script>
			@endif

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="{{url('/')}}">Home</a></li>
					@if(auth()->check()&&auth()->user()->role)
						<li><a href="{{url('/controll')}}">Controll Panel</a></li>
					@endif
					@if(auth()->check())
						<li><a href="{{url('/editProfile')}}">Profile</a></li>
						<li><a href="{{url('/editPassword')}}">Change Password</a></li>
						<li><a href="{{url('/videos')}}">My Videos</a></li>
						<li><a href="{{url('/getImages')}}">My Images</a></li>
						<li><a href="{{url('/audios')}}">My Audios</a></li>
						<li><a href="{{url('/documents')}}">My Documents</a></li>
					@endif
				</ul>
			</nav>

		<!-- Banner -->
		@yield('content')
		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.scrollex.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
		<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

	</body>
</html>