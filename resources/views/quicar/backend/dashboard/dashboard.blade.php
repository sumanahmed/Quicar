@extends('quicar.backend.layout.admin')
@section('title','Dashboard')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">

                <div class="col-sm-6 col-lg-2">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total User</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $total_user }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Partner</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $total_owner }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Driver</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $total_driver }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Car</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $total_car }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Inactive Car</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $total_inactive_car }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Active Car</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $total_active_car }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2 mt-2">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Complete Ride</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $total_complete_ride }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2 mt-2">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Cancel Ride</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $total_cancel_ride }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2 mt-2">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Pending Ride</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $total_pending_ride }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2 mt-2">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Current Ride</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $total_current_ride }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2 mt-2">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Schedule Ride</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $total_schedule_ride }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2 mt-2">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Package Ride</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $total_package_ride }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2 mt-2">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Package</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $total_package }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2 mt-2">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Active Package</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $total_active_package }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2 mt-2">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Pending Package</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $total_pending_package }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2 mt-2">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Income</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">BDT {{ $total_income }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2 mt-2">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Quicar Commission</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">BDT 00</h3>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>
@endsection
@section('scripts')
    <script>
        $("#dashboard").addClass('active');
    </script>
@endsection
