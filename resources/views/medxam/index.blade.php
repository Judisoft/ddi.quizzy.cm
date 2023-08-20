<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Quizzy - Medxam</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16"> 
    
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Pacifico&display=swap');
		@import url('https://fonts.googleapis.com/css2?family=DynaPuff:wght@300&family=Josefin+Sans:wght@700&family=Libre+Baskerville:wght@700&family=Pacifico&family=Rowdies:wght@300&display=swap');
	</style>
</head>
<style>
	h1 {
		font-weight:700;
	}
	.title > h1 {
		font-weight: 700;
	}
</style>
<body>
<div class="page-loader" id="page-loader">
	<div class="preloader-logo">
		<a href="{{ route('home') }}" class="px-2" style="font-family: 'Rowdies', sans-serif;color: #ffffff;font-size: 24px;">
			<button style="font-family: 'Libre Baskerville', serif;height: 38px;width: 38px; padding: 1px;background-color: #fff; border:none;color:#4267B2;font-size: 24px;border-radius: 5px;">Q</button>
		</a>
	</div>
<div class="loader">
	<span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span></div>
</div><!-- page loader -->
<div class="theme-layout" style="overflow-x:hidden !important;">
	<div class="responsive-header">
		<div class="logo">
            <a href="{{ route('medxam') }}" class="px-2" style="font-family: 'Rowdies', sans-serif;color: #4267B2;font-size: 24px;">
				<button style="font-family: 'Libre Baskerville', serif;height: 38px;width: 38px; padding: 1px;background-color: #4267B2; border:none;color:#fff;font-size: 24px;border-radius: 5px;">Q</button>
                Quizzy 
			</a>
		</div>
		<div class="right-compact">
			<div class="sidemenu">
				<i><svg id="side-menu2" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></i>
			</div>
			<div class="res-search">
				@if(Auth::guest())
					<a href="{{route('login')}}"><span><svg id="ab1" class="feather feather-users" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="26" width="26" xmlns="http://www.w3.org/2000/svg"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle r="4" cy="7" cx="9"/></svg></span></a>
				@else
					<a href="{{route('dashboard')}}"><span><svg id="ab1" class="feather feather-users" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="26" width="26" xmlns="http://www.w3.org/2000/svg"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle r="4" cy="7" cx="9"/></svg></span></a>
				@endif
			</div>
			
		</div>
	</div><!-- responsive header -->
	
	<header class="transparent">
		<div class="topbar">
			<div class="logo">
				<a href="{{ route('medxam') }}" class="px-2" style="font-family: 'Rowdies', sans-serif;color: #fff;font-size: 24px;">
					<button style="font-family: 'Libre Baskerville', serif;height: 38px;width: 38px; padding: 1px;background-color: #4267B2; border:none;color:#fff;font-size: 24px;border-radius: 5px;">Q</button>
                    Quizzy 
				</a>
			</div>
			<ul>
				@if(Auth::check())
					<li><a href="{{ route('dashboard') }}" title="">Dashboard</a></li>
				@endif
				<li><a href="{{ route('community') }}" title="">Community</a></li>
				<li><a href="{{ route('plans') }}" title="">Pricing</a></li>
				<li><a href="{{ route('contact') }}" title="">contact</a></li>
				<li><a href="{{ route('help') }}" title="">help center</a></li>
				@if(Auth::guest())
					<li><a href="{{route('register')}}" title=""> Sign Up</a></li>
					<li><a class="join-butn" href="{{route('login')}}" title=""><i class="icofont-lock"></i> Login</a></li>
				@endif
				<li><a href="#" title=""><img src="images/flags/US.png" alt=""> En</a></li>
			</ul>
		</div>
	</header>
	<nav class="sidebar">
		<ul class="menu-slide">
			<li class="active menu-item-has-children">
				<a class="" href="{{ route('home') }}" title="">
					<i><svg id="icon-home" class="feather feather-home" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></i> Home
				</a>
				<ul class="submenu">
					@if(Auth::check()) <li><a href="{{ route('dashboard') }}" title="">Dashboard</a></li> @endif
					<li><a href="#" title="">Community</a></li>
				</ul>
			</li>
			<li class="menu-item-has-children">
				<a class="" href="#" title="">
					 <i class="">
					<svg id="ab5" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg></i> Products
				</a>
				<ul class="submenu">
					<li><a href="{{ route('medxam') }}" title="">Medxam</a></li>
				</ul>
			</li>
			<li class="menu-item-has-children">
				<a class="" href="#" title="">
					<svg id="ab4" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></i> Support
				</a>
				<ul class="submenu">
					<li><a href="{{ route('contact') }}" title="">Contact</a></li>
					<li><a href="{{ route('help') }}" title="">Help</a></li>
				</ul>
			</li>
			@if(Auth::guest())
				<li class="">
					<a class="" href="{{ route('register') }}" title="">
						<i><svg id="ab1" class="feather feather-users" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle r="4" cy="7" cx="9"/></svg></i>
						Register
					</a>
				</li>
				<li class="">
					<a class="" href="{{ route('login') }}" title="">
						<i class="">
						<svg id="ab9" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></i> 
						Login
					</a>
				</li>
			@endif
			<li class="">
				<a class="#" href="{{ route('plans') }}" title="">
					<i class="">
					<svg id="team" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg></i> Plans
				</a>
			</li>
			<li class="menu-item-has-children">
				<a class="" href="messages.html" title="">
					<i class="">
					<svg class="feather feather-message-square" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg" id="ab2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" style="stroke-dasharray: 68, 88; stroke-dashoffset: 0;"/></svg></i> Language
				</a>
				<ul class="submenu">
					<a href="#" title=""><img src="images/flags/US.png" height="14" width="14" alt=""> En</a>
				</ul>
			</li>
			
		</ul>
	</nav><!-- nav sidebar -->
	<section>
		<div class="gap overlap nogap mate-black high-opacity">
			<div class="bg-image" style="background-image: url(images/resources/index2.svg)"></div>
			<div class="feature-meta">
				<h1>Prepare Better with <span>Medxam</span></h1>
                <h3>Access over 2000+ questions and quizzes</h3>
				<a href="{{route('register')}}" title="" class="main-btn" data-ripple="">Get started for FREE!</a>
			</div>
		</div>	
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="mx-auto mt-2">
						@if(Session::has('error'))
						<div class="notification-box">
							<ul>
								<li>
									<p class="text-danger text-center py-4 p-2 rounded" style="border:1px solid rgb(248 113 113);background-color:rgb(254 226 226);">
										{{ Session::get('error') }}
									</p>
									<i class="del icofont-close pt-4 text-danger" title="Remove"></i>
								</li>
							</ul>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="gap no-bottom grey-bg nogap">
			<div class="container">
				<h1 class="text-center pb-5 px-5"><i class="icofont-quote-left px-2"></i> Master every concept with interactive quizzes<br></h1>
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="info-sec">
							<i class="icofont-question"></i>
							<div>
								<h6>2000+ past questions</h6>
								<p>Access thousands of past questions in interactive mode</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="info-sec">
							<i class="icofont-ui-clock"></i>
							<div>
								<h6>Take timed quizzes</h6>
								<p>All quizzies are strictly timed following the Exam standard</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="info-sec">
							<i class="icofont-chart-bar-graph"></i>
							<div>
								<h6>Weekly Competition</h6>
								<p>Compete with thousands of other candidates every week</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		@if(Session::has('success'))
			<p class="alert alert-info">{{ Session('success') }}</p>
		@endif
		@if(Session::has('error'))
			<p class="alert alert-danger">{{ Session('error') }}</p>
		@endif
	</section>
    <section>
		<div class="gap mt-5">
			<div class="container">
				<div class="row remove-ext30 text-center" style="border-radius:5px;">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="title">
							<h1 class="text-center pb-5 px-5">Top <span style="color:#4267B2;text-decoration:underline;">use cases</span></h1>
						</div>
					</div>
					<div class="col-lg-4 col-md-3 col-sm-3 pt-2" data-aos="fade-right">
						<h1 class="pb-2 text-secondary">1.</h1>
						<figure><img alt="" src="images/resources/grades.png" class="border img-md p-2 icon-bg"></figure>
						<h5>Instructor Prepared Quizzes</h5>
					</div>
					<div class="col-lg-4 col-md-3 col-sm-3 pt-2" data-aos="slide-up">
						<h1 class="pb-2 text-secondary">2.</h1>
						<figure><img alt="" src="images/resources/quest.png" class="border img-md p-2 icon-bg"></figure>
						<h5>Auto Generate Quizzes</h5>
					</div>
					<div class="col-lg-4 col-md-3 col-sm-3 pt-2" data-aos="fade-left">
						<h1 class="pb-2 text-secondary">3.</h1>
						<figure><img alt="" src="images/resources/podium.png" class="border img-md p-2 icon-bg"></figure>
						<h5>Weekly Competitions</h5>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="gap mate-black high-opacity">
			<div class="bg-image" style="background-image: url(images/resources/front-view-medical-control-covid19-concept.jpg);"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="books-caro">
							<div class="book-post shadow-index">
								<figure><a href="#" title=""><img src="images/resources/chemistry.png" alt=""></a></figure>
								<a href="#" title="" class="h3 text-light">Chemistry</a>
							</div>
							<div class="book-post shadow-index">
								<figure><a href="#" title=""><img src="images/resources/biology.png" alt=""></a></figure>
								<a href="#" title="" class="h3 text-light">Biology</a>
							</div>
							<div class="book-post shadow-index">
								<figure><a href="#" title=""><img src="images/resources/physics.png" alt=""></a></figure>
								<a href="#" title="" class="h3 text-light">Physics</a>
							</div>
                            <div class="book-post shadow-index">
								<figure><a href="#" title=""><img src="images/resources/eng.png" alt=""></a></figure>
								<a href="#" title="" class="h3 text-light">Language</a>
							</div>
							<div class="book-post shadow-index">
								<figure><a href="#" title=""><img src="images/resources/newspaper.png" alt=""></a></figure>
								<a href="#" title="" class="h3 text-light">General Knowledge</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6" data-aos="fade-right">
						<img src="{{ asset('images/resources/passion.jpeg') }}" class="rounded" alt="">
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="verticle-center">
							<div class="measure right">
								<div data-aos="fade-left"><h1>Explore what drives your <span style="color: #4267B2;">passion</span></h1></div>
								<div data-aos="zoom-in">
									<p class="pt-4">
										<a href="#" title="">Anatomy</a>
										<a href="#" title="">Physiology</a>
										<a href="#" title="">Internal Medecine</a>
										<a href="#" title="">Pharmacy</a>
										<a href="#" title="">Dentistry</a>
										<a href="#" title="">Gynaecology</a>
										<a href="#" title="">Surgery</a>
										<a href="#" title="">Public Health</a>
										<a href="#" title="">Laboratory Technology</a>
										<a href="#" title="">Pediatrics</a>
										<div data-aos="flip-right"><a href="#" title="" class="main-btn">Explore More <span class="icofont-plus"></span></a></div>
									</p>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section>
		<div class="gap" style="background-color:#0e477b;">
			<div class="bg-image"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6" >
						<div class="welcome-parallax" data-aos="fade-right">
							<h2  class="text-left">Ready for meaningful engagement? <br>
                                Success is guaranteed with Quizzy
                            </h2>
							<div class="text-left mt-5">
								<a href="{{ route('register') }}" title="" class="main-btn">GET STARTED FOR FREE <i class="icofont-swoosh-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="welcome-parallax" data-aos="zoom-in">
							<figure><img src="images/resources/experience.webp" alt=""></figure>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- parallax section -->
	<section>
		<div class="gap no-top mt-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="title">
							<h1>Meet Our Amazing Team!</h1>
							<p>We embrace diversity to serve better.</p>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="row merged20">
							<div class="friends" >
								<div class="row merged-10 col-xs-6">
									<div class="col-lg-4 col-md-4 col-sm-6">
										<div class="friendz">
											<figure><img src="{{ asset('images/resources/team/jude.jpeg') }}" alt="Kum Jude Bama"></figure>
											<span><a href="#" title="">Kum J. Bama</a></span>
											<ins>Software Engineer</ins>
											<a href="#" title="" data-ripple=""><i class="icofont-twitter"></i> Say Hi on twitter</a>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-6">
										<div class="friendz">
											<figure><img src="{{ asset('images/resources/team/berty.jpeg') }}" alt="" style="height:180px;"></figure>
											<span><a href="#" title="">Kisevi Berty</a></span>
											<ins>Biochemist</ins>
											<a href="#" title="" data-ripple=""><i class="icofont-twitter"></i> Say Hi on twitter</a>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-6">
										<div class="friendz">
											<figure><img src="{{ asset('images/resources/team/ayako.jpeg') }}" alt="Ayako Endali"></figure>
											<span><a href="#" title="">Ayako Endaly</a></span>
											<ins>Process Engineer</ins>
											<a href="#" title="" data-ripple=""><i class="icofont-twitter"></i> Say Hi on twitter</a>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-6">
										<div class="friendz">
											<figure><img src="{{ asset('images/resources/team/francis.jpg') }}" alt=""></figure>
											<span><a href="#" title="">Francis Y. Beri</a></span>
											<ins>Software Engineer</ins>
											<a href="#" title="" data-ripple=""><i class="icofont-twitter"></i> Say Hi on twitter</a>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-6">
										<div class="friendz">
											<figure><img src="{{ asset('images/resources/team/godwill.jpg') }}" alt="Asangawa Godwill" style="height:150px;"></figure>
											<span><a href="#" title="">Asangawa Godwill</a></span>
											<ins>Civil Engineer</ins>
											<a href="#" title="" data-ripple=""><i class="icofont-twitter"></i> Say Hi on twitter</a>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="sp sp-bars"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="text-center">Sign Up for our Newsletter Now!</h1>
						<div class="text-center"><figure><img src="images/resources/three-lines2.svg" alt=""></figure></div>
						<div class="newsletter-sec">
							<figure><img src="images/news-icon.png" alt=""></figure>
							<div class="leter-meta">
								<span>Be the first to hear from us</span>
								<h3>subscribe now!</h3>
							</div>	
							<form action="{{ route('newsletter') }}" method="post">
								@csrf
								<input type="email" name="email" placeholder="e.g johndoe@example.com" value="{{ old('email') }}">
								<button type="submit"  class="main-btn"><i class="icofont-paper-plane"></i></button>
								<p><small class="text-danger text-center">@if($errors->has('email')) {{ $errors->first('email') }} @endif</small></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@include('layouts.frontend.footer')
</div>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="js/main.min.js"></script>
	<script src="js/counterup.min.js"></script>
	<script src="js/counterup-t-waypoint.js"></script>
	<script src="js/typed.js"></script>
	<script src="js/script.js"></script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
	  	AOS.init();
	</script>
</body>	
</html>