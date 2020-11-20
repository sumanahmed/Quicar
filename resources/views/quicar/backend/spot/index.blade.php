@extends('quicar.backend.layout.admin')
@section('title','Spots')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Spots</h4>
                            <a class="btn btn-success float-right cursor-pointer" data-toggle="modal" data-target="#createSpotModal"><i data-feather="plus"></i>&nbsp; Add New</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="SpotTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Name(Bn)</th>
                                    <th>District</th>
                                    <th>Address</th>
                                    <th>Image</th>
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="allSpot">
                                @if(isset($spots) && count($spots) > 0)                                  
                                    @foreach($spots as $spot)
                                        <tr class="spot-{{ $spot->id }}">
                                            <td>{{ $spot->name }}</td>
                                            <td>{{ $spot->bn_name }}</td>
                                            <td>{{ $spot->district_name }}</td>
                                            <td>{{ $spot->address }}</td>
                                            <td><img src="http://quicarbd.com/{{ $spot->image }}" style="width:80px;height:60px"/>                                            
                                            <td style="vertical-align: middle;text-align: center;">
                                                <buttton class="btn btn-raised btn-warning" data-toggle="modal" id="editSpot" data-target="#editSpotModal" data-id="{{ $spot->id }}" data-district_id="{{ $spot->district_id }}" data-name="{{ $spot->name }}" data-bn_name="{{ $spot->bn_name }}" data-address="{{ $spot->address }}" data-image="{{ $spot->image }}" title="Edit"><i class="fas fa-edit"></i></buttton>
                                                <buttton class="btn btn-raised btn-danger" data-toggle="modal" id="deleteSpot" data-target="#deleteSpotModal" data-id="{{ $spot->id }}" title="Delete"><i class="fas fa-trash-alt"></i></buttton>
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
     <!-- Spot Create Modal -->
    <div id="createSpotModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="createSpotForm" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-content tx-14">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Add New Tour Spot</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mg-b-0" style="padding: 2px 15px !important;">  
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" name="name" id="name" class="form-control"placeholder="Enter Name in English" required>
                                <span class="text-danger nameError"></span>
                            </div>
                            <div class="form-group">
                                <label for="name">Name(Bn) <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" name="name" id="bn_name" class="form-control"placeholder="Enter Name in Bangla" required>
                                <span class="text-danger nameBnError"></span>
                            </div>
                            <div class="form-group">
                                <label for="district_id">District <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                <select id="district_id" class="form-control" name="district_id">
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger districtError"></span>
                            </div>
                            <div class="form-group ">
                                <label for="address">Address <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" required>
                                <span class="text-danger addressError"></span>
                            </div>
                            <div class="form-group">
                                <label for="image">Image <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                <input type="file" name="image" id="image" class="form-control" required>
                                <span class="text-danger imageError"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group ">
                            <button type="button" class="btn btn-success tx-13" id="createSpot">Save</button>
                            <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Spot Edit Modal -->
    <div id="editSpotModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editSpotForm" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-content tx-14">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Update Spot</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mg-b-0" style="padding: 2px 15px !important;">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" name="name" id="edit_name" class="form-control"placeholder="Enter Name in English" required>
                                <input type="hidden" id="edit_id" />
                                <span class="text-danger nameError"></span>
                            </div>
                            <div class="form-group">
                                <label for="name">Name(Bn) <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" name="edit_bn_name" id="edit_bn_name" class="form-control"placeholder="Enter Name in Bangla" required>
                                <span class="text-danger nameBnError"></span>
                            </div>
                            <div class="form-group">
                                <label for="edit_district_id">District <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                <select id="edit_district_id" class="form-control" name="edit_district_id">
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger districtError"></span>
                            </div>                           
                            <div class="form-group ">
                                <label for="address">Address <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                <input type="text" name="address" id="edit_address" class="form-control" placeholder="Enter Address" required>
                                <span class="text-danger addressError"></span>
                            </div>                           
                            <div class="form-group">
                                <label for="image">Previous Image <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                <img src="" id="previous_image" style="width:80px;height:80px;"/>
                            </div>
                            <div class="form-group">
                                <label for="image">Update Image <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                <input type="file" name="image" id="edit_image" class="form-control">
                                <span class="text-danger imageError"></span>
                            </div>                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group ">
                            <button type="button" class="btn btn-success tx-13" id="updateSpot">Update</button>
                            <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Spot Delete Modal -->
    <div id="deleteSpotModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-danger btn-raised mr-2" id="destroySpot"><i class="fas fa-trash-alt"></i> Proceed</button>
                    <button type="button" class="btn btn-warning btn-raised" data-dismiss="modal" aria-label="Close"><i class="fas fa-backspace"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/spot.js')}}"></script>
    <script>
        $(".settings").addClass('show');
        $("#spot").addClass('active');
    </script>
@endsection
