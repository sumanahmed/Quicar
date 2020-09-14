@extends('quicar.backend.layout.admin')
@section('title','Package')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Package</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="packageTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Owner</th>
                                    <th>Car</th>
                                    <th>Price</th>
                                    <th>Type</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="packageData">
                                @if(isset($packages) && count($packages) > 0)
                                    @php $i=1; @endphp
                                    @foreach($packages as $package)
                                        <tr class="package-{{ $package->id }}">
                                            <td>{{ $package->name }}</td>
                                            <td>{{ $package->owner->name }}</td>
                                            <td>{{ $package->car->name }}</td>
                                            <td>{{ $package->price }}</td>
                                            @if($package->type == 1)
                                                <td>Daily</td>
                                            @elseif($package->type == 2)
                                                <td>Weekly</td>
                                            @else
                                                <td>Monthly</td>
                                            @endif
                                            <td>{{ date('Y-m-d', strtotime($package->start)) }}</td>
                                            <td>{{ date('Y-m-d', strtotime($package->end)) }}</td>
                                            <td><img src="{{ asset($package->image) }}" style="width:100px;height:50px"/></td>
                                            <td><?php echo $package->status == 1 ? "Show" : "Hide"; ?></td>
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="{{ route('backend.package.edit',$package->id) }}" class="btn btn-raised btn-info"><i class="fas fa-edit"></i></a>
                                                <button value="{{ $package->id }}" class="btn btn-raised btn-danger delete_modal"><i class="fas fa-trash-alt"></i></button>
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
    <!-- Delete User Modal -->
    <div id="deletePackageModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="del_id"/>
                    <button type="button" class="btn btn-danger btn-raised mr-2" id="packageDelete"><i class="fas fa-trash-alt"></i> Proceed</button>
                    <button type="button" class="btn btn-warning btn-raised" data-dismiss="modal" aria-label="Close"><i class="fas fa-backspace"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/package.js')}}"></script>
    <script>
        $("#package").addClass('active');
    </script>
@endsection
