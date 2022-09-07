@extends('layouts.master')
@section('title', 'laraBlog - Post')
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
            <div class="table-responsive-sm">
                <table id="myTable" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Featured Image</th>
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
                            <td>{{$item->id}}</td>
                            <td>
                                <img class="img-fluid" src="{{asset('storage/post_images')}}/{{$item->image}}" alt="featured image" width="100px">
                            </td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->status == 0 ? "Visible":"Hidden"}}</td>
                            <td>
                                <a href="{{route('admin.edit-post', ['post_id'=>$item->id])}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <button type="button" value="{{$item->id}}" class="btn btn-danger deletePostBtn">Delete</button>

                                 <!-- Modal -->
                                 <div class="modal fade" id="deleteModal" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                     <form action="{{route('admin.delete-post')}}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">Are you sure you want to delete?</div>
                                            <input type="hidden" id="post_id" name="post_id" class="form-control">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                     </form>
                                 </div>

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

@section('scripts')
    <script>
        $(document).ready( function () {
            $('.deletePostBtn').click(function (e){
                e.preventDefault();
                var post_id =  $(this).val();
                $('#post_id').val(post_id);
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endsection
