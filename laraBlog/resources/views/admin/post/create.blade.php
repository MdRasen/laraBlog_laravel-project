@extends('layouts.master')
@section('title', 'laraBlog - Create Post')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Create Post <a href="{{route('admin.view-post');}}" class="btn btn-primary float-end">View
                Posts</a></h4>
        </div>
        <div class="card-body">

            <form action="{{route('admin.create-post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="post_category_id">Post Category:</label>
                    <select name="category_id" class="form-control" >
                        @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <p style="color:red;">@error('category_id')*{{$message}}@enderror</p>
                </div>

                <div class="mb-2">
                    <label for="post_name">Post Name:</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    <p style="color:red;">@error('name')*{{$message}}@enderror</p>
                </div>
                <div class="mb-2">
                    <label for="post_slug">Slug:</label>
                    <input type="text" name="slug" class="form-control" value="{{old('slug')}}">
                    <p style="color:red;">@error('slug')*{{$message}}@enderror</p>
                </div>
                <div class="mb-2">
                    <label for="post_description">Description:</label>
                    <textarea name="description"cols="5" rows="5" class="form-control" id="summernote">{{old('description')}}</textarea>
                    <p style="color:red;">@error('description')*{{$message}}@enderror</p>
                </div>
                <div class="mb-2">
                    <label for="post_image">Featured Image:</label>
                    <input type="file" name="image" class="form-control" value="{{old('image')}}">
                    <p style="color:red;">@error('image')*{{$message}}@enderror</p>
                </div>
                <h6>Meta Tags:</h6>
                <div class="mb-2">
                    <label for="category_meta_title">Meta Title:</label>
                    <input type="text" name="meta_title" class="form-control" value="{{old('meta_title')}}">
                    <p style="color:red;">@error('meta_title')*{{$message}}@enderror</p>
                </div>
                <div class="mb-2">
                    <label for="category_meta_description">Meta Description:</label>
                    <textarea name="meta_description"cols="2" rows="2" class="form-control">{{old('meta_description')}}</textarea>
                    <p style="color:red;">@error('meta_description')*{{$message}}@enderror</p>
                </div>
                <div class="mb-2">
                    <label for="category_meta_description">Meta Keywords:</label>
                    <textarea name="meta_keywords"cols="2" rows="2" class="form-control">{{old('meta_keywords')}}</textarea>
                    <p style="color:red;">@error('meta_keywords')*{{$message}}@enderror</p>
                </div>
                <h6>Status Mode:</h6>
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <label for="category_status">Status (Hidden):</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6 mb-2">
                        <button type="submit" class="btn btn-primary">Create Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection