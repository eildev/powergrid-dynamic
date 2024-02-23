@extends('backend.admin_master')
@section('admin')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
               <h4>Managing Team </h4><br>
            <div class="page-title-right">
               <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">
                    <a href="" class=" btn btn-sm btn-primary text-light fs-4"> +</a>
                </li>
              </ol>
            </div>
            </div>
                <hr>
                <form action="{{url('managing/team/store')}}" method="post" id ="addajax"  enctype="multipart/form-data">
                    @csrf
                <!-- end row -->
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input class="form-control @error('name') is-invalid  @enderror" name="name" type="text" placeholder="Enter Managing Team Name " id="name">
                        @error('name')
                        <span id="name_error" class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>
                    </div>
                <div class="row mb-3">
                    <label for="designation" class="col-sm-2 col-form-label">Designation</label>
                    <div class="col-sm-10">
                        <input class="form-control @error('designation') is-invalid  @enderror" name="designation" type="text" placeholder="Enter Designation " id="designation">
                        @error('designation')
                        <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="facebook" type="url" placeholder="Enter Facebook Url" id="facebook">
                        {{-- @error('facebook')
                        <span class="text-danger">{{ $message }}</span>
                         @enderror --}}
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="example-email-input" class="col-sm-2 col-form-label">instagram</label>
                    <div class="col-sm-10">
                        <input class="form-control " name="instagram" type="url" placeholder="Enter instagram Url " id="example-email-input">
                        {{-- @error('instagram')
                        <span class="text-danger">{{ $message }}</span>
                         @enderror --}}
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="example-email-input" class="col-sm-2 col-form-label">linkedin</label>
                    <div class="col-sm-10">
                        <input class="form-control " name="linkedin" type="url" placeholder="Enter linkedin url " id="example-email-input">
                        {{-- @error('linkedin')
                        <span class="text-danger">{{ $message }}</span>
                         @enderror --}}
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="example-email-input" class="col-sm-2 col-form-label">Twitter</label>
                    <div class="col-sm-10">
                        <input class="form-control " name="twitter" type="url" placeholder="Enter twitter url" id="example-email-input">
                        {{-- @error('twitter')
                        <span class="text-danger">{{ $message }}</span>
                         @enderror --}}
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Full Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control "  name="full_discription"
                         style="resize: none; height: 150px;" placeholder="Enter Description"></textarea>

                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-input" class="col-sm-2 col-form-label"> Image</label>
                    <div class="col-sm-10">
                        <input name="managing_image" class="form-control @error('managing_image') is-invalid  @enderror" type="file"  id="image">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-url-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img id="showImage" class="rounded avatar-lg " src="{{asset('uploads/about/no_images.jpg')}}" alt="About Image">
                        @error('managing_image')
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

        // $('#addajax').on('submit', function(event){
        //     event.preventDefault();
        //     var formData = new FormData(this);
        //     $.ajax({
        //         url:"{{url('managing/team/store')}}",
        //         method:"POST",
        //         data:formData,
        //         success:function(data){
        //             console.log(data);
        //             //$('#addajax')[0].reset();
        //         }
        //     });
        //  });
    });
</script>
@endsection
