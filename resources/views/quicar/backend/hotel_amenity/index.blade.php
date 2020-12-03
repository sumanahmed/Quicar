@extends('quicar.backend.layout.admin')
@section('title','Hotel Amenity')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Hotel Amenity</h4>
                            <a class="btn btn-success float-right cursor-pointer" data-toggle="modal" data-target="#createHotelAmenityModal"><i data-feather="plus"></i>&nbsp; Add New</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="hotelAmenityTable">
                                <thead class="thead-dark">
                                <tr>                                  
                                    <th>Name</th>                                     
                                    <th>Status</th>                                       
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="allHotelAmenity">
                                @if(isset($hotel_amenitys) && count($hotel_amenitys) > 0)
                                    @foreach($hotel_amenitys as $hotel_amenity)
                                        <tr class="hotel_amenity-{{ $hotel_amenity->id }}">
                                            <td>{{ $hotel_amenity->name }}</td>
                                            <td>{{ $hotel_amenity->status == 1 ? 'True' : 'False' }}</td>
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="#" class="btn btn-raised btn-warning" data-toggle="modal" id="editHotelAmenity" data-target="#editHotelAmenityModal" data-id="{{ $hotel_amenity->id }}" data-name="{{ $hotel_amenity->name }}" data-status="{{ $hotel_amenity->status }}" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-raised btn-danger" data-toggle="modal" id="deleteHotelAmenity" data-target="#deleteHotelAmenityModal" data-id="{{ $hotel_amenity->id }}" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">No Data Found</td>
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

    <!-- Car Class Create Modal -->
    <div id="createHotelAmenityModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content tx-14">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add New Hotel Amenity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mg-b-0" style="padding: 2px 15px !important;">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Name <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" name="name" id="name" class="form-control"placeholder="Enter Name" required>
                                <span class="text-danger nameError"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="status">Status<span class="text-danger text-bold" title="Required Field">*</span></label>
                                <select id="status" class="form-control" required>
                                    <option value="1">True</option>
                                    <option value="0">False</option>
                                </select>
                                <span class="text-danger districtError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-success tx-13" id="createHotelAmenity">Save</button>
                            <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Car Class Edit Modal -->
    <div id="editHotelAmenityModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content tx-14">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Hotel Amenity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mg-b-0" style="padding: 2px 15px !important;">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Name <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" name="name" id="edit_name" class="form-control"placeholder="Enter Name" required>
                                <input type="hidden" id="edit_id" />
                                <span class="text-danger nameError"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="edit_status">Status<span class="text-danger text-bold" title="Required Field">*</span></label>
                                <select id="edit_status" class="form-control" required>
                                    <option value="1">True</option>
                                    <option value="0">False</option>
                                </select>
                                <span class="text-danger districtError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-success tx-13" id="updateHotelAmenity">Update</button>
                            <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Class Modal -->
    <div id="deleteHotelAmenityModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-danger btn-raised mr-2" id="destroyHotelAmenity"><i class="fas fa-trash-alt"></i> Proceed</button>
                    <button type="button" class="btn btn-warning btn-raised" data-dismiss="modal" aria-label="Close"><i class="fas fa-backspace"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/hotel_amenity.js')}}"></script>
    <script>
        $(".settings").addClass('show');
        $("#hotelAmenity").addClass('active');
    </script>    
@endsection
