@extends('quicar.backend.layout.admin')
@section('title','Edit Car')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">Update Car</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group mg-b-5">
                                    <label>Name: <span class="tx-danger">*</span></label>
                                    <input type="text" name="name" class="form-control wd-250 parsley-error" placeholder="Enter firstname">
                                </div>
                                <div class="form-group mg-b-0">
                                    <label>Name: <span class="tx-danger">*</span></label>
                                    <input type="text" name="name" class="form-control wd-250 parsley-error" placeholder="Enter firstname">
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/car.js')}}"></script>
<script>
    $("#car").addClass('active');
</script>    
@endsection
