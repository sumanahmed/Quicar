@extends('quicar.backend.layout.admin')
@section('title','Travel Package')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">Travel Packages</h4>
                            <a href="{{ route('backend.travel.package.create') }}" class="btn btn-success float-right cursor-pointer"><i data-feather="plus"></i>&nbsp; Add New</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="carPackageTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Tour Name</th>
                                    <th>Organizer</th>
                                    <th>District</th>
                                    <th>Status</th>
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
                                                @if($travel_package->status == 0)
                                                    <td>Pending</td>
                                                @elseif($travel_package->status == 1)
                                                    <td>Success</td>
                                                @else
                                                    <td>Cancel</td>
                                                @endif                                          
                                                <td style="vertical-align: middle;text-align: center;">
                                                    <a href="{{ route('backend.travel.package.edit', $travel_package->id) }}" class="btn btn-raised btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('backend.travel.package.destroy', $travel_package->id) }}" class="btn btn-raised btn-danger" title="Delete"><i class="fas fa-trash-alt"></i></a>
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
