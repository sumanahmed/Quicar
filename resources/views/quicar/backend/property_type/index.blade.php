@extends('quicar.backend.layout.admin')
@section('title','Property Type')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Property Type</h4>
                            <a class="btn btn-success float-right cursor-pointer" data-toggle="modal" data-target="#createPropertyTypeModal"><i data-feather="plus"></i>&nbsp; Add New</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="propertyTypeTable">
                                <thead class="thead-dark">
                                <tr>                                  
                                    <th>Name</th>                                     
                                    <th>Status</th>                                       
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="allPropertyType">
                                @if(isset($property_types) && count($property_types) > 0)
                                    @foreach($property_types as $property_type)
                                        <tr class="property_type-{{ $property_type->id }}">
                                            <td>{{ $property_type->name }}</td>
                                            <td>{{ $property_type->status == 1 ? 'Enable' : 'Disable' }}</td>
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="#" class="btn btn-raised btn-warning" data-toggle="modal" id="editPropertyType" data-target="#editPropertyTypeModal" data-id="{{ $property_type->id }}" data-name="{{ $property_type->name }}" data-status="{{ $property_type->status }}" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-raised btn-danger" data-toggle="modal" id="deletePropertyType" data-target="#deletePropertyTypeModal" data-id="{{ $property_type->id }}" title="Delete"><i class="fas fa-trash-alt"></i></a>
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
    <div id="createPropertyTypeModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content tx-14">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add New PropertyType</h5>
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
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                                <span class="text-danger districtError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-success tx-13" id="createPropertyType">Save</button>
                            <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Car Class Edit Modal -->
    <div id="editPropertyTypeModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content tx-14">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit PropertyType</h5>
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
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                                <span class="text-danger districtError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-success tx-13" id="updatePropertyType">Update</button>
                            <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Class Modal -->
    <div id="deletePropertyTypeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-danger btn-raised mr-2" id="destroyPropertyType"><i class="fas fa-trash-alt"></i> Proceed</button>
                    <button type="button" class="btn btn-warning btn-raised" data-dismiss="modal" aria-label="Close"><i class="fas fa-backspace"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/property_type.js')}}"></script>
    <script>
        $(".settings").addClass('show');
        $("#propertyType").addClass('active');
    </script>    
@endsection
