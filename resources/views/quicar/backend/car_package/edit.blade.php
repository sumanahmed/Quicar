@extends('quicar.backend.layout.admin')
@section('title','Car Package')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('backend.car.package.update', $car_package->id) }}" method="post" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mt-2 tx-spacing--1 float-left">Edit Car Package</h4>
                            </div>
                            <div class="card-body">                                
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name">Package Name <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{ $car_package->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="owner_id">Partner <span class="text-danger" title="Required">*</span></label>                                            
                                            <select id="owner_id" name="owner_id" class="form-control selectable" required>
                                                @foreach($owners as $owner)
                                                    <option value="{{ $owner->id }}" @if($owner->id ==  $car_package->owner_id) selected @endif>{{ $owner->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger errorYear"></span>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="car_id">Car ID <span class="text-danger" title="Required">*</span></label>                                            
                                            <select class="form-control" name="car_id" id="car_id" required> 
                                                @foreach($cars as $car)
                                                    <option value="{{ $car->id }}">{{ $car->carRegisterNumber }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">                                        
                                        <div class="form-group">
                                            <label for="duration"> Duration <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="duration" name="duration" class="form-control"  value="{{ $car_package->duration }}" required>
                                        </div>
                                    </div>
                                    <div class="col-6">                                        
                                        <div class="form-group">
                                            <label for="details"> Details <span class="text-danger" title="Required">*</span></label>                                            
                                            <textarea class="form-control" id="details" name="details" placeholder="Details" rows="3" required>{{ $car_package->details }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">                                        
                                        <div class="form-group">
                                            <label for="facilities"> Factilites <span class="text-danger" title="Required">*</span></label>                                            
                                            <textarea class="form-control" id="facilities" name="facilities" placeholder="Facilites" rows="3" required>{{ $car_package->facilities }}</textarea>
                                        </div>
                                    </div>                                    
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="district_id">District <span class="text-danger" title="Required">*</span></label>
                                            <select id="district_id" name="district_id" class="form-control selectable" required>
                                                <option selected disabled>Select</option>
                                                @foreach($districts as $district)
                                                    <option value="{{ $district->id }}" @if($district->id ==  $car_package->district_id) selected @endif>{{ $district->value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="spot_id">Tour Spot <span class="text-danger" title="Required">*</span></label>                                            
                                            <select id="spot_id" name="spot_id[]" class="form-control selectable" multiple required>                                                
                                                @foreach($spots as $spot)
                                                    <option value="{{ $spot->id }}" selected>{{ $spot->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger errorYear"></span>
                                        </div>
                                    </div>
                                    <div class="col-3">                                        
                                        <div class="form-group">
                                            <label for="starting_location"> Starting Location <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="starting_location" name="starting_location" class="form-control" value="{{ $car_package->starting_location }}" required>
                                        </div>
                                    </div>
                                    <div class="col-3">                                        
                                        <div class="form-group">
                                            <label for="total_person"> Total Person <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="total_person" name="total_person" class="form-control" value="{{ $car_package->total_person }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                        </div>
                                    </div>                                    
                                    <div class="col-3">                                        
                                        <div class="form-group">
                                            <label for="quicar_charge"> Quicar Charge(%) <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="quicar_charge" name="quicar_charge" class="form-control" value="{{ $car_package->quicar_charge }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-3">                                        
                                        <div class="form-group">
                                            <label for="price"> Price <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="price" name="price" class="form-control" oninput="calculateCharge()" value="{{ $car_package->price }}" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="owner_get">Owner Get <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="owner_get" name="owner_get" class="form-control" value="{{ $car_package->owner_get }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-3">                                        
                                        <div class="form-group">
                                            <label for="status"> Status <span class="text-danger" title="Required">*</span></label>
                                            <select id="status" name="status" class="form-control" required>  
                                                <option value="0" @if($car_package->status == 0) selected @endif>Pending</option>
                                                <option value="1" @if($car_package->status == 1) selected @endif>Success</option>
                                                <option value="2" @if($car_package->status == 2) selected @endif>Cancel</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">                                        
                                        <div class="form-group">
                                            <label for="status_message"> Status Message <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="status_message" name="status_message" class="form-control" value="{{ $car_package->status_message }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">                                        
                                        <div class="form-group">
                                            <label for="terms_condition"> Terms Condition <span class="text-danger" title="Required">*</span></label>                                            
                                            <textarea class="form-control" id="terms_condition" name="terms_condition" placeholder="Terms Condition" rows="3">{{ $car_package->terms_condition }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success" value="Update"/>
                                            <input type="reset" class="btn btn-danger" value="Cancel"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </div>
@endsection
@section('scripts')
<script>
    $(".packages").addClass('show');
    $("#car_package").addClass('active');
    $("#district_id").change(function(){
        var district_id = $(this).val();
        $("#spot_id").empty();
        $.get("/admin/car/package/district/spot/"+ district_id, function( data ) {
            for( var i = 0; i < data.length; i++){
                $("#spot_id").append('<option value="'+ data[i].id +'">'+ data[i].name +'</option>');
            }            
        });
    });
    $("#owner_id").change(function(){
        var owner_id = $(this).val();
        $("#car_id").empty();
        $.get("/get-car/"+ owner_id, function( data ) {
            for( var i = 0; i < data.length; i++){
                $("#car_id").append('<option value="'+ data[i].id +'">'+ data[i].carRegisterNumber +'</option>');
            }            
        });
    });
    function calculateCharge(){
        var quicar_charge = $("#quicar_charge").val();
        var price         = $("#price").val();
        var owner_get     = parseFloat(price - (price * quicar_charge/100));
        $("#owner_get").val(owner_get);
    }
</script>    
@endsection
