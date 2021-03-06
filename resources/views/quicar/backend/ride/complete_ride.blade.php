@extends('quicar.backend.layout.admin')
@section('title','Complete Ride')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Complete Rides</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="completeRideTable">
                                <thead class="thead-dark">
                                    <tr>                                       
                                        <th style="width:20%">Starting Address</th>
                                        <th style="width:20%">Destination Address</th>
                                        <th style="width:10%">Starting Date & Time</th>
                                        <th style="width:10%">User Location</th>
                                        <th style="width:10%">Status</th>                                        
                                        <th style="width:20%" style="vertical-align: middle;text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="allCurrentRide">
                                @if(isset($rides) && count($rides) > 0)
                                    @foreach($rides as $ride)                                       
                                        <tr class="current-ride-{{ $ride->id }}">                                            
                                            <td>{{ $ride->district->value }}, {{ $ride->city->name }}, {{ $ride->startig_area }}</td>
                                            <td>{{ $ride->destinationDistrict->value }}, {{ $ride->destinationCity->name }}, {{ $ride->destination_area }}</td>                                                                                        
                                            <td>{{ date('d.m.Y', strtotime($ride->staring_date)) }} at {{ date('H:i:s a', strtotime($ride->staring_time)) }}</td>
                                            <td>{{ $ride->user_location }}</td>    
                                            @if($ride->status == 1)                                        
                                                <td>Waiting for bit</td>
                                            @elseif($ride->status == 3)
                                                <td>Start Request</td>
                                            @else   
                                                <td>Bit Accepted</td>
                                            @endif
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="{{ route('backend.ride.bitting', $ride->id) }}" class="btn btn-raised btn-success btn-sm" title="Bidding"><i class="fas fa-list"></i></a>                                               
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
<script src="{{ asset('quicar/backend/js/ride.js')}}"></script>
    <script>
        $(".menu-ride-dropdown").addClass('show');
        $("#complete_ride").addClass('active');
        $('#completeRideTable').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });
    </script>
@endsection
