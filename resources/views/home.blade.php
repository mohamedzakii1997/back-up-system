@extends('layouts.frontend')
@section('alt')
		class="alt"
	@endsection
	@section('extraStyle')
		#header{
		position:fixed
	}
	.gallery img{
	height:400px
}
	@endsection
	@section('title')
		Home
	@endsection
@section('content')
			<section class="banner full">
				<article>
					<img src="images/slide01.jpg" alt="" />
					<div class="inner">
						<header>
							<p>Welcome With You New <a href="#">Family</a></p>
							<h2>Welcome</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide02.jpg" alt="" />
					<div class="inner">
						<header>
							<p>We Guarantee You That Your Files Are Secured</p>
							<h2>100% Security</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide03.jpeg"  alt="" />
					<div class="inner">
						<header>
							<p>With Us You Can Save Your Images, Videos, Audios And Documents</p>
							<h2>Your Repository</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide04.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>Usage Of Our System For Free. That For Let You Happy</p>
							<h2>Happinees</h2>
						</header>
					</div>
				</article>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style2">
				<div class="inner">
					<div class="grid-style">

						<div>
							<div class="box">
								<div class="image fit">
									<img src="images/help.jpg" alt=""  height="300px" />
								</div>
								<div class="content">
									<header class="align-center">
										<p>Our Service Is Fully Built ON Donations</p>
										<h2>Donation</h2>
									</header>
									<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
									</p>
								</div>
							</div>
						</div>

						<div>
							<div class="box">
								<div class="image fit">
									<img src="images/rule.jpg" alt="" height="300px" />
								</div>
								<div class="content">
									<header class="align-center">
										<p>You Have To Follow Rules To Get All Your Rights</p>
										<h2>Rule List</h2>
									</header>
									<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>Remember Again. When You Join Us You Join Your New Family</p>
						<a href="{{url('/register')}}" style="font-size: 25px;color: #fff !important">Get Started</a>
					</header>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="wrapper style2">
				<div class="inner">
					<header class="align-center">
						<p class="special">Our System is Developed By High Quality Develoeprs With A lot of Experience</p>
						<h2>Developer Team</h2>
					</header>
					<div class="gallery">
						<div>
							<div class="image fit">
								<a href="#"><img src="images/pic01.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="images/pic02.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="images/pic03.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="images/pic04.jpg" alt="" /></a>
							</div>
						</div>
					</div>
				</div>
			</section>


		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
					</ul>
				</div>
				<div class="copyright">
					&copy; Untitled. All rights reserved.
				</div>
			</footer>
@endsection