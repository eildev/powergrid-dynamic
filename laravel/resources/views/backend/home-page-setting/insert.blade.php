@extends('backend.admin_master')
@section('admin')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Home Settings</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home Settings</a></li>
                            <li class="breadcrumb-item active">Add Home Settings</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        {{-- <style>
            .my_tags_input {
                display: inline-block;
                position: relative;
                border: 1px solid #ccc;
                border-radius: 4px;
                padding: 5px;
                box-shadow: 2px 2px 5px #00000033;
                width: 100%;
            }

            .my_tags_input ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .my_tags_input li {
                display: inline-block;
                background-color: #327848;
                color: #fff;
                border-radius: 20px;
                padding: 5px 10px;
                margin-right: 5px;
                margin-bottom: 5px;
            }

            .my_tags_input input[type="text"] {
                border: none;
                outline: none;
                padding: 5px;
                font-size: 14px;
            }

            .my_tags_input input[type="text"]:focus {
                outline: none;
            }

            .my_tags_input .delete-button {
                background-color: transparent;
                border: none;
                color: #999;
                cursor: pointer;
                margin-left: 5px;
            }
        </style> --}}


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('home.settings.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('title') is-invalid  @enderror" type="text"
                                        placeholder="Enter Title" id="example-text-input" name="title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-url-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('short_description') is-invalid  @enderror" rows="3"
                                        placeholder="Short Description" name="short_description"></textarea>
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-tel-input" class="col-sm-2 col-form-label">Long Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('long_description') is-invalid  @enderror" rows="5" maxlength="250"
                                        placeholder="Long Description" name="long_description"></textarea>
                                    @error('long_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            {{-- <div class="row mb-3">
                                <label for="example-tel-input" class="col-sm-2 col-form-label">Keyword</label>
                                <div class="col-sm-10">
                                    <div class="my_tags_input">
                                        <ul id="tags"></ul>
                                        <input type="text" id="input-tag"
                                            class="@error('keywords') is-invalid  @enderror" placeholder="Enter tag name"
                                            name="keywords" />
                                            @error('keywords')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- end row --> --}}
                            <div class="row mb-3">
                                <label for="example-tel-input" class="col-sm-2 col-form-label">Keyword</label>
                                <div class="col-sm-10">
                                <input name="keywords" value="home,tech" class="form-control @error('keywords') is-invalid  @enderror" type="text" data-role="tagsinput">
                                    @error('keywords')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-2 col-form-label">Logo</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('logo') is-invalid  @enderror" type="file"
                                        placeholder="How do I shoot web" id="image" name="logo">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-url-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg "
                                        src="{{ asset('uploads/about/no_images.jpg') }}" alt="image">
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Fav Icon</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('fav') is-invalid  @enderror" type="file"
                                        placeholder="fav Icon" id="image2" name="fav">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-url-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage2" class="rounded avatar-lg"
                                        src="{{ asset('uploads/about/no_images.jpg') }}" alt="image">
                                    @error('fav')
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



    {{-- <script>
        // Get the tags and input elements from the DOM
        const tags = document.getElementById('tags');
        const input = document.getElementById('input-tag');

        // Add an event listener for keydown on the input element
        input.addEventListener('keydown', function(event) {

            // Check if the key pressed is 'Enter'
            if (event.key === 'Enter') {

                // Prevent the default action of the keypress
                // event (submitting the form)
                event.preventDefault();

                // Create a new list item element for the tag
                const tag = document.createElement('li');

                // Get the trimmed value of the input element
                const tagContent = input.value.trim();

                // If the trimmed value is not an empty string
                if (tagContent !== '') {

                    // Set the text content of the tag to
                    // the trimmed value
                    tag.innerText = tagContent;

                    // Add a delete button to the tag
                    tag.innerHTML += '<button class="delete-button">X</button>';

                    // Append the tag to the tags list
                    tags.appendChild(tag);

                    // Clear the input element's value
                    input.value = '';
                }
            }
        });

        // Add an event listener for click on the tags list
        tags.addEventListener('click', function(event) {

            // If the clicked element has the class 'delete-button'
            if (event.target.classList.contains('delete-button')) {

                // Remove the parent element (the tag)
                event.target.parentNode.remove();
            }
        });
    </script> --}}
@endsection
