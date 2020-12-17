@extends('quicar.backend.layout.admin')
@section('title','Ride Bitting')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Bitting</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>                                       
                                        <th style="width:20%">Partner</th>
                                        <th style="width:20%">Car</th>
                                        <th style="width:20%">Bit Amount</th>
                                        <th style="width:10%">Quicar Charge</th>
                                        <th style="width:10%">Owner Get</th>
                                        <th style="width:10%">Ride Start</th>                                        
                                        <th style="width:10%">Ride End</th>                                        
                                        <th style="width:10%">Status</th>                                        
                                        <th style="width:10%">Start Status</th>                                        
                                        <th style="width:20%" style="vertical-align: middle;text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="allCurrentRide">
                                @if(isset($ride_bittings) && count($ride_bittings) > 0)
                                    @foreach($ride_bittings as $ride_bitting)                                       
                                        <tr>                                            
                                            <td>{{ $ride_bitting->owner->name }}, {{ $ride_bitting->owner->phone }}</td>
                                            <td>{{ $ride_bitting->car_id !=0 ? $ride_bitting->car->carRegisterNumber : '' }}</td>
                                            <td>{{ $ride_bitting->bit_amount }}</td>                                                                                        
                                            <td>{{ $ride_bitting->quicar_charge }}</td>                                                                                        
                                            <td>{{ $ride_bitting->you_get }}</td>                                                                                                                                      
                                            <td>{{ $ride_bitting->ride_start_time }}</td>                                                                                                                                      
                                            <td>{{ $ride_bitting->ride_finished_time }}</td>                                                                                                                                      
                                            @if($ride_bitting->status == 0)                                        
                                                <td>Request Send</td>
                                            @elseif($ride_bitting->status == 1)
                                                <td>Request Accept</td>
                                            @elseif($ride_bitting->status == 2)
                                                <td>Cancel Request</td>
                                            @else   
                                                <td>Completed</td>
                                            @endif
                                            @if($ride_bitting->startStatus == 0)                                        
                                                <td>Waiting</td>
                                            @elseif($ride_bitting->startStatus == 1)
                                                <td>Start</td>
                                            @else   
                                                <td>Finished</td>
                                            @endif
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="{{ route('backend.ride.bitting.destroy', $ride_bitting->id) }}" class="btn btn-raised btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10" class="text-center">No Data Found</td>
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
        $(".menu-ride-dropdown").addClass('show');
        $("#current_ride").addClass('active');
    </script>
@endsection
