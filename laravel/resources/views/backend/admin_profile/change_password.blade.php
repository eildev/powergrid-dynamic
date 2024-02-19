@extends('backend.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Change Password</h4>
         
            @if(count($errors))
            @foreach($errors->all() as $error)
            <p class="alert alert-danger alert-dismissible fade show">{{$error}}</p>
            @endforeach
            @endif
            <p class="card-title-desc">Here are field of <code class="highlighter-rouge">.Change Password Page</code> .</p>
            <form action="{{route('update.password')}}" method="post">
                @csrf
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label" value="">Old Password</label>
                <div class="col-sm-10">
                    <input class="form-control" name="Old_Password" type="password" placeholder="Old Password" id="oldpassword">
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-search-input" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                    <input class="form-control" name="New_Password" type="password" placeholder="New Password" id="newpassword">
                </div>
            </div>
                <!-- end row -->
            <div class="row mb-3">
                <label for="example-search-input" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input class="form-control" name="Confirm_Password" type="password" placeholder="Confirm Password" id="confirmpassword">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-10">
                <input type="submit" class="btn btn-secondary waves-effect waves-light" Value="Update Password">
                </div>
            </div>

            <!-- end row -->
            </form>
        </div>
    </div>
    </div>
</div>
@endsection
