<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Register</title>

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

.body{
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	width: auto;
	height: auto;
	background-image: url('{{asset("/images/bg.jpg")}}');
	background-size: cover;
	z-index: 0;
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
	color: #5379fa !important;
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

.login input[type=email],.login input[type=text]{
	width: 100%;
	height: 30px;
	background: transparent;
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
	background: transparent;
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
	background-color: #fff;
	border: 1px solid #fff;
	color: #000 !important;
	cursor: pointer;
	opacity: 0.7;
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


.login input[type=email]:focus,.login input[type=text]:focus{
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
input{
	margin-top: 20px;
	display: block
}
strong{
	color: #f00;
	font-size: 16px
}
</style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Aymon<span>Backup System</span></div>
		</div>
		<div class="links">
			<a href="{{url('/login')}}">Login</a>
			<a href="{{url('/home')}}">Home</a>
		</div>
		<br>
		<div class="login" id="login">
			<form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="Name">
                                @if ($errors->has('name'))
                                        <strong>{{ $errors->first('name') }}</strong>
                                @endif

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">
                                @if ($errors->has('email'))
                                        <strong>{{ $errors->first('email') }}</strong>
                                @endif

                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                                @if ($errors->has('password'))
                                        <strong>{{ $errors->first('password') }}</strong>
                                @endif

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">

                                <input type="submit" class="btn btn-primary" value="Register">

                    </form>
		</div>
</body>

</html>