@extends('layouts.master')
@section('title', 'laraBlog - Edit Category')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit Category <a href="{{route('admin.view-category');}}" class="btn btn-primary float-end">View
                    Categories</a></h4>
        </div>
        <div class="card-body">
            <form action="{{route('admin.edit-category', ['category_id'=>$category->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="category_name">Category Name:</label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
                    <p style="color:red;">@error('name')*{{$message}}@enderror</p>
                </div>
                <div class="mb-2">
                    <label for="category_slug">Slug:</label>
                    <input type="text" name="slug" class="form-control" value="{{$category->slug}}">
                    <p style="color:red;">@error('slug')*{{$message}}@enderror</p>
                </div>
                <div class="mb-2">
                    <label for="category_description">Description:</label>
                    <textarea name="description"cols="5" rows="5" class="form-control" id="summernote" value="{{old('description')}}">{{$category->description}}</textarea>
                    <p style="color:red;">@error('description')*{{$message}}@enderror</p>
                </div>
                <div class="mb-2">
                    <div class="row">
                        <div class="col-4">
                            <img class="img-fluid img-thumbnail" src="{{asset('storage/category_images')}}/{{$category->image}}" alt="category image" width="150px"> <br>
                        </div>
                        <div class="col-8 pt-2">
                            <label for="category_image">Category Image:</label>
                            <input type="file" name="image" class="form-control" value="{{$category->image}}">
                            <p style="color:red;">@error('image')*{{$message}}@enderror</p>
                        </div>
                    </div>
                </div>
                <h6>Meta Tags:</h6>
                <div class="mb-2">
                    <label for="category_meta_title">Meta Title:</label>
                    <input type="text" name="meta_title" class="form-control" value="{{$category->meta_title}}">
                    <p style="color:red;">@error('meta_title')*{{$message}}@enderror</p>
                </div>
                <div class="mb-2">
                    <label for="category_meta_description">Meta Description:</label>
                    <textarea name="meta_description"cols="2" rows="2" class="form-control" value="{{$category->meta_description}}">{{$category->meta_description}}</textarea>
                    <p style="color:red;">@error('meta_description')*{{$message}}@enderror</p>
                </div>
                <div class="mb-2">
                    <label for="category_meta_description">Meta Keywords:</label>
                    <textarea name="meta_keywords"cols="2" rows="2" class="form-control" value="{{$category->meta_keywords}}">{{$category->meta_keywords}}</textarea>
                    <p style="color:red;">@error('meta_keywords')*{{$message}}@enderror</p>
                </div>
                <h6>Status Mode:</h6>
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <label for="category_navbar_status">Navbar Status (Hidden):</label>
                        <input type="checkbox" name="navbar_status" {{$category->navbar_status == 0 ? '':'checked'}}>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="category_status">Status (Hidden):</label>
                        <input type="checkbox" name="status" {{$category->status == 0 ? '':'checked'}}>
                    </div>
                    <div class="col-md-6 mb-2">
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
