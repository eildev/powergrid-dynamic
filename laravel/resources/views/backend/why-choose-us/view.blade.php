@extends('backend.admin_master')
@section('admin')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Manage Testimonial</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Testimonial</a></li>
                            <li class="breadcrumb-item active">Manage Testimonial</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        {{-- @dd($allData->all()); --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-editable table-nowrap align-middle table-edits">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Details Title</th>
                                        <th>Sub Title</th>
                                        <th>Description</th>
                                        <th>Details Description</th>
                                        <th>Icon</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($allData->count() > 0)
                                        @foreach ($allData as $key => $data)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    {{ Illuminate\Support\Str::limit($data->title ?? '', 15) }}
                                                </td>
                                                <td>
                                                    {{ Illuminate\Support\Str::limit($data->details[0]->title ?? '', 15) }}
                                                </td>

                                                <td>{{ Illuminate\Support\Str::limit($data->sub_title ?? '', 15) }}</td>
                                                <td>{{ Illuminate\Support\Str::limit($data->description ?? '', 15) }}</td>
                                                <td>{{ Illuminate\Support\Str::limit($data->details[0]->description ?? '', 15) }}
                                                </td>
                                                <td>
                                                    <img style="height: 50px; object-fit:contain;"
                                                        src="{{ asset('uploads/why-choose-us/' . $data->details[0]->icon ?? '') }}"
                                                        alt="testimonial user image">
                                                </td>
                                                <td>
                                                    <form action="{{ route('why-choose-us.status', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @if ($data->status == 1)
                                                            <button class="btn btn-success ">Active</button>
                                                        @else
                                                            <button class="btn btn-danger ">Inactive</button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="{{ route('edit.why-choose-us', $data->id) }}"
                                                        class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a id="delete" href="{{ route('delete.why-choose-us', $data->id) }}"
                                                        class="btn btn-outline-secondary btn-sm edit" title="delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="9" class="text-center">Data not Found</td>
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
