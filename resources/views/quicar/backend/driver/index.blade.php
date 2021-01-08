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
                                    <th>Image</th>
                                    <th>Status</th>
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
                                            <td><img src="http://quicarbd.com/{{ $driver->driver_photo }}" style="width:80px;height:60px"/>
                                            <td>{{ $driver->account_status == 1 ? 'Active' : 'Inactive' }} </td>
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="#" class="btn btn-raised btn-info" data-toggle="modal" id="editDriver" data-id="{{ $driver->id }}" data-name="{{ $driver->name }}"
                                                    data-email="{{ $driver->email }}" data-phone="{{ $driver->phone }}" data-dob="{{ $driver->dob }}" data-owner_id="{{ $driver->owner_id }}" data-nid="{{ $driver->nid }}"
                                                    data-district_id="{{ $driver->district_id }}" data-city_id="{{ $driver->city_id }}" data-address="{{ $driver->address }}" data-license="{{ $driver->license }}" data-driver_photo="http://quicarbd.com/{{ $driver->driver_photo }}"
                                                    data-nid_font_pic="http://quicarbd.com/{{ $driver->nid_font_pic }}" data-nid_back_pic="http://quicarbd.com/{{ $driver->nid_back_pic }}" 
                                                    data-license_font_pic="http://quicarbd.com/{{ $driver->license_font_pic }}" data-license_back_pic="http://quicarbd.com/{{ $driver->license_back_pic }}"
                                                    ><i class="fas fa-edit"></i>
                                                </a>
                                                <button class="btn btn-danger" data-toggle="modal" id="deleteDriver" data-target="#deleteDriverModal" data-id="{{ $driver->id }}" title="Delete"><i class="fas fa-trash"></i></button>
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
                                            <option value="{{ $owner->id }}">{{ $owner->name }}</option>
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
                                    <label for="district_id">District <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                    <select name="district_id" id="district_id" class="form-control" required>
                                        <option selected disabled>select</option>
                                        @foreach($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->value }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger districtError"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city_id">City <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <select name="city_id" id="city_id" class="form-control" required>                                      
                                    </select>
                                    <span class="text-danger cityError"></span>
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
                                    <label for="license">License <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                    <input type="text" name="license" id="license" class="form-control" placeholder="License" required>
                                    <span class="text-danger licenseError"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="driver_photo">Driver Photo <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                    <input type="file" name="driver_photo" id="driver_photo" class="form-control" required>
                                    <span class="text-danger driverPhotoError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nid_font_pic">NID Front Image<span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="file" name="nid_font_pic" id="nid_font_pic" class="form-control" required>
                                    <span class="text-danger nidFrontPicError"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nid_back_pic">NID Back Image<span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="file" name="nid_back_pic" id="nid_back_pic" class="form-control" required>
                                    <span class="text-danger nidBackPicError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="license_font_pic">License Front Image<span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="file" name="license_font_pic" id="license_font_pic" class="form-control" required>
                                    <span class="text-danger licenceFrontPicError"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="license_back_pic">License Back Image<span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="file" name="license_back_pic" id="license_back_pic" class="form-control" required>
                                    <span class="text-danger licenseBackPicError"></span>
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
            <form id="editDriverForm" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-content tx-14">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Update Driver</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mg-b-0" style="padding: 2px 15px !important;">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="text" name="name" id="edit_name" class="form-control"placeholder="Enter Name" required>
                                    <input type="hidden" id="edit_id" />
                                    <span class="text-danger nameError"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email </label>
                                    <input type="text" name="email" id="edit_email" class="form-control"placeholder="Enter Email">
                                    <span class="text-danger nameError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="text" name="phone" id="edit_phone" class="form-control"placeholder="Enter Phone" required>
                                    <span class="text-danger phoneError"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dob">Date of Birth <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="text" name="dob" id="edit_dob" class="form-control datePicker" required>
                                    <span class="text-danger dobError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone">Owner <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                    <select id="edit_owner_id" class="form-control" name="owner_id">
                                        @foreach($owners as $owner)
                                            <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger ownerError"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nid">NID <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="text" name="nid" id="edit_nid" class="form-control" placeholder="Enter NID Number" required>
                                    <span class="text-danger nidError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="edit_district_id">District <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                    <select name="district_id" id="edit_district_id" class="form-control" required>
                                        @foreach($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->value }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger districtError"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="edit_city_id">City <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <select name="city_id" id="edit_city_id" class="form-control" required>                                      
                                    </select>
                                    <span class="text-danger cityError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="address">Address <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                    <input type="text" name="address" id="edit_address" class="form-control" placeholder="Enter Address" required>
                                    <span class="text-danger addressError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="license">License <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                    <input type="text" name="license" id="edit_license" class="form-control" placeholder="License" required>
                                    <span class="text-danger licenseError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="image">Current Driver Photo <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                    <img src="" id="previous_driver_photo" style="width:80px;height:80px;"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="image">Update Driver Photo <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                    <input type="file" name="driver_photo" id="edit_driver_photo" class="form-control">
                                    <span class="text-danger imageError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="license">Current NID Front Pic <span class="text-danger text-bold" title="Required Field">*</span></label>  
                                    <img src="" id="previous_nid_font_pic" style="width:80px;height:80px;"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="license">Update NID Front <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="file" name="nid_font_pic" id="edit_nid_font_pic" class="form-control">
                                    <span class="text-danger nidFrontError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="license">Current NID Back Pic <span class="text-danger text-bold" title="Required Field">*</span></label>  
                                    <img src="" id="previous_nid_back_pic" style="width:80px;height:80px;"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="license">Update NID Back <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="file" name="nid_back_pic" id="edit_nid_back_pic" class="form-control">
                                    <span class="text-danger nidBackError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="license">Current License Front <span class="text-danger text-bold" title="Required Field">*</span></label>  
                                    <img src="" id="previous_license_font_pic" style="width:80px;height:80px;"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="license">Update License Front <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="file" name="license_font_pic" id="edit_license_font_pic" class="form-control">
                                    <span class="text-danger licenseFrontError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="license">Current License Back <span class="text-danger text-bold" title="Required Field">*</span></label>  
                                    <img src="" id="previous_license_back_pic" style="width:80px;height:80px;"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="license">Update License Back <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="file" name="license_back_pic" id="edit_license_back_pic" class="form-control">
                                    <span class="text-danger licenseBackError"></span>
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
            </form>
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
        $("#district_id").change(function(){
            var district_id = $(this).val();
            $("#city_id").empty();
            $.get("/admin/hotel/package/get-city/"+ district_id, function( data ) {
                for( var i = 0; i < data.length; i++){
                    $("#city_id").append('<option value="'+ data[i].id +'">'+ data[i].name +'</option>');
                }            
            });
        });
    </script>
@endsection
