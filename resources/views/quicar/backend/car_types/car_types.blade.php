@extends('quicar.backend.layout.admin')
@section('title','Car Types')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Car Types</h4>
                            <a class="btn btn-success float-right cursor-pointer" href="{{ route('backend.car_types.create') }}"><i data-feather="plus"></i>&nbsp; Add New</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="carTypeTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Name(Bn)</th>
                                    <th>Image</th>
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="carTypeData">
                                @if(isset($car_types) && count($car_types) > 0)
                                    @php $i=1; @endphp
                                    @foreach($car_types as $car_type)
                                        <tr class="car_type-{{ $car_type->id }}">
                                            <td>{{ $car_type->name }}</td>
                                            <td>{{ $car_type->bn_name }}</td>
                                            <td><img src="{{ asset($car_type->image) }}" style="width:100px;height:80px"/></td>
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="{{ route('backend.car_types.edit', $car_type->id) }}" class="btn btn-raised btn-info"><i class="fas fa-edit"></i></a>
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
<script src="{{ asset('quicar/backend/js/car-type.js')}}"></script>
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
