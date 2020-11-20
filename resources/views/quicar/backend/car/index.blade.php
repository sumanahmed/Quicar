@extends('quicar.backend.layout.admin')
@section('title','Cars')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Cars</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="carTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Registration No</th>
                                    <th>Owner Name</th>
                                    <th>Owner Phone</th>
                                    <th>Current Status</th>
                                    <th>Image</th>
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="carData">
                                @if(isset($cars) && count($cars) > 0)
                                    @php $i=1; @endphp
                                    @foreach($cars as $car)
                                        <tr class="car-{{ $car->id }}">
                                            <td>{{ $car->carRegisterNumber }}</td>
                                            <td>{{ $car->owner_name }}</td>
                                            <td>{{ $car->owner_phone }}</td>
                                            <td>{{ $car->status == 0 ? 'Off Ride' : 'On Ride' }}</td>
                                            <th><img src="http://quicarbd.com/{{ $car->carImage }}" style="width:80px;height:60px;"/></th>
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="#" class="btn btn-raised btn-success" title="Verify"><i class="fas fa-unlock-alt"></i></a>
                                                <a href="{{ route('backend.car.edit', $car->id) }}" class="btn btn-raised btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('backend.car.details', $car->id) }}" class="btn btn-raised btn-warning" title="Details"><i class="fas fa-eye"></i></a>
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
    <!-- driver details -->
    <div class="modal fade" tabindex="-1" id="driverDetailModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-center text-white w-100">Driver Details</h5>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td id="driver_name"></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td id="driver_phone"></td>
                            </tr>
                            <tr>
                                <th>Current Status</th>
                                <td id="current_status"></td>
                            </tr>
                            <tr>
                                <th>Nid</th>
                                <td id="nid"></td>
                            </tr>
                            <tr>
                                <th>Account Status</th>
                                <td id="account_status"></td>
                            </tr>
                            <tr>
                                <th>License</th>
                                <td><img id="driver_license" style="width:100px;height:60px;"/></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/car.js')}}"></script>
<script>
    $("#car").addClass('active');
</script>    
@endsection
