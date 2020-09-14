@extends('quicar.backend.layout.admin')
@section('title','Banner')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">Create Banner</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.banner.store') }}" id="saveBannerForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="title">Title <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Enter Banner Title" required>
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
                                        <label for="status">Banner For <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <select class="form-control" id="banner_for" name="banner_for">
                                            <option value="1">User App</option>
                                            <option value="2">Owner App</option>
                                        </select>
                                        <span class="text-danger statusError"></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="status">Status <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="1">Show</option>
                                            <option value="2">Hide</option>
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
<script src="{{ asset('quicar/backend/js/banner.js')}}"></script>
    <script>
        $("#banner").addClass('active');
    </script>
@endsection
