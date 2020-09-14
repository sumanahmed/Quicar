@extends('quicar.backend.layout.admin')
@section('title','Package')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">Update Package</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.package.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="package_id" value="{{ $package->id }}" />
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="name">Name <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $package->name }}" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="price">Price <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <input type="text" name="price" id="price" class="form-control" value="{{ $package->price }}" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="image">Previous Image <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <img class="form-control" src="{{ asset($package->image) }}" style="width:120px;height:90px;" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="image">Update Image <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="type">Type <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <select class="form-control" id="type" name="type">
                                            <option value="1" @if($package->type == 1) selected @endif>Daily</option>
                                            <option value="2" @if($package->status == 2) selected @endif>Weekly</option>
                                            <option value="3" @if($package->status == 3) selected @endif>Weekly</option>
                                        </select>
                                        <span class="text-danger statusError"></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="status">Status <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="1" @if($package->status == 1) selected @endif>Show</option>
                                            <option value="2" @if($package->status == 0) selected @endif>Hide</option>
                                        </select>
                                        <span class="text-danger statusError"></span>
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
        $("#package").addClass('active');
    </script>
@endsection
