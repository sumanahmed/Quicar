@extends('quicar.backend.layout.admin')
@section('title','Spots')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Car Packages</h4>
                            <a href="{{ route('backend.car.package.create') }}" class="btn btn-success float-right cursor-pointer"><i data-feather="plus"></i>&nbsp; Add New</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="carPackageTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Duration</th>
                                    <th>District</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="allCarPackage">
                                @if(isset($car_packages) && count($car_packages) > 0)                                  
                                    @foreach($car_packages as $car_package)
                                        <tr class="car_package-{{ $car_package->id }}">
                                            <td>{{ $car_package->name }}</td>
                                            <td>{{ $car_package->duration }}</td>
                                            <td>{{ $car_package->district }}</td>
                                            <td>{{ $car_package->price }}</td>
                                            @if($car_package->status == 0)
                                                <td>Pending</td>
                                            @elseif($car_package->status == 1)
                                                <td>Success</td>
                                            @else
                                                <td>Cancel</td>
                                            @endif                                          
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="{{ route('backend.car.package.edit', $car_package->id) }}" class="btn btn-raised btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('backend.car.package.destroy', $car_package->id) }}" class="btn btn-raised btn-danger" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">No Data Found</td>
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
    <script>
        $(".packages").addClass('show');
        $("#car_package").addClass('active');
    </script>
@endsection
