@extends('layouts.app')
@section('title', "laraBlog - $category->name")
@section('content')

<div class="main-wrapper">
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Our blog</span>
                        <h1 class="text-capitalize mb-4 text-lg">{{$category->name}}</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item"><span class="text-white">Category</span></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item"><a href="{{route('public.category-posts', ['category_slug'=>$category->slug])}}" class="text-white-50">{{$category->name}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section blog-wrap bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ($posts as $item)
                        <div class="col-lg-6 col-md-6 mb-5" style="max-width: 80ch; padding: 20px; border: 1px solid #fed;">
                            <div class="blog-item">
                                <img src="{{asset('storage/post_images')}}/{{$item->image}}" alt="image" class="img-fluid rounded" style="width: auto; height: 205px;">
                                <div class="blog-item-content bg-white p-4">
                                    <div class=" py-1 px-2">
                                        <a href="#"><span class="text-muted text-capitalize mr-3"><i
                                            class="ti-pencil-alt mr-2"></i>{{$item->user->name}}</span></a> | 
                                        <span class="text-muted text-capitalize mr-3 ml-2">  {{$item->created_at->format('M d, Y')}}</span>
                                    </div>
                                    <h3 class="mt-3 mb-3"><a href="{{route('public.view-post', ['category_slug'=>$item->category->slug, 'post_slug'=>$item->slug])}}">{{$item->name}}</a>
                                    </h3>
                                    <p class="mb-4" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">{{$item->meta_description}}</p>
                                    <a href="{{route('public.view-post', ['category_slug'=>$item->category->slug, 'post_slug'=>$item->slug])}}" class="btn btn-small btn-main btn-round-full">Learn
                                        More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    {{-- Ad Here --}}
                    <div class="container mb-3">
                        <div class="cta-block-2 bg-gray py-5 rounded border-1">
                            <div class="row justify-content-center align-items-center ">
                                <div class="col-lg-7">
                                    <span class="text-color">Ads Title Here</span>
                                    <h3 class="mt-1 mb-2 mb-lg-0">Ads Text will be Here</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="sidebar-wrap">
                        <div class="sidebar-widget search card p-4 mb-3 border-0">
                            <input type="text" class="form-control" placeholder="search">
                            <a href="#" class="btn btn-mian btn-small d-block mt-2">search</a>
                        </div>

                        {{-- Ad Here --}}
                        <div class="container mb-3">
                            <div class="cta-block-2 bg-gray py-5 rounded border-1">
                                <div class="row justify-content-center align-items-center ">
                                    <div class="col-lg-7">
                                        <span class="text-color">Ads Title Here</span>
                                        <h3 class="mt-1 mb-2 mb-lg-0">Ads Text will be Here</h3>
                                    </div>
                                </div>
                            </div>
                        </div>                

                        <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
                            <h5>Latest Posts</h5>
                            @foreach ($latestposts as $item)
                                <div class="media border-bottom py-3">
                                <a href="#"><img class="mr-4" src="{{asset('storage/post_images')}}/{{$item->image}}" alt="image" class="img-fluid rounded" style="width: auto; height: 40px;"></a>
                                <div class="media-body">
                                    <h6 class="my-2"><a href="{{route('public.view-post', ['category_slug'=>$item->category->slug, 'post_slug'=>$item->slug])}}">{{$item->name}}</a></h6>
                                    <span class="text-sm text-muted">{{$item->created_at->format('M d, Y')}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        {{-- Ad Here --}}
                        <div class="container mb-3">
                            <div class="cta-block-2 bg-gray py-5 rounded border-1">
                                <div class="row justify-content-center align-items-center ">
                                    <div class="col-lg-7">
                                        <span class="text-color">Ads Title Here</span>
                                        <h3 class="mt-1 mb-2 mb-lg-0">Ads Text will be Here</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget bg-white rounded tags p-4 mb-3">
                            <h5 class="mb-4">Tags</h5>

                            <a href="#">Web</a>
                            <a href="#">agency</a>
                            <a href="#">company</a>
                            <a href="#">creative</a>
                            <a href="#">html</a>
                            <a href="#">Marketing</a>
                            <a href="#">Social Media</a>
                            <a href="#">Branding</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    @endsection
