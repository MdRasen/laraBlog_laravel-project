<!-- Header Start --> 

<header class="navigation">
	<div class="header-top ">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-lg-2 col-md-4">
					<div class="header-top-socials text-center text-lg-left text-md-left">
						<a href="#" target="_blank"><i class="ti-facebook"></i></a>
						<a href="#" target="_blank"><i class="ti-twitter"></i></a>
						<a href="#" target="_blank"><i class="ti-github"></i></a>
					</div>
				</div>
				<div class="col-lg-10 col-md-8 text-center text-lg-right text-md-right">
					<div class="header-top-info">
						<a href="tel:+23-345-67890">Call Us : <span>+23-345-67890</span></a>
						<a href="mailto:support@gmail.com" ><i class="fa fa-envelope mr-2"></i><span>support@gmail.com</span></a>
                               
                        @if(Auth::user() == true && Auth::user()->role_as == "1")
                            <a href="{{route('admin.dashboard')}}" style="font-size: 18px"> Welcome! <span>{{Auth::user()->role_as == 1 ? 'Admin,' : 'User,'}}</span> <span>{{ Auth::user()->name }}</a>
                        
						@elseif(Auth::user() == true && Auth::user()->role_as == "0")
							<a href="userdashboard" style="font-size: 18px"> Welcome! <span>{{Auth::user()->role_as == 0 ? 'User,' : 'Admin,'}}</span> <span>{{ Auth::user()->name }}</a>

                        @elseif(Auth::user() == false)
                            <a href="{{ route('login') }}"><span>Login</span></a>
                            
                        @endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg  py-4" id="navbar">
		<div class="container">
		  <a class="navbar-brand" href="{{route('public.index')}}">
		  	lara<span>Blog.</span>
		  </a>

		  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
			<span class="fa fa-bars"></span>
		  </button>
	  
		  <div class="collapse navbar-collapse text-center" id="navbarsExample09">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="{{route('public.index')}}">Home <span class="sr-only">(current)</span></a>
			  </li>
			  {{-- <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a>
					<ul class="dropdown-menu" aria-labelledby="dropdown03">
						<li><a class="dropdown-item" href="about.html">Our company</a></li>
						<li><a class="dropdown-item" href="pricing.html">Pricing</a></li>
					</ul>
			  </li>
			   <li class="nav-item"><a class="nav-link" href="service.html">Services</a></li>
			   <li class="nav-item"><a class="nav-link" href="project.html">Portfolio</a></li>
			   <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
					<ul class="dropdown-menu" aria-labelledby="dropdown05">
						<li><a class="dropdown-item" href="blog-grid.html">Blog Grid</a></li>
						<li><a class="dropdown-item" href="blog-sidebar.html">Blog with Sidebar</a></li>

						<li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
					</ul>
			  </li> --}}

			  {{-- Generated from categories --}}
			  @php
				  $categories = App\models\category::all();
			  @endphp

			  @foreach ($categories as $item)
			  	<li class="nav-item"><a class="nav-link" href="{{route('public.category-posts', ['category_slug'=>$item->slug])}}">{{$item->name}}</a></li>				  
			  @endforeach

			   {{-- <li class="nav-item"><a class="nav-link" href="#">Contact</a></li> --}}

			</ul>

			<form class="form-lg-inline my-2 my-md-0 ml-lg-4 text-center">
			  <a href="contact.html" class="btn btn-solid-border btn-round-full">Get a Quote</a>
			</form>
		  </div>
		</div>
	</nav>
</header>

<!-- Header Close -->