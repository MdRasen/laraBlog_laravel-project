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
                            <th>ID</th>
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
                            <td>{{$item->id}}</td>
                            <td> <img src="{{asset('storage/category_images')}}/{{$item->image}}" alt="Category image" height="50px" width="50px"></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->status == 0 ? "Visible":"Hidden"}}</td>
                            <td>
                                <a href="{{route('admin.edit-category', ['category_id'=>$item->id])}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>

                                <button type="button" value="{{$item->id}}" class="btn btn-danger deleteCategoryBtn">Delete</button>

                                 <!-- Modal -->
                                 <div class="modal fade" id="deleteModal" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                     <form action="{{route('admin.delete-category')}}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">Are you sure you want to delete?</div>
                                            <input type="hidden" id="category_id" name="category_id" class="form-control">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                     </form>
                                 </div>
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
            $('.deleteCategoryBtn').click(function (e){
                e.preventDefault();
                var category_id =  $(this).val();
                $('#category_id').val(category_id);
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endsection
