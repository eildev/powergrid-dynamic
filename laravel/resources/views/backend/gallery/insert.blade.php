@extends('backend.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
               <h4>Add Gallery Page</h4><br>
            <div class="page-title-right">
               <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">
                    <a href="{{route('gallery.view')}}" class=" btn btn-sm btn-primary text-light fs-4"> +</a>
                </li>
              </ol>
            </div>
            </div>
                <hr>
                <form action="{{route('store.gallery')}}" method="post" id ="myForm" enctype="multipart/form-data">
                    @csrf
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-email-input" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-10 form-group">
                        <select class="form-select " name="category_name"  aria-label="Default select example">
                            <option selected="" value=""> Select Category Name</option>
                            @foreach ($category as $cat)
                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                            @endforeach
                        </select>
                      
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="example-email-input" class="col-sm-2 col-form-label">Gallery Title</label>
                    <div class="col-sm-10 form-group">
                        <input class="form-control" name="gallery_title" type="text" placeholder="Enter Gallery Title" id="example-email-input">
                      
                    </div>

                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-input" class="col-sm-2 col-form-label">Gallery Image</label>
                    <div class="col-sm-10 form-group">
                        <input name="gallery_image" class="form-control" type="file"  id="image">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-url-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img id="showImage" class="rounded avatar-lg " src="{{asset('uploads/about/no_images.jpg')}}" alt="About Image">
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
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                category_name: {
                    required : true,
                }, 
                gallery_image: {
                    required : true,
                },
                gallery_title: {
                    required : true,
                },
            },
            messages :{
                category_name: {
                    required : 'Please Select The Category Name',
                },
                gallery_image: {
                    required : 'Please Select The Image ',
                },
                gallery_title: {
                    required : 'Please Enter The Title ',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');
            },

            submitHandler: function(form) {
            var formData = new FormData(form);

            // Submit form via AJAX
            $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    toastr.success(response.message);
                    $('#myForm')[0].reset();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        // Display validation messages for specific fields
                        $.each(errors, function(field, errorMessage) {
                            $('#' + field + '_error').text(errorMessage[0]);
                        });
                    } else {
                        toastr.error('Error occurred while submitting the form.');
                    }
                }
            });
        }
        });
    });

</script>
@endsection
