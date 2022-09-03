@extends('layouts.master')
@section('title', 'laraBlog - Category')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Users <a href="{{route('admin.dashboard');}}" class="btn btn-primary float-end">Go Back</a></h4>
        </div>
        <div class="card-body">
            @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    {{session('msg')}}
                </div>
            @endif
            <div class="table-responsive-sm">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
    
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->role_as == 0 ? "User":"Admin"}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                <a href="{{route('admin.edit-user', ['user_id'=>$item->id])}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <a href="{{route('admin.delete-user', ['user_id'=>$item->id])}}" class="btn btn-danger">Delete</a>
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
