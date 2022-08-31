@extends('layouts.master')
@section('title', 'laraBlog - Category')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Post <a href="{{route('admin.create-post');}}" class="btn btn-primary float-end">Add
                    Post</a></h4>
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
                        <th>Post Name</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->status == 0 ? "Visible":"Hidden"}}</td>
                        <td>
                            <a href="{{route('admin.edit-post', ['post_id'=>$item->id])}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <a href="{{route('admin.delete-post', ['post_id'=>$item->id])}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
