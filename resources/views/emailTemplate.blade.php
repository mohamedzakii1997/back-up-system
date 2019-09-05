<body>
	<h1 style="text-align: center">AZM Back Up System</h1>
	<p>
		We Notice That Someone Tried To Login With Your Account So we Blocked You Account. <br>
		If This One Is You Please Enter The Next Url To UnBlock Your Account Again <br>
		Else Please change Your Password As Fast As Possible and Your Code Is {{$token}}
	</p>
	<a href="{{url('/home?token='.$token)}}">UnBlock My Account</a>
</body>