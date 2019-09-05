<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login</title>

    <style>
@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;
	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	width: auto;
	height: auto;
	background-image: url('{{asset("/images/login.jpg")}}');
	background-size: cover;
	z-index: 0;
}
.links{
	position: absolute;
    top: 15px;
    right: 24px;
    font-size: 18px
}
.links a{
	color: rgba(255,255,255,0.6) !important;
	text-decoration: none;
	margin-left: 20px
}

.grad{
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	width: auto;
	height: auto;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(38% - 255px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #000 !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}
.forgot:hover{
	text-decoration: underline !important;
}

.login input[type=email]{
	width: 100%;
	height: 30px;
	background: rgba(0,0,0,0.5);
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 100%;
	height: 30px;
	background: rgba(0,0,0,0.5);
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=submit]{
	width: 360px;
	height: 35px;
	opacity: 0.7;
	background-color: #fff;
	border: 1px solid #fff;
	color: #000 !important;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=submit]:hover{
	opacity: 0.5;
	background-color:#060606;
	color: #fff !important
}


.login input[type=email]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
</style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="links">
			<a href="{{url('/register')}}">Register</a>
			<a href="{{url('/home')}}">Home</a>
		</div>
		<div class="header">
			<div>Aymon<span>Backup System</span></div>
		</div>
		<br>
		<div class="login" id="login">
			<form method="POST" action="{{url('/login')}}">
				{{csrf_field()}}
				<input type="email" placeholder="Email" name="email"><br>
				<input type="password" placeholder="Password" name="password" autocomplete="new-password"><br>
				<input type="checkbox" name="remember" style="margin-top: 16px;"><label style="color: rgba(255,255,255,0.6);font-size: 16px"> Remember Me</label> <br>
				<input type="submit" value="Login"><br> 
				<a class="forgot" href="{{ route('password.request') }}" style="display:block;text-align: center;color: rgba(255,255,255,0.6);font-size: 16px;margin-top: 10px;text-decoration: none;font-weight: bold">
                                    Forgot Your Password?
				</a>
				@if($errors->any())
					@if($errors->has('message'))
						<strong style="color:#f00;display: block;margin-top: 10px;font-size: 18px;text-align:center">{{$errors->first('message')}}</strong> 
					@else
						<strong style="color:#f00;display: block;margin-top: 10px;font-size: 18px;text-align:center">Pleade Enter Valid Username And Password</strong> 
					@endif
				@endif
			</form>
		</div>
</body>

</html>