@extends('backend.admin_master')
@section('admin')

<div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
               <h4>Edit Category Page</h4><br>
            <div class="page-title-right">
               <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">
                    <a href="{{route('category.view')}}" class=" btn btn-sm btn-primary text-light fs-4"> +</a>
                </li>
              </ol>
            </div>
            </div>
                <hr>
                <form action="{{route('update.category',$category->id)}}" method="post">
                    @csrf


                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-email-input" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-10">
                        <input class="form-control @error('category_name') is-invalid  @enderror" name="category_name" type="text" value="{{$category->category_name}}" placeholder="Enter Category Name" id="example-email-input">
                        @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-number-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input  type="submit" value="Update" class="btn btn-info ">
                    </div>
                </div>
            </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection
