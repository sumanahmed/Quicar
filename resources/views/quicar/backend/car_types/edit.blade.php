@extends('quicar.backend.layout.admin')
@section('title','Car Types')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">Update Car Type</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.car_types.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="car_type_id" value="{{ $car_type->id }}" />
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="name">Name <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $car_type->name }}" required />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="bn_name">Name(Bn) <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <input type="text" name="bn_name" id="bn_name" class="form-control" value="{{ $car_type->bn_name }}" placeholder="Enter Banner Title" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="image">Previous Image <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <img class="form-control" src="{{ asset($car_type->image) }}" style="width:120px;height:90px;" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="image">Image <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-success tx-13">Update</button>
                                    </div>
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
    <script>
        $("#car_type").addClass('active');
    </script>
@endsection
