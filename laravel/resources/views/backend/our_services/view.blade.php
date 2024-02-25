@extends('backend.admin_master')
@section('admin')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4>Services list</h4><br>
                     <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                         <li class="breadcrumb-item active">
                             <a href="{{route('service.add')}}" class=" btn btn-sm btn-primary text-light fs-4"> +</a>
                         </li>
                       </ol>
                     </div>
                     </div>
                    <h3 class="card-title">Our Services Datatable</h3>

                    <table id="datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Service Title</th>
                                <th>Service Sub Title</th>
                                <th>Service Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                 <td>{{$item->services_title}}</td>
                                <td>{{$item->services_sub_title}}</td>
                                <td>{{$item->service_description}}</td>
                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{route('edit.services',$item->id)}}"><i class="fas fa-pencil-alt"></i></a>

                                <a href="{{route('delete.services',$item->id)}}" id="delete" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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
