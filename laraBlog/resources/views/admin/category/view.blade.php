@extends('layouts.master')
@section('title', 'laraBlog - Category')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Category <a href="{{route('admin.create-category');}}" class="btn btn-primary float-end">Add
                    Category</a></h4>
        </div>
        <div class="card-body">
            @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    {{session('msg')}}
                </div>
            @endif
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)

                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td> <img src="{{asset('storage/category_images')}}/{{$item->image}}" alt="Category image" height="50px" width="50px"></td>
                        <td>{{$item->status == 0 ? "Visible":"Hidden"}}</td>
                        <td>
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
