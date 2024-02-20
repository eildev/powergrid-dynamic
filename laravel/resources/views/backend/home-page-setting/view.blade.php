@extends('backend.admin_master')
@section('admin')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Manage Home Settings</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Home Settings</li>
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
                        <div class="table-responsive">
                            <table id="datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Short Description</th>
                                        <th>Long Description</th>
                                        <th>Logo</th>
                                        <th>Fav Icons</th>
                                        <th>Keywords</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($allData->count() > 0)
                                        @foreach ($allData as $key => $data)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ Illuminate\Support\Str::limit($data->title, 15) }}</td>
                                                <td>{{ Illuminate\Support\Str::limit($data->short_description, 15) }}</td>
                                                <td>{{ Illuminate\Support\Str::limit($data->long_description, 15) }}</td>
                                                <td>
                                                    <img style="height: 50px; object-fit:contain;"
                                                        src="{{ asset('uploads/home-settings/' . $data->logo) }}"
                                                        alt="logo image">
                                                </td>
                                                <td>
                                                    <img style="height: 50px; object-fit:contain;"
                                                        src="{{ asset('uploads/home-settings/' . $data->fav) }}"
                                                        alt="Fav icons">
                                                </td>
                                                <td> {{ Illuminate\Support\Str::limit($data->keywords, 15) }}</td>
                                                <td>
                                                    <a href="{{ route('edit.home.settings', $data->id) }}"
                                                        class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a id="delete" href="{{ route('delete.home.settings', $data->id) }}"
                                                        class="btn btn-outline-secondary btn-sm edit" title="delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8" class="text-center"> Data not Found</td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div>
@endsection
