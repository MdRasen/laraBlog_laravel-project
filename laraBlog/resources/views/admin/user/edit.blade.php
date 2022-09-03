@extends('layouts.master')
@section('title', 'laraBlog - Edit User')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit User <a href="{{route('admin.users');}}" class="btn btn-primary float-end">View
                    Users</a></h4>
        </div>
        <div class="card-body">
            <form action="{{route('admin.edit-user', ['user_id'=>$user->id])}}" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="user_name">User Name:</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}" disabled>
                    <p style="color:red;">@error('name')*{{$message}}@enderror</p>
                </div>
                <div class="mb-2">
                    <label for="user_email">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{$user->email}}" disabled>
                    <p style="color:red;">@error('email')*{{$message}}@enderror</p>
                </div>
                <div class="mb-2">
                    <label for="user_created_at">created_at:</label>
                    <input type="email" name="created_at" class="form-control" value="{{$user->created_at}}" disabled>
                    <p style="color:red;">@error('created_at')*{{$message}}@enderror</p>
                </div>
                <h6>User Mode:</h6>
                <div class="mb-2">
                    <label for="category_status">Role:</label>
                    <select name="role_as" class="form-control">
                        <option value="0" {{$user->role_as == '0' ? 'selected' : ''}}>User</option>
                        <option value="1" {{$user->role_as == '1' ? 'selected' : ''}}>Admin</option>
                    </select>
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary">Update User</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
