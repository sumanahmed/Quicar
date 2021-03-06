@extends('quicar.backend.layout.admin')
@section('title','Top Destination')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">Create Top Destination</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.top-destination.store') }}" id="saveBannerForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="name">Name <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Detination Name" required>
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
                                        <label for="status">Status <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="1">Show</option>
                                            <option value="0">Hide</option>
                                        </select>
                                        <span class="text-danger statusError"></span>
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
        $("#top_destination").addClass('active');
    </script>
@endsection
