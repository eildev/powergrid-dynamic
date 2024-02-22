@extends('backend.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
               <h4>Edit Service Details</h4><br>
            <div class="page-title-right">
               <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">
                    <a href="{{route('service.details.view')}}" class=" btn btn-sm btn-primary text-light fs-4"> +</a>
                </li>
              </ol>
            </div>
            </div>
                <hr>

                <form action="{{route('update.service.details',$servicesDetails->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-email-input" class="col-sm-2 col-form-label">Select Service title</label>
                    <div class="col-sm-10">
                        <select class="form-select @error('services_title') is-invalid  @enderror" name="services_title"  aria-label="Default select example">
                            <option selected="" value=""> Select Service Title</option>
                            @foreach ($services as $service)
                            <option value="{{$service->id}}" {{$service->id == $servicesDetails->services_id   ? 'selected' : '' }}>{{$service->services_title}}</option>
                            @endforeach
                        </select>
                        @error('services_title')
                        <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="example-input" class="col-sm-2 col-form-label">Service Details Title</label>
                    <div class="col-sm-10">
                        <input class="form-control @error('services_details_title') is-invalid  @enderror" name="services_details_title" type="text" value="{{$servicesDetails->services_details_title}}" placeholder="Enter  Service Details Title" id="example-input">
                        @error('services_details_title')
                        <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>

                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">About Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('services_details_description') is-invalid  @enderror"  name="services_details_description"
                         style="resize: none; height: 150px;">{{$servicesDetails->services_details_description}}</textarea>

                         @error('services_details_description')
                         <span class="text-danger">{{ $message }}</span>
                          @enderror
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-input" class="col-sm-2 col-form-label">Service Details Icon</label>
                    <div class="col-sm-10">
                        <input name="services_details_icon" class="form-control @error('services_details_icon') is-invalid  @enderror" type="file"  id="image">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-url-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img id="showImage" class="rounded avatar-lg " src="{{asset('uploads/services_image/'.$servicesDetails->services_details_icon)}}" alt="Service Details Image">
                        @error('services_details_icon')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                {{-- //Image Details --}}
                <div class="row mb-3">
                    <label for="example-input" class="col-sm-2 col-form-label">Service Details  Image</label>
                    <div class="col-sm-10">
                        <input name="services_details_image" value="{{$servicesDetails->services_details_image}}" class="form-control @error('services_details_image') is-invalid  @enderror" type="file"  id="image2">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-url-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img id="showImage2" class="rounded avatar-lg " src="{{asset('uploads/services_image/'.$servicesDetails->services_details_image)}}" alt="Service Details Image">
                        @error('services_details_image')
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
        $('#image2').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage2').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
