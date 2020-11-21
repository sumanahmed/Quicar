@extends('quicar.backend.layout.admin')
@section('title','Car Year')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">Add Car Years</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post" action="{{ route('backend.car.year.store') }}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="name">Name <span class="text-danger text-bold" title="Required Field">*</span></label>                                        
                                                <select id="name" name="name[]" class="form-control selectable" multiple required>
                                                    @foreach($years as $year)
                                                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                    @endforeach
                                                </select>
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
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="car_model_id"></label>
                                                <input type="submit" class="btn btn-success" value="Submit" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/car_year.js')}}"></script>
    <script>
        $(".settings").addClass('show');
        $("#year").addClass('active');
    </script>    
@endsection
