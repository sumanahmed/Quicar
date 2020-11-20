@extends('quicar.backend.layout.admin')
@section('title','Car Year')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Years</h4>
                            <a class="btn btn-success float-right cursor-pointer" data-toggle="modal" data-target="#createYearModal"><i data-feather="plus"></i>&nbsp; Add New</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="packageTable">
                                <thead class="thead-dark">
                                <tr>                                  
                                    <th>Name</th>                                   
                                    <th>Car Type</th>                                   
                                    <th>Car Model</th>                                   
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="allYear">
                                @if(isset($years) && count($years) > 0)
                                    @foreach($years as $year)
                                        <tr class="Year-{{ $year->id }}">
                                            <td>{{ $year->value }}</td>
                                            <td>{{ $year->car_type_name }}</td>
                                            <td>{{ $year->car_model_name }}</td>
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="#" class="btn btn-raised btn-warning" data-toggle="modal" id="editYear" data-target="#editYearModal" data-id="{{ $year->id }}" data-name="{{ $year->value }}" data-car_type_id="{{ $year->car_type_id }}" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-raised btn-danger" data-toggle="modal" id="deleteYear" data-target="#deleteYearModal" data-id="{{ $year->id }}" title="Delete"><i class="fas fa-trash-alt"></i></a>
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

    <!-- Car Year Create Modal -->
    <div id="createYearModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content tx-14">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add New Car Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mg-b-0" style="padding: 2px 15px !important;">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Name <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" name="name" id="name" class="form-control"placeholder="Enter Year Name" required>
                                <span class="text-danger nameError"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="car_type_name">Car Type <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <select id="car_type_id" name="car_type_id" class="form-control">
                                    @foreach($car_types as $car_type)
                                        <option value="{{ $car_type->id }}">{{ $car_type->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger carTypeError"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="car_model_id">Car Model <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <select id="car_model_id" name="car_model_id" class="form-control">
                                    @foreach($models as $model)
                                        <option value="{{ $model->id }}">{{ $model->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger carModelError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-success tx-13" id="createYear">Save</button>
                            <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Car Year Edit Modal -->
    <div id="editYearModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content tx-14">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Car Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mg-b-0" style="padding: 2px 15px !important;">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Name <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" name="name" id="edit_name" class="form-control"placeholder="Enter Year Name" required>
                                <input type="hidden" id="edit_id" />
                                <span class="text-danger nameError"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="car_type_name">Car Type <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <select id="edit_car_type_id" name="car_type_id" class="form-control">
                                    @foreach($car_types as $car_type)
                                        <option value="{{ $car_type->id }}">{{ $car_type->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger carTypeError"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="edit_car_model_id">Car Model <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <select id="edit_car_model_id" name="edit_car_model_id" class="form-control">
                                    @foreach($models as $model)
                                        <option value="{{ $model->id }}">{{ $model->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger carModelError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-success tx-13" id="updateYear">Update</button>
                            <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Year Modal -->
    <div id="deleteYearModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-danger btn-raised mr-2" id="destroyYear"><i class="fas fa-trash-alt"></i> Proceed</button>
                    <button type="button" class="btn btn-warning btn-raised" data-dismiss="modal" aria-label="Close"><i class="fas fa-backspace"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/year.js')}}"></script>
    <script>
        $("#year").addClass('active');
    </script>    
@endsection
