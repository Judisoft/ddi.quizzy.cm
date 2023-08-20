<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Quizzy Home</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16"> 
    
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
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
	.wrap {
		overflow-wrap: break-word;
		word-wrap: break-word;
		hyphens: auto;
		white-space: normal;
	}
	@media (max-width: 576px) { 
		.arrow {
			display: none;
		}
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
<section>
	<div class="container-fluid banner" style="background-color:#4267B2;">
		<div class="row">
			<div class="col-lg-12">
				<div class="wrap">
					<p class="text-center text-light my-3 px-3 fw-500">
                        Quizzes for the National Competitive Entrance Examination into Medical Schools are now available! 
                        <a href="{{ route('register') }}" class="fw-700" style="color:#EFEA5A;text-decoration:underline;">Register for FREE</a>
						<i class="icofont-close" style="position:absolute;top:20%;right:10px;"></i>
				   </p>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="theme-layout" style="overflow-x:hidden !important;">
	<div class="responsive-header">
		<div class="logo">
            <a href="{{ route('home') }}" class="px-2" style="font-family: 'Rowdies', sans-serif;color: #4267B2;font-size: 24px;">
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
				<a href="{{ route('home') }}" class="px-2" style="font-family: 'Rowdies', sans-serif;color: #fff;font-size: 24px;">
					<button style="font-family: 'Libre Baskerville', serif;height: 38px;width: 38px; padding: 1px;background-color: #4267B2; border:none;color:#fff;font-size: 24px;border-radius: 5px;">Q</button>
					Quizzy
				</a>
			</div>
			<ul>
				@if(Auth::check())
					<li><a href="{{ route('dashboard') }}" title="">Dashboard</a></li>
				@endif
				<li><a href="{{ route('medxam') }}" title="">Medxam <span class="badge badge-danger">New</span></a></li>
				<li><a href="{{ route('community') }}" title="">Community</a></li>
				<li><a href="{{ route('plans') }}" title="">Pricing</a></li>
				<li><a href="{{ route('contact') }}" title="">contact</a></li>
				<li><a href="{{ route('help') }}" title="">help center</a></li>
				@if(Auth::guest())
					<li><a href="{{route('register')}}" title=""> Sign Up</a></li>
					<li><a class="join-butn" href="{{route('login')}}" title=""><i class="icofont-lock"></i> Login</a></li>
				@endif
				<li><a href="#" title=""><img loading="lazy" src="images/flags/US.png" alt=""> En</a></li>
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
					<li><a href="{{ route('medxam') }}" title="">Medxam <span class="badge badge-danger">New</span></a></li>
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
					<a href="#" title=""><img loading="lazy" src="images/flags/US.png" height="14" width="14" alt=""> En</a>
				</ul>
			</li>
			
		</ul>
	</nav><!-- nav sidebar -->
	<section>
		<div class="gap overlap nogap mate-black low-opacity">
			<div class="bg-image" style="background-image: url(images/resources/index.svg)"></div>
			<div class="feature-meta">
				<h1>Engaging <span>Learners</span> through interactive quizzes</h1>
				<h3><span></span> quizzes</h3>
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
				<h1 class="text-center pb-5 px-5"><i class="icofont-quote-left px-2"></i> Quizzes are fun and help us remember important facts! <br> </h1>
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="info-sec">
							<i class="icofont-users-alt-3"></i>
							<div>
								<h6>Engage everyone</h6>
								<p>Free tools to teach and learn anything, on any device, in‑person or remotely.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="info-sec">
							<i class="icofont-ui-clock"></i>
							<div>
								<h6>Assessment and eLearning</h6>
								<p>Set a deadline so your students can take evaluation quizzes in time</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="info-sec">
							<i class="icofont-chart-bar-graph"></i>
							<div>
								<h6>Realtime Feedback</h6>
								<p>Instantly identify problem areas by participant, class, question, and more.</p>
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
							<h1>Getting started is <span style="color:#4267B2;text-decoration:underline;">FREE</span> and like ABC!</h1>
						</div>
					</div>
					<div class="col-lg-4 col-md-3 col-sm-3 pt-2">
						<h1 class="pb-2 text-secondary">A</h1>
						<figure><img loading="lazy" alt="" src="images/resources/quiz3.png" class="img-md loading="lazy"-md p-2 icon-bg"></figure>
						<h5>Create quiz questions</h5>
					</div>
					<div class="col-lg-4 col-md-3 col-sm-3 pt-2" data-aos="slide-up">
						<h1 class="pb-2 text-secondary">B</h1>
						<figure><img loading="lazy" alt="" src="images/resources/index2.png" class="img-md loading="lazy"-md p-2 icon-bg"></figure>
						<h5>Participants engage from any device</h5>
					</div>
					<div class="col-lg-4 col-md-3 col-sm-3 pt-2">
						<h1 class="pb-2 text-secondary">C</h1>
						<figure><img loading="lazy" alt="" src="images/resources/points.png" class="img-md loading="lazy"-md p-2 icon-bg"></figure>
						<h5>Get instant Feedback</h5>
					</div>
				</div>
				<div class="row remove-ext30 mt-5">
					<div class="col-lg-4 col-md-4 col-sm-4 mt-5">
						<h1 style="font-weight:900;">Explore Solutions</h1>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 mt-5">
						<figure><img loading="lazy" alt="" src="images/resources/arrow2.svg"></figure>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="d-flex flex-colum">
							<div class="p-2 mt-2">
								<div class="card-body br-10 shadow-index">
									<div class="d-flex justify-content-around">
										<div class="p-2"><figure class="br-10" style="background-color:#F2F2F2;padding:10px;"><img loading="lazy" alt="" src="images/resources/explore1.svg"></figure></div>
										<div class="pt-2">
											<h4>Student Training and Education &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
											<div class="p-2"><a href="#">Learn More <i class="icofont-stylish-right"></i></a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="p-2 mt-2">
							<div class="card-body br-10 shadow-index">
								<div class="d-flex justify-content-around">
									<div class="p-2"><figure class="br-10" style="background-color:#F2F2F2;padding:10px;"><img loading="lazy" alt="" src="images/resources/explore2.svg"></figure></div>
									<div class="pt-2">
										<h4>Institution and Community Engagement</h4>
										<div class="p-2"><a href="#">Learn More <i class="icofont-stylish-right"></i></a></div>
									</div>
								</div>
							</div>
						</div>
						<div class="p-2 mt-2">
							<div class="card-body br-10 shadow-index">
								<div class="d-flex justify-content-around">
									<div class="p-2"><figure class="br-10" style="background-color:#F2F2F2;padding:10px;"><img loading="lazy" alt="" src="images/resources/explore3.svg"></figure></div>
									<div class="pt-2">
										<h4>Educational Technology Advocacy</h4>
										<div class="p-2"><a href="#">Learn More <i class="icofont-stylish-right"></i></a></div>
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
					<div class="col-lg-7 col-md-7">
						<div class="verticle-center">
							<div class="measure">
								<h1>Make it stick with <span style="color:#4267B2;">motivating assessment and practice.</span></h1>
								<div class="text-center"><figure><img loading="lazy" src="images/resources/three-lines2.svg" alt=""></figure></div>
								<div class="d-flex flex-colum">
									<div class="p-2 mt-2">
										<div>
											<div class="d-flex justify-content-around">
												<div class="p-2"><figure><img loading="lazy" alt="" src="images/resources/practice1.svg"></figure></div>
												<div class="pt-2">
													<h4>For Every Learning Environment</h4>
													<div class="p-2">
														<p>Deliver student-paced activities to all devices, in and out of class.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="d-flex flex-colum">
									<div class="p-2 mt-2">
										<div>
											<div class="d-flex justify-content-around">
												<div class="p-2"><figure><img loading="lazy" alt="" src="images/resources/practice2.svg"></figure></div>
												<div class="pt-2">
													<h4>Real-Time Insights</h4>
													<div class="p-2">
														<p>Get live feedback when teachers (and students!) need it most.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>	
					</div>
					<div class="col-lg-5 col-md-5">
						<img loading="lazy" src="images/resources/result.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row m-auto" style="background-color:#212121;border-radius:10px;padding:5px;">
				<div class="title pt-3">
					<h4 class="text-light">Top uses</h4>
					<figure><img loading="lazy" alt="" src="images/resources/three-lines2.svg"></figure>
				</div>
				<div class="d-flex flex-row px-3">
					<div class="px-2"><figure><img loading="lazy" alt="" src="images/resources/check.svg" class="shadow-index"></figure></div>
					<div><p class="text-light">Formative assessment</p></div>
				</div>
				<div class="d-flex flex-row px-3">
					<div class="px-2"><figure><img loading="lazy" alt="" src="images/resources/check.svg" class="shadow-index"></figure></div>
					<div><p class="text-light">Summative assessment</p></div>
				</div>
				<div class="d-flex flex-row px-3">
					<div class="px-2"><figure><img loading="lazy" alt="" src="images/resources/check.svg" class="shadow-index"></figure></div>
					<div><p class="text-light">Homework</p></div>
				</div>
				<div class="d-flex flex-row px-3">
					<div class="px-2"><figure><img loading="lazy" alt="" src="images/resources/check.svg" class="shadow-index"></figure></div>
					<div><p class="text-light">Review</p></div>
				</div>
				<div class="d-flex flex-row px-3">
					<div class="px-2"><figure><img loading="lazy" alt="" src="images/resources/check.svg" class="shadow-index"></figure></div>
					<div><p class="text-light">Independent practice</p></div>
				</div>
				<div class="d-flex flex-row px-3">
					<div class="px-2"><figure><img loading="lazy" alt="" src="images/resources/check.svg" class="shadow-index"></figure></div>
					<div><p class="text-light">Group learning</p></div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-md-7">
						<div class="verticle-center">
							<div class="measure">
								<h1>Quizzy is suitable for use <span style="color:#4267B2;">across the  globe</span></h1>
								<div><figure><img loading="lazy" src="images/resources/three-lines2.svg" alt=""></figure></div>
								<div class="p-3">
									<div class="d-flex flex-row">
										<div class="p-2">
											<figure><img loading="lazy" src="images/resources/user_admin.jpg" height="120" width="120" alt="" style="border-radius:50%;border:3px solid #ccc;" ></figure>
										</div>
										<div class="p-2">
											<p class="">
												Quizy motivates students, increases confidence, and can help to establish a culture of learning and growing from mistakes
												<a href="#" class="text-primary">... read more </a>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
					<div class="col-lg-5 col-md-5">
						<img loading="lazy" src="images/resources/globe2.svg" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-5">
						<img loading="lazy" src="images/resources/interaction.svg" alt="">
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="verticle-center">
							<div class="measure">
								<div>
									<h6 style="font-weight:700;">ASSESSMENT AND PRACTICE</h6>
									<h1><span style="color:#4267B2;">Beyond </span>Multiple Choice</h1>
								</div>
								<div class="p-3">
									<div class="info-sec mt-2">
										<i class="icofont-question"></i>
										<div>
											<h5>Every question type</h5>
											<p style="font-size:14px;">Engage students with question types at every level of Bloom's taxonomy</p>
										</div>
									</div>
									<div class="info-sec mt-2">
										<i class="icofont-thunder-light"></i>
										<div>
											<h5>Powerful micro-motivators</h5>
											<p style="font-size:14px;">Use our micro-motivators for positive reinforcement</p>
										</div>
									</div>
									<div class="info-sec mt-2">
										<i class="icofont-badge"></i>
										<div>
											<h5>Low-stakes competition</h5>
											<p style="font-size:14px;">Students compete amongst themselves. This usually leads to an overal increase in performance</p>
										</div>
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
		<h1 class="text-center p-3" style="font-size:48px;">We've got ready-made <span style="color:#4267B2;">Quizzes</span> for you</h1>
		<div class="text-center"><figure><img loading="lazy" src="images/resources/three-lines2.svg" alt=""></figure></div>
		<div class="gap mate-black">
			<div class="bg-image" style="background-image: url(images/resources/profile-banner.jpg);"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="books-caro">
							<div class="book-post shadow-index">
								<figure><a href="#" title=""><img loading="lazy" src="images/resources/maths.png" alt=""></a></figure>
								<a href="#" title="" class="h3 text-light">Mathematics</a>
							</div>
							<div class="book-post shadow-index">
								<figure><a href="#" title=""><img loading="lazy" src="images/resources/chemistry.png" alt=""></a></figure>
								<a href="#" title="" class="h3 text-light">Chemistry</a>
							</div>
							<div class="book-post shadow-index">
								<figure><a href="#" title=""><img loading="lazy" src="images/resources/biology.png" alt=""></a></figure>
								<a href="#" title="" class="h3 text-light">Biology</a>
							</div>
							<div class="book-post shadow-index">
								<figure><a href="#" title=""><img loading="lazy" src="images/resources/physics.png" alt=""></a></figure>
								<a href="#" title="" class="h3 text-light">Physics</a>
							</div>
							<div class="book-post shadow-index">
								<figure><a href="#" title=""><img loading="lazy" src="images/resources/economics.png" alt=""></a></figure>
								<a href="#" title="" class="h3 text-light">Economics</a>
							</div>
							<div class="book-post shadow-index">
								<figure><a href="#" title=""><img loading="lazy" src="images/resources/eng.png" alt=""></a></figure>
								<a href="#" title="" class="h3 text-light">Language</a>
							</div>
							<div class="book-post shadow-index">
								<figure><a href="#" title=""><img loading="lazy" src="images/resources/newspaper.png" alt=""></a></figure>
								<a href="#" title="" class="h3 text-light">General Knowledge</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="gap no-bottom grey-bg nogap">
			<div class="container">
				<h1 class="text-center px-5"><i class="icofont-quote-left px-2"></i> Quizzy is for everyone<br> </h1>
			</div>
		</div>
	</section>
	<section>
		<div class="gap">
			<div class="container">
				<figure><img loading="lazy" src="images/resources/hat.svg" alt=""></figure>
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<img loading="lazy" src="images/resources/passion.svg" alt="">
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="verticle-center">
							<div class="measure right">
								<div><h1>Explore what drives your <span style="color: #4267B2;">passion</span></h1></div>
								<div>
									<p class="pt-4">
										<a href="#" title="">English Language and Arts</a>
										<a href="#" title="">Social Studies</a>
										<a href="#" title="">Sciences</a>
										<a href="#" title="">World Languages</a>
										<a href="#" title="">Creative Arts</a>
										<a href="#" title="">Computer Science and Skills</a>
										<a href="#" title="">Law</a>
										<a href="#" title="">Career and Technical Education</a>
										<a href="#" title="">Medecine</a>
										<a href="#" title="">Engineering</a>
										<div><a href="#" title="" class="main-btn">Explore More <span class="icofont-plus"></span></a></div>
									</p>
								</div>
							</div>	
						</div>
					</div>
					<figure><img loading="lazy" src="images/resources/hat.svg" alt=""></figure>
				</div>
			</div>
		</div>
	</section>
	
	<section>
		<div class="gap" style="background-color:#0e477b;">
			<div class="bg-image"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8" >
						<div class="welcome-parallax">
							<h2  class="text-left">Ready for meaningful engagement?</h2>
							<div class="text-left mt-5">
								<a href="{{ route('register') }}" title="" class="main-btn">GET STARTED FOR FREE <i class="icofont-swoosh-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="welcome-parallax">
							<figure><img loading="lazy" src="images/resources/experience.webp" alt=""></figure>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- parallax section -->
	<section>
		<div class="gap mt-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="title">
							<h1>Why you should be using <span style="color:#4267B2;text-decoration:underline;">Quizzy</span></h1>
							<figure><img loading="lazy" alt="" src="images/resources/three-lines2.svg"></figure>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2">
						<figure><img loading="lazy" alt="" src="images/resources/clock.svg" style="width:50px!important;height:50px!important;"></figure>
						<h5>Saves teachers <span style="color:#4267B2">over 4hrs/week in formative evaluation</span></h5>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1">
						<figure><img loading="lazy" alt="" src="images/resources/arrow3.svg" class="arrow"></figure>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2">
						<figure class="mt-5"><img loading="lazy" alt="" src="images/resources/memo.svg" style="height:100px;width:100px;"></figure>
						<h5>Improve test scores up to <span style="color: #4267B2">50%</span></h5>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2">
						<figure><img loading="lazy" alt="" src="images/resources/arrow4.svg" class="arrow"></figure>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2">
						<figure><img loading="lazy" alt="" src="images/resources/baloon.svg"></figure>
						<h5>Reduce test-taking anxiety</h5>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1">
						<figure><img loading="lazy" alt="" src="images/resources/arrow3.svg" class="arrow"></figure>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2">
						<figure class="mt-5"><img loading="lazy" src="images/resources/money.webp" alt=""></figure>
						<h5>Earn Money by creating quizzes</h5>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<img loading="lazy" src="{{ asset('images/resources/teacher.jpg') }}" class="rounded" alt="">
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="verticle-center">
							<div class="measure right">
								<div>
									<h1 class="p-3 mt-5" style="font-size:48px;cursive;color:#212121;">Quizzy is loved by <span style="color:#4267B2;">teachers</span> and <span style="color:#4267B2;">school admins</span></h1>
									<div class="ml-2 my-3"><a href="{{route('register')}}" title="" class="main-btn p-3 h4" data-ripple="">Amazing teachers use Quizzy, Join Now!</a></div>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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
											<figure><img loading="lazy" src="{{ asset('images/resources/team/jude.jpeg') }}" alt="Kum Jude Bama"></figure>
											<span><a href="#" title="">Kum J. Bama</a></span>
											<ins>Software Engineer</ins>
											<a href="#" title="" data-ripple=""><i class="icofont-twitter"></i> Say Hi on twitter</a>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-6">
										<div class="friendz">
											<figure><img loading="lazy" src="{{ asset('images/resources/team/berty.jpeg') }}" alt="" style="height:180px;"></figure>
											<span><a href="#" title="">Kisevi Berty</a></span>
											<ins>Biochemist</ins>
											<a href="#" title="" data-ripple=""><i class="icofont-twitter"></i> Say Hi on twitter</a>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-6">
										<div class="friendz">
											<figure><img loading="lazy" src="{{ asset('images/resources/team/ayako.jpeg') }}" alt="Ayako Endali"></figure>
											<span><a href="#" title="">Ayako Endaly</a></span>
											<ins>Process Engineer</ins>
											<a href="#" title="" data-ripple=""><i class="icofont-twitter"></i> Say Hi on twitter</a>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-6">
										<div class="friendz">
											<figure><img loading="lazy" src="{{ asset('images/resources/team/francis.jpg') }}" alt=""></figure>
											<span><a href="#" title="">Francis Y. Beri</a></span>
											<ins>Software Engineer</ins>
											<a href="#" title="" data-ripple=""><i class="icofont-twitter"></i> Say Hi on twitter</a>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-6">
										<div class="friendz">
											<figure><img loading="lazy" src="{{ asset('images/resources/team/godwill.jpg') }}" alt="Asangawa Godwill" style="height:150px;"></figure>
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
						<div class="text-center"><figure><img loading="lazy" src="images/resources/three-lines2.svg" alt=""></figure></div>
						<div class="newsletter-sec">
							<figure><img loading="lazy" src="images/news-icon.png" alt=""></figure>
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
	<div class="auto-popup">
		<div class="popup-innner">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<img loading="lazy" src="{{ asset('images/resources/search.png') }}" class="menu-img" alt="">
					</div>
					<div class="col-lg-8 col-md-6">
						<div class="verticle-center">
							<div class="popup-meta">
								<button class="canceled button outline-light float-right" type="button"><i class="icofont-close"></i></button>
								<div class="my-3">
									<h1 class="text-center"> Subscribe to our newsletter!</h1></h1>
								</div>
								<form action="{{ route('newsletter') }}" method="post" class="inquiry-about uk-margin">
									@csrf
									<input type="text" name="email" class="uk-input p-3 rounded-0" placeholder="Enter Email">
									<p><small class="text-danger text-center">@if($errors->has('email')) {{ $errors->first('email') }} @endif</small></p>
									<div class="text-center">
										<p class="p-3">Subscribe now for a 15% discount on all Quizzy subscriptions</p>
										<button type="submit" class="primary button btn-lg px-5 py-2">SUBSCRIBE</button>
									</div>
								</form>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- auto popup --> 
</div>
	<script src="https://unpkg.com/axios/dist/axios.min.js" defer></script>
	<script src="js/main.min.js" defer></script>
	<script src="js/counterup.min.js" defer></script>
	<script src="js/counterup-t-waypoint.js" defer></script>
	<script src="js/typed.js" defer></script>
	<script src="js/script.js" defer></script>
	<script>
		function fixedBanner() {
			document.getElementById("bannner").style.display = 'block';
		}
		
	  	document.querySelector(".icofont-close").addEventListener('click', () => {
			document.querySelector(".banner").style.display = 'none';
		})
	</script>
</body>	
</html>