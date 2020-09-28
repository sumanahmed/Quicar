@extends('quicar.backend.layout.admin')
@section('title','Drivers')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Drivers</h4>
                            <a class="btn btn-success float-right cursor-pointer" data-toggle="modal" data-target="#createDriverModal"><i data-feather="plus"></i>&nbsp; Add New</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="driverTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="allDriver">
                                @if(isset($drivers) && count($drivers) > 0)
                                    @php $i=1; @endphp
                                    @foreach($drivers as $driver)
                                        <tr class="driver-{{ $driver->id }}">
                                            <td>{{ $driver->name }}</td>
                                            <td>{{ $driver->email }}</td>
                                            <td>{{ $driver->phone }}</td>
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="#" class="btn btn-raised btn-info"><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">No Data Found</td>
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
     <!-- Driver Create Modal -->
    <div id="createDriverModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="createDriverForm" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-content tx-14">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Add New Driver</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mg-b-0" style="padding: 2px 15px !important;">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control"placeholder="Enter Name" required>
                                    <span class="text-danger nameError"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email </label>
                                    <input type="text" name="email" id="email" class="form-control"placeholder="Enter Email">
                                    <span class="text-danger nameError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="text" name="phone" id="phone" class="form-control"placeholder="Enter Phone" required>
                                    <span class="text-danger phoneError"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dob">Date of Birth <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="text" name="dob" id="dob" class="form-control datePicker" required>
                                    <span class="text-danger dobError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone">Owner <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                    <select id="owner_id" class="form-control" name="owner_id">
                                        @foreach($owners as $owner)
                                            <option value="{{ $owner->api_token }}">{{ $owner->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger ownerError"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nid">NID <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="text" name="nid" id="nid" class="form-control" placeholder="Enter NID Number" required>
                                    <span class="text-danger nidError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="division">Division <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                    <input type="text" name="division" id="division" class="form-control" placeholder="Enter Division" required>
                                    <span class="text-danger divisionError"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="district">District <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="text" name="district" id="district" class="form-control" placeholder="Enter District" required>
                                    <span class="text-danger districtError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="address">Address <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" required>
                                    <span class="text-danger addressError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="image">Image <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                    <input type="file" name="image" id="image" class="form-control" required>
                                    <span class="text-danger imageError"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="license">License <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="file" name="license" id="license" class="form-control" required>
                                    <span class="text-danger licenseError"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="button" class="btn btn-success tx-13" id="createDriver">Save</button>
                                <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Driver Edit Modal -->
    <div id="editDriverModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content tx-14">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Car Driver</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mg-b-0" style="padding: 2px 15px !important;">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Name <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" name="name" id="edit_name" class="form-control"placeholder="Enter Driver Name" required>
                                <input type="hidden" id="edit_id" />
                                <span class="text-danger nameError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-success tx-13" id="updateDriver">Update</button>
                            <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Driver Delete Modal -->
    <div id="deleteDriverModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-danger btn-raised mr-2" id="destroyDriver"><i class="fas fa-trash-alt"></i> Proceed</button>
                    <button type="button" class="btn btn-warning btn-raised" data-dismiss="modal" aria-label="Close"><i class="fas fa-backspace"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/driver.js')}}"></script>
    <script>
        $("#driver").addClass('active');
    </script>
@endsection
