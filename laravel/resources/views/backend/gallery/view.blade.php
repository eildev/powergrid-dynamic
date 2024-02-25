@extends('backend.admin_master')
@section('admin')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4>Gallery list</h4><br>
                     <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                         <li class="breadcrumb-item active">
                             <a href="{{route('gallery.add')}}" class=" btn btn-sm btn-primary text-light fs-4"> +</a>
                         </li>
                       </ol>
                     </div>
                     </div>
                    <h3 class="card-title">Gallery Datatable</h3>

                    <table id="datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Gallery Title</th>
                                <th>Gallery Iamge</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gallery as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item['category']['category_name']}}</td>
                                <td>{{$item->title}}</td>
                                <td><img style="height: 60px; width:60px" src="{{asset('uploads/gallery/'.$item->gallery_image)}}" alt=""></td>

                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{route('edit.gallery',$item->id)}}"><i class="fas fa-pencil-alt"></i></a>

                                <a href="{{route('delete.gallery',$item->id)}}" id="delete" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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
