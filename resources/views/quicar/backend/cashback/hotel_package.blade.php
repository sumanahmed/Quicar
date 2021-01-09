@extends('quicar.backend.layout.admin')
@section('title','Cashback Hotel Package')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Hotel Packages</h4>
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
                                            <label>Hotel Name</label>
                                            <input type="text" name="hotel_name" class="form-control" placeholder="Hotel Name" @if(isset($_GET['hotel_name'])) value="{{ $_GET['hotel_name'] }}" @endif />
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
                                    <th>Name</th>
                                    <th>District</th>
                                    <th>City</th>
                                    <th>Min Price</th>
                                    <th>Max Price</th>
                                    <th>Cashback</th>
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="allCarPackage">
                                @if(isset($hotel_packages) && count($hotel_packages) > 0)                                  
                                    @foreach($hotel_packages as $hotel_package)
                                        <tr class="hotel_package-{{ $hotel_package->id }}">
                                            <td>{{ $hotel_package->hotel_name }}</td>
                                            <td>{{ $hotel_package->district_name }}</td>
                                            <td>{{ $hotel_package->city_name }}</td>
                                            <td>{{ $hotel_package->min_price }}</td>
                                            <td>{{ $hotel_package->max_price }}</td>       
                                            <td>{{ $hotel_package->cash_back_price }}</td>       
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="#" id="addCashback" data-toggle="modal" class="btn btn-raised btn-warning" title="Add Cashback">Add Cashback</a>
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
    <div id="addCashbackModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content tx-14">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add Cashback Amount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mg-b-0" style="padding: 2px 15px !important;">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="cash_back_price">Cash Back Price <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" name="cash_back_price" id="cash_back_price" class="form-control"placeholder="Enter Cash Back Price" required>
                                <span class="text-danger cashBackPriceError"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="cash_back_staring_time">Cash Back Start Time <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="time" name="cash_back_staring_time" id="cash_back_staring_time" class="form-control" placeholder="Enter Name in Bangla" required>
                                <span class="text-danger startTimeError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-success tx-13" id="saveCashBack">Save</button>
                            <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(".packages").addClass('show');
        $("#hotel_package").addClass('active');
    </script>
@endsection
