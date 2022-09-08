@extends('layouts.app')
@section('title', 'laraBlog - Home')
@section('content')

<div class="main-wrapper ">
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">{{$post->category->name}}</span>
                        <h1 class="text-capitalize mb-4 text-lg">{{$post->name}}</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item"><p class="text-white-50">Category</p></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item"><a href="{{route('public.category-posts', ['category_slug'=>$post->category->slug])}}" class="text-white-50">{{$post->category->name}}</a></li>
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
                        <div class="col-lg-12 mb-3">
                            <div class="single-blog-item">
                                <img src="{{asset('storage/post_images')}}/{{$post->image}}" alt="image" class="img-fluid rounded">

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

                                <div class="blog-item-content bg-white p-5">
                                    <div class="blog-item-meta bg-gray py-1 px-2">
                                        <span class="text-muted text-capitalize mr-3"><i
                                                class="ti-pencil-alt mr-2"></i>{{$post->user->name}}</span>
                                        <span class="text-muted text-capitalize mr-3"><i class="ti-comment mr-2"></i>5
                                            Comments</span>
                                        <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i>{{$post->created_at->format('M d, Y')}}</span>
                                    </div>

                                    <h2 class="mt-3 mb-4"><a href="blog-single.html">{{$post->name}}</a>
                                    </h2>
                                    <p class="lead mb-4">{!!$post->description!!}</p>

                                    <div class="tag-option mt-5 clearfix">
                                        <ul class="float-left list-inline">
                                            <li>Tags:</li>
                                            <li class="list-inline-item"><a href="#" rel="tag">Advancher</a></li>
                                            <li class="list-inline-item"><a href="#" rel="tag">Landscape</a></li>
                                            <li class="list-inline-item"><a href="#" rel="tag">Travel</a></li>
                                        </ul>

                                        <ul class="float-right list-inline">
                                            <li class="list-inline-item"> Share: </li>
                                            <li class="list-inline-item"><a href="#" target="_blank"><i
                                                        class="ti-facebook" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#" target="_blank"><i
                                                        class="ti-twitter" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#" target="_blank"><i
                                                        class="ti-pinterest" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
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

                        <div class="col-lg-12 mb-3">
                            <div class="comment-area card border-0 p-5">
                                <h4 class="mb-1">{{$numofcomments}} Comments</h4>
                                <ul class="comment-tree list-unstyled">

                                    @foreach ($comments as $item)
                                    <li>
                                        <div class="comment-area-box">
                                            <img alt="" src="https://cdn.icon-icons.com/icons2/2574/PNG/512/profile_picture_user_icon_153847.png"
                                                class="mt-2 img-fluid float-left mr-3" style="height: 50px;">

                                            <span class="mb-1 text-muted">{{$item->name}}</span> |
                                            <span>Posted {{$item->created_at->format('M d, Y')}}</span>

                                            <div class="comment-content mt-3">
                                                <p>{{$item->comment}}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <form class="contact-form bg-white rounded p-5" action="{{route('public.comment-submit')}}" method="POST">
                                @csrf
                                <h4 class="mb-4">Write a comment</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <input class="form-control" type="text" name="name"
                                                placeholder="Name:" value="{{old('name')}}">
                                            <p style="color:red;">@error('name')*{{$message}}@enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="email" name="email"
                                                placeholder="Email:" value="{{old('email')}}">
                                            <p style="color:red;">@error('email')*{{$message}}@enderror</p>
                                        </div>
                                    </div>
                                </div>

                                <textarea class="form-control mb-3" name="comment" id="comment" cols="30" rows="5"
                                    placeholder="Write your comment here...">{{old('comment')}}</textarea>
                                <p style="color:red;">@error('comment')*{{$message}}@enderror</p>

                                <input class="btn btn-main btn-round-full" type="submit" name="submit" value="Submit Comment">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-wrap">
                        <div class="sidebar-widget search card p-4 mb-3 border-0">
                            <input type="text" class="form-control" placeholder="search">
                            <a href="#" class="btn btn-mian btn-small d-block mt-2">search</a>
                        </div>

                        <div class="sidebar-widget card border-0 mb-3">
                            <img src="https://www.prajwaldesai.com/wp-content/uploads/2021/02/Find-Users-Last-Logon-Time-using-4-Easy-Methods.jpg" alt="user pic" class="img-fluid">
                            <div class="card-body p-4 text-center">
                                <h5 class="mb-0 mt-4">{{$post->user->name}}</h5>
                                <p>{{$post->user->email}}</p>
                                <p>Joined On: {{$post->user->created_at->format('M d, Y')}}</p>

                                <ul class="list-inline author-socials">
                                    <li class="list-inline-item mr-3">
                                        <a href="#"><i class="fab fa-facebook-f text-muted"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-3">
                                        <a href="#"><i class="fab fa-twitter text-muted"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-3">
                                        <a href="#"><i class="fab fa-linkedin-in text-muted"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-3">
                                        <a href="#"><i class="fab fa-pinterest text-muted"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-3">
                                        <a href="#"><i class="fab fa-behance text-muted"></i></a>
                                    </li>
                                </ul>
                            </div>
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

</div>

@endsection
