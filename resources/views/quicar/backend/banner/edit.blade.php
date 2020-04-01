@extends('quicar.backend.layout.admin')
@section('title','Banner')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">Update Banner</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.banner.update') }}" id="saveBannerForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="banner_id" value="{{ $banner->id }}" />
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="title">Title <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ $banner->title }}" placeholder="Enter Banner Title" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="image">Previous Image <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <img class="form-control" src="{{ asset($banner->image) }}" style="width:120px;height:90px;" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="image">Update Image <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <input type="file" name="image" id="image" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6 offset-md-3">
                                        <label for="status">Status <span class="text-danger text-bold" title="Required Field">*</span></label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="1" @if($banner->status == 1) selected @endif>Show</option>
                                            <option value="2" @if($banner->status == 2) selected @endif>Hide</option>
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
        $("#banner").addClass('active');
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
