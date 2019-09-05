@extends('layouts.frontend')
@section('title')
Edit Profile
@endsection

@section('extraStyle')
    .form-group{
    margin-bottom:20px
}
.control-label{
    margin-top:10px
}
.image:hover{
    background-color:#333 !important
}
@endsection

@section('content')
<div class="container">
     <div class="card">
        <div class="card-header d-flex align-items-center">
        <h3 class="h4">Edit Profile</h3>
           </div>
         <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{url('/editProfile')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                 <input type="file" id="file" name="file" hidden>
                <div class="form-group row">
                    <label  class="col-md-1 control-label">Name</label>
                    <div class="col-md-11">
                        <input  type="text" class="form-control" name="name" value="{{auth()->user()->name}}"  required>
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-md-1 control-label">Email</label>
                    <div class="col-md-11">
                        <input  type="text" class="form-control" name="email" value="{{auth()->user()->email}}"  required>
                    </div>
                </div>
                <div class="form-group" style="margin-top: 45px">
                        <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
