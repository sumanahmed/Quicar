@extends('quicar.backend.layout.admin')
@section('title','Car Types')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">Create Car Type</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.car_types.store') }}" id="saveBannerForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="name">Name <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Banner Title" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="bn_name">Name(Bn) <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <input type="text" name="bn_name" id="bn_name" class="form-control" value="{{ old('bn_name') }}" placeholder="Enter Banner Title" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="image">Image <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <input type="file" name="image" id="image" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-success tx-13">Save</button>
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
    @if(Session::has('error_message'))
        <script>
            toastr.warning("{{ Session::get('error_message') }}")
        </script>
    @endif
    @if(Session::has('message'))
        <script>
            toastr.success("{{ Session::get('message') }}")
        </script>
    @endif
@endsection
