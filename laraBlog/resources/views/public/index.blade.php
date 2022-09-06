@extends('layouts.app')
@section('title', 'laraBlog - Home')
@section('content')

<section class="section latest-blog bg-1">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<span class="h6 text-color">Latest News</span>
					<h2 class="mt-3 content-title text-white">Latest articles to enrich knowledge</h2>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
			@foreach ($latestposts as $item)
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="card bg-transparent border-0">
                        <img src="{{asset('assets/images/blog/1.jpg')}}" alt="image" class="img-fluid rounded">
                        <div class="card-body mt-2">
                            <div>
                                <a href="#" class="text-white-50">Design<span class="ml-2 mr-2">/</span></a>
                                <a href="#"  class="text-white-50">Ui/Ux<span class="ml-2">/</span></a>
                                <a href="#" class="text-white-50 ml-2"><i class="fa fa-user mr-2"></i>admin</a>
                            </div> 
                            <h3 class="mt-3 mb-5 lh-36"><a href="#" class="text-white ">{{$item->name}}</a></h3>
                            <a href="blog-single.html" class="btn btn-small btn-solid-border btn-round-full text-white">Learn More</a>
                        </div>
                    </div>
			    </div>
            @endforeach
		</div>
	</div>
</section>

<section class="position-relative p-3">
    <div class="container">
        <div class="cta-block-2 p-5 rounded border-1">
            <div class="row justify-content-center align-items-center ">
                <div class="col-lg-7">
                    <span class="text-color">Ads Title Here</span>
                    <h2 class="mt-2 mb-4 mb-lg-0">Ads Text will be Here</h2>
                </div>
                <div class="col-lg-4">
                    <a href="#" class="btn btn-main btn-round-full float-lg-right">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section blog-wrap bg-gray">
    <div class="container">
        <div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<span class="h6 text-color">Other Blogs</span>
					<h2 class="mt-3 content-title ">Lorem ipsum dolor sit amet adipisicing elit! </h2>
				</div>
			</div>
		</div>

        <div class="row justify-content-center">
	@foreach ($otherposts as $item)
    <div class="col-lg-4 col-md-4 mb-5">
		<div class="blog-item">
			<img src="{{asset('assets/images/blog/3.jpg')}}" alt="" class="img-fluid rounded">
			<div class="blog-item-content bg-white p-2">
				<div class="bg-gray pt-2">
					<span class="text-muted text-capitalize m-1"><i class="ti-pencil-alt m-1"></i>Creativity</span>
					<span class="text-muted text-capitalize m-1"><i class="ti-comment m-1"></i>5 Comments</span> <br>
					<span class="text-black text-capitalize m-1"><i class="ti-time m-1"></i> 28th January</span>
				</div> 
				<h3 class="m-2"><a href="blog-single.html">Improve design with typography?</a></h3>
				<p class="m-2">Non illo quas blanditiis repellendus laboriosam minima animi. Consectetur accusantium pariatur repudiandae!</p>
				<a href="blog-single.html" class="btn btn-small btn-main btn-round-full">Learn More</a>
			</div>
		</div>
	</div>
    @endforeach
	
</div>
</section>

<section class="mt-70 position-relative">
<div class="container">
	<div class="cta-block-2 bg-gray p-5 rounded border-1">
		<div class="row justify-content-center align-items-center ">
			<div class="col-lg-7">
				<span class="text-color">Ads Title Here</span>
				<h2 class="mt-2 mb-4 mb-lg-0">Ads Text will be Here</h2>
			</div>
			<div class="col-lg-4">
				<a href="#" class="btn btn-main btn-round-full float-lg-right">Contact Us</a>
			</div>
		</div>
	</div>
</div>
</section>
    
@endsection