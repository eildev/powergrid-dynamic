@extends('backend.admin_master')
@section('admin')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4>Managing  Details list</h4><br>
                     <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                         <li class="breadcrumb-item active">
                             <a href="{{route('managing.team.add')}}" class=" btn btn-sm btn-primary text-light fs-4"> +</a>
                         </li>
                       </ol>
                     </div>
                     </div>
                    <h3 class="card-title">Managing Datatable</h3>
                    <table id="datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Facebook</th>
                                <th>instagram</th>
                                <th>linkedin</th>
                                <th>Twitter</th>
                                <th>Full Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($managingTeam as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->designation}}</td>
                                <td>{{$item->facebook}}</td>
                                <td>{{$item->instagram}}</td>
                                <td>{{$item->linkedin}}</td>
                                <td>{{$item->twitter}}</td>
                                <td>{{$item->full_discription}}</td>
                                <td><img style="height: 60px; width:60px" src="{{asset('uploads/managing_team/'.$item->image)}}" alt="Managing Team"></td>


                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{route('edit.managing.team',$item->id)}}">Edit</a>

                                <a href="{{route('delete.managing.team',$item->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a></td>
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
