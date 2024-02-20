@extends('backend.admin_master')
@section('admin')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h3 class="card-title">Footter Datatable</h3>

                    <table id="datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Location</th>
                                <th>Link</th>
                                <th>Website</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($footer as $item)
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>{{$item->fullAddress}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->location}}</td>
                                <td>{{$item->link}}</td>
                                <td>{{$item->website}}</td>
                                <td>Action</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
</div>
@endsection
