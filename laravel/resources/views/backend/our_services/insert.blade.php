@extends('backend.admin_master')
@section('admin')

<div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
               <h4>Add Our Service</h4><br>
            <div class="page-title-right">
               <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">
                    <a href="{{route('service.view')}}" class=" btn btn-sm btn-primary text-light fs-4"> +</a>
                </li>
              </ol>
            </div>
            </div>
                <hr>
                <form action="{{route('store.services')}}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Service Title</label>
                        <div class="col-sm-10">
                            <input class="form-control @error('services_title') is-invalid  @enderror" name="services_title" type="text" placeholder="Enter Your Service title" id="example-email-input">
                            @error('services_title')
                            <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Service Sub Title</label>
                        <div class="col-sm-10">
                            <input class="form-control @error('services_sub_title') is-invalid  @enderror" name="services_sub_title" type="text" placeholder="Enter Your Service Sub title" id="example-email-input">
                            @error('services_sub_title')
                            <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>
                    </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Service Description </label>
                    <div class="col-sm-10">
                       <textarea id="" class="form-control @error('service_description') is-invalid  @enderror" name="service_description" placeholder="Enter Your Services Description"  cols="60" rows="10"></textarea>
                       @error('service_description')
                            <span class="text-danger">{{ $message }}</span>
                             @enderror
                    </div>
                </div>

                <!-- end row -->
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
@endsection
