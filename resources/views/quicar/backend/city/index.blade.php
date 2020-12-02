@extends('quicar.backend.layout.admin')
@section('title','Car city')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All city</h4>
                            <a class="btn btn-success float-right cursor-pointer" data-toggle="modal" data-target="#createCityModal"><i data-feather="plus"></i>&nbsp; Add New</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="cityTable">
                                <thead class="thead-dark">
                                <tr>                                  
                                    <th>Name</th>                                     
                                    <th>Name(Bn)</th>                                     
                                    <th>District</th>                                     
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="allCity">
                                @if(isset($citys) && count($citys) > 0)
                                    @foreach($citys as $city)
                                        <tr class="city-{{ $city->id }}">
                                            <td>{{ $city->name }}</td>
                                            <td>{{ $city->bn_name }}</td>
                                            <td>{{ $city->district_name }}</td>
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="#" class="btn btn-raised btn-warning" data-toggle="modal" id="editCity" data-target="#editCityModal" data-id="{{ $city->id }}" data-name="{{ $city->name }}" data-bn_name="{{ $city->bn_name }}" data-district_id="{{ $city->district_id }}" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-raised btn-danger" data-toggle="modal" id="deleteCity" data-target="#deleteCityModal" data-id="{{ $city->id }}" title="Delete"><i class="fas fa-trash-alt"></i></a>
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

    <!-- Car Class Create Modal -->
    <div id="createCityModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content tx-14">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add New city</h5>
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
                                <label for="bn_name">Name (Bn)<span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" name="bn_name" id="bn_name" class="form-control"placeholder="Enter Name in Bangla" required>
                                <span class="text-danger nameBnError"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="district_id">District<span class="text-danger text-bold" title="Required Field">*</span></label>
                                <select id="district_id" class="form-control" required>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger districtError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-success tx-13" id="createCity">Save</button>
                            <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Car Class Edit Modal -->
    <div id="editCityModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content tx-14">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit city</h5>
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
                                <label for="edit_bn_name">Name (Bn)<span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" name="edit_bn_name" id="edit_bn_name" class="form-control"placeholder="Enter Name in Bangla" required>
                                <span class="text-danger nameBnError"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="edit_district_id">District<span class="text-danger text-bold" title="Required Field">*</span></label>
                                <select id="edit_district_id" class="form-control" required>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger districtError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-success tx-13" id="updateCity">Update</button>
                            <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Class Modal -->
    <div id="deleteCityModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-danger btn-raised mr-2" id="destroyCity"><i class="fas fa-trash-alt"></i> Proceed</button>
                    <button type="button" class="btn btn-warning btn-raised" data-dismiss="modal" aria-label="Close"><i class="fas fa-backspace"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/city.js')}}"></script>
    <script>
        $(".settings").addClass('show');
        $("#city").addClass('active');
    </script>    
@endsection
