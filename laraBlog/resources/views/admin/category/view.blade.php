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
            <div class="table-responsive-sm">
                <table id="myTable" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
    
                        <tr>
                            <td> <img src="{{asset('storage/category_images')}}/{{$item->image}}" alt="Category image" height="50px" width="50px"></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->status == 0 ? "Visible":"Hidden"}}</td>
                            <td>
                                <a href="{{route('admin.edit-category', ['category_id'=>$item->id])}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <a href="{{route('admin.delete-category', ['category_id'=>$item->id])}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
