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
                            <div class="table-responsive">
                                <table class="table table-bordered" id="packageTable" style="width:100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="width:20%">Name</th>
                                            <th style="width:15%">Owner</th>
                                            <th style="width:10%">Price</th>
                                            <th style="width:10%">Type</th>
                                            <th style="width:15%">Image</th>
                                            <th style="width:15%">Status</th>
                                            <th style="width:15%;vertical-align: middle;text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="packageData">
                                        @if(isset($packages) && count($packages) > 0)
                                            @php $i=1; @endphp
                                            @foreach($packages as $package)
                                                @php  
                                                    $owner = \App\Model\Owner::select('name','phone')->where('api_token', $package->owner_id)->first();
                                                @endphp                                    
                                                <tr class="package-{{ $package->id }}">
                                                    <td>{{ $package->name }}</td>
                                                    <td>
                                                        <a href="#" data-toggle="modal" data-target="showOwnerModal" data-owner_name="{{ $owner->name }}" data-owner_phone="{{ $owner->phone }}">
                                                            {{ $owner->name }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $package->amount }}</td>                        
                                                    <td>{{ $package->trip_type }}</td>                        
                                                    <td><img src="http://quicarbd.com/{{ $package->img }}" style="width:60px;height:50px"/></td>
                                                    <td><?php echo $package->status == 1 ? "Package Off" : "Package On"; ?></td>
                                                    <td style="vertical-align: middle;text-align: center;">
                                                        @if($package->home_package_id == null)
                                                            <a href="#" class="btn btn-success package_add_remove" data-toggle="modal" data-target="#packageAddModal" data-id="{{ $package->id }}" data-title="{{ $package->name }}" data-des="{{ $package->detail }}" data-status="1" title="Add Package"><i class="fas fa-check"></i></a>
                                                        @else
                                                            <a href="#" class="btn btn-warning package_add_remove" data-toggle="modal" data-target="#packageRemoveModal" data-id="{{ $package->id }}" data-title="{{ $package->name }}" data-des="{{ $package->detail }}" data-status="0" title="Remove Package"><i class="fas fa-times"></i></a>
                                                        @endif
                                                        <button value="{{ $package->id }}" class="btn btn-raised btn-danger delete_modal"><i class="fas fa-trash-alt"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">No Data Found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
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
