@extends('backend.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
               <h4>Edit Gallery Page</h4><br>
            <div class="page-title-right">
               <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">
                    <a href="{{route('gallery.view')}}" class=" btn btn-sm btn-primary text-light fs-4"> +</a>
                </li>
              </ol>
            </div>
            </div>
                <hr>
                <form action="{{route('update.gallery',$gallery->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-email-input" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-10">
                        <select class="form-select @error('category_name') is-invalid  @enderror" name="category_name"  aria-label="Default select example">
                            <option selected="" value=""> Select Category Name</option>
                            @foreach ($category as $cat)
                            <option value="{{$cat->id}}" {{$cat->id == $gallery->category_id  ? 'selected' : '' }}>{{$cat->category_name}}</option>
                            @endforeach
                        </select>
                        @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="example-email-input" class="col-sm-2 col-form-label">Gallery Title</label>
                    <div class="col-sm-10">
                        <input class="form-control @error('gallery_title') is-invalid  @enderror" name="gallery_title" type="text" value="{{$gallery->title}} " placeholder="Enter Gallery Title" id="example-email-input">
                        @error('gallery_title')
                        <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>

                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-input" class="col-sm-2 col-form-label">Gallery Image</label>
                    <div class="col-sm-10">
                        <input name="gallery_image" class="form-control @error('gallery_image') is-invalid  @enderror" type="file"  id="image">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-url-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img id="showImage" class="rounded avatar-lg " src="{{asset('uploads/gallery/'.$gallery->gallery_image)}}" alt="gallery Image">
                        @error('gallery_image')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="row mb-3">
                    <label for="example-number-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input  type="submit" class="btn btn-info ">
                    </div>
                </div>
            </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
