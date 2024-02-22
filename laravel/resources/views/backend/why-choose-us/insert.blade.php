@extends('backend.admin_master')
@section('admin')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Why Choose Us</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Why Choose Us</a></li>
                            <li class="breadcrumb-item active">Add Why Choose Us</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('why-choose-us.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('title') is-invalid  @enderror" name="title"
                                        type="text" placeholder="Enter Title" id="example-email-input">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Details Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('details_title') is-invalid  @enderror"
                                        name="details_title" type="text" placeholder="Enter Title"
                                        id="example-email-input">
                                    @error('details_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Sub Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('sub_title') is-invalid  @enderror" name="sub_title"
                                        type="text" placeholder="Enter Sub Title" id="example-email-input">
                                    @error('sub_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('description') is-invalid  @enderror" id="product_descriptions" name="description"
                                        style="resize: none; height: 150px;"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Details Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('details_description') is-invalid  @enderror" id="product_descriptions"
                                        name="details_description" style="resize: none; height: 150px;"></textarea>
                                    @error('details_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-input" class="col-sm-2 col-form-label">Icon</label>
                                <div class="col-sm-10">
                                    <input name="icon" class="form-control @error('icon') is-invalid  @enderror"
                                        type="file" id="image">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-url-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg "
                                        src="{{ asset('uploads/about/no_images.jpg') }}" alt="About Image" name="">
                                    @error('icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-number-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <input type="submit" class="btn btn-info ">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>


    </div>
@endsection
