@extends('quicar.backend.layout.admin')
@section('title','Banner')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Banner</h4>
                            <a class="btn btn-success float-right cursor-pointer" href="{{ route('backend.banner.create') }}"><i data-feather="plus"></i>&nbsp; Add New</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="carTypeTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="bannerData">
                                @if(isset($banners) && count($banners) > 0)
                                    @php $i=1; @endphp
                                    @foreach($banners as $banner)
                                        <tr class="banner-{{ $banner->id }}">
                                            <td>{{ $banner->title }}</td>
                                            <td><img src="{{ asset($banner->image) }}" style="width:100px;height:50px"/></td>
                                            <td><?php echo $banner->status == 1 ? "Show" : "Hide"; ?></td>
                                            <td style="vertical-align: middle;text-align: center;">
                                                <button value="{{ $banner->id }}" class="btn btn-raised btn-info edit_modal"><i class="fas fa-edit"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">No Data Found</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
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
