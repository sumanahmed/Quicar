@extends('quicar.backend.layout.admin')
@section('title','Cashback Travel Package')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Travel Packages</h4>
                        </div>
                        <div class="card-header">
                            <form action="" method="GET">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Partner Mobile</label>
                                            <input type="text" name="phone" class="form-control" placeholder="Partner mobile no" @if(isset($_GET['phone'])) value="{{ $_GET['phone'] }}" @endif />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tour Name</label>
                                            <input type="text" name="tour_name" class="form-control" placeholder="Tour Name" @if(isset($_GET['tour_name'])) value="{{ $_GET['tour_name'] }}" @endif />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success float-right cursor-pointer mt-28" value="Filter">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="carPackageTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Tour Name</th>
                                    <th>Organizer</th>
                                    <th>District</th>
                                    <th>Cashback</th>
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="allCarPackage">
                                    @if(isset($travel_packages) && count($travel_packages) > 0)                                  
                                        @foreach($travel_packages as $travel_package)
                                            <tr class="hotel_package-{{ $travel_package->id }}">
                                                <td>{{ $travel_package->tour_name }}</td>
                                                <td>{{ $travel_package->organizer_name }}, {{ $travel_package->organizer_phone }}</td>
                                                <td>{{ $travel_package->district_name }}</td>    
                                                <td>{{ $travel_package->cash_back_price }}</td>       
                                                <td style="vertical-align: middle;text-align: center;">
                                                    <a href="#" id="addCashback" data-toggle="modal" class="btn btn-raised btn-warning" title="Add Cashback">Add Cashback</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">No Data Found</td>
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
        $("#hotel_package").addClass('active');
    </script>
@endsection
