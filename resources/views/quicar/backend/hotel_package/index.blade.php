@extends('quicar.backend.layout.admin')
@section('title','Hotel Package')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">Hotel Packages</h4>
                            <a href="{{ route('backend.hotel.package.create') }}" class="btn btn-success float-right cursor-pointer"><i data-feather="plus"></i>&nbsp; Add New</a>
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
                                    <th>Status</th>
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="allCarPackage">
                                @if(isset($hotel_packges) && count($hotel_packges) > 0)                                  
                                    @foreach($hotel_packges as $hotel_packge)
                                        <tr class="hotel_packge-{{ $hotel_packge->id }}">
                                            <td>{{ $hotel_packge->hotel_name }}</td>
                                            <td>{{ $hotel_packge->district->value }}</td>
                                            <td>{{ $hotel_packge->city->value }}</td>
                                            <td>{{ $hotel_packge->min_price }}</td>
                                            <td>{{ $hotel_packge->max_price }}</td>
                                            @if($hotel_packge->status == 0)
                                                <td>Pending</td>
                                            @elseif($hotel_packge->status == 1)
                                                <td>Success</td>
                                            @else
                                                <td>Cancel</td>
                                            @endif                                          
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="{{ route('backend.hotel.package.edit', $hotel_packge->id) }}" class="btn btn-raised btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('backend.hotel.package.destroy', $hotel_packge->id) }}" class="btn btn-raised btn-danger" title="Delete"><i class="fas fa-trash-alt"></i></a>
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
        $("#hotel_packge").addClass('active');
    </script>
@endsection
