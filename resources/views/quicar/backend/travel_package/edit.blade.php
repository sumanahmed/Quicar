@extends('quicar.backend.layout.admin')
@section('title','Travel Package')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('backend.travel.package.update', $travel_package->id) }}" method="post" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mt-2 tx-spacing--1 float-left">Create Travel Package</h4>
                            </div>
                            <div class="card-body">                                
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="tour_name">Tour Name <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="tour_name" name="tour_name" class="form-control" value="{{ $travel_package->tour_name }}" placeholder="Tour Name" required>
                                            @if($errors->has('tour_name'))
                                                <span class="text-danger"> {{ $errors->first('tour_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="organizer_name">Organizer Name <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="organizer_name" name="organizer_name" class="form-control" value="{{ $travel_package->organizer_name }}" placeholder="Organizer Name" required>
                                            @if($errors->has('organizer_name'))
                                                <span class="text-danger"> {{ $errors->first('organizer_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="organizer_phone">Organizer Phone <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="organizer_phone" name="organizer_phone" class="form-control" value="{{ $travel_package->organizer_phone }}" placeholder="Organizer Phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                            @if($errors->has('organizer_phone'))
                                                <span class="text-danger"> {{ $errors->first('organizer_phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="district_id">District <span class="text-danger" title="Required">*</span></label>
                                            <select id="district_id" name="district_id" class="form-control selectable" required>
                                                @foreach($districts as $district)
                                                    <option value="{{ $district->id }}" @if($travel_package->district_id == $district->id) seleted @endif>{{ $district->value }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('district_id'))
                                                <span class="text-danger"> {{ $errors->first('district_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="spot_ids">Tour Spot <span class="text-danger" title="Required">*</span></label>                                            
                                            <select id="spot_ids" name="spot_ids[]" class="form-control selectable" multiple value="{{ old('spot_ids') }}" required>                                                
                                                @foreach($spots as $spot)                                              
                                                    <option value="{{ $spot->id }}" @if(in_array($spot->id, json_decode($travel_package->spot_ids))) selected @endif>{{ $spot->name }}</option>
                                                @endforeach 
                                            </select>
                                            <span class="text-danger errorYear"></span>
                                        </div>
                                    </div>
                                    <div class="col-3">                                        
                                        <div class="form-group">
                                            <label for="starting_location"> Starting Location <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="starting_location" name="starting_location" class="form-control" value="{{ $travel_package->starting_location }}" placeholder="Starting Location" required>
                                        </div>
                                    </div>
                                    <div class="col-3">                                        
                                        <div class="form-group">
                                            <label for="starting_address"> Starting Address <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="starting_address" name="starting_address" class="form-control" value="{{ $travel_package->starting_address }}" placeholder="Starting Address" required>
                                        </div>
                                    </div>
                                    <div class="col-3">                                        
                                        <div class="form-group">
                                            <label for="day_night"> Day Night <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="day_night" name="day_night" class="form-control" placeholder="Day Night" value="{{ $travel_package->day_night }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                        </div>
                                    </div>
                                    <div class="col-3">                                        
                                        <div class="form-group">
                                            <label for="total_person"> Total Person <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="total_person" name="total_person" class="form-control" value="{{ $travel_package->total_person }}" placeholder="Total Person" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                        </div>
                                    </div>
                                    <div class="col-3">                                        
                                        <div class="form-group">
                                            <label for="added_person"> Added Person <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="added_person" name="added_person" class="form-control" value="{{ $travel_package->added_person }}" placeholder="Added Person" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                        </div>
                                    </div>
                                    <div class="col-3">                                        
                                        <div class="form-group">
                                            <label for="owner_id"> Partner <span class="text-danger" title="Required">*</span></label>
                                            <select id="owner_id" name="owner_id" class="form-control" required>
                                                <option selected disabled> Select</option>
                                                @foreach($owners as $owner)
                                                    <option value="{{ $owner->id }}" @if($travel_package->owner_id == $owner->id) selected @endif>{{ $owner->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('owner_id'))
                                                <span class="text-danger"> {{ $errors->first('owner_id') }}</span>
                                            @endif
                                        </div>
                                    </div>                                  
                                    <div class="col-2">                                        
                                        <div class="form-group">
                                            <label for="quicar_charge"> Qucar Charge(%) <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="quicar_charge" name="quicar_charge" class="form-control" value="{{ $travel_package->quicar_charge }}" placeholder="Quicar Charge(%)" readonly required>
                                            @if($errors->has('quicar_charge'))
                                                <span class="text-danger"> {{ $errors->first('quicar_charge') }}</span>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="col-2">                                        
                                        <div class="form-group">
                                            <label for="cost_per_person"> Cost Per Person <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="cost_per_person" name="cost_per_person" value="{{ $travel_package->cost_per_person }}" oninput="calculateCharge()" class="form-control" placeholder="Price" required>
                                            @if($errors->has('cost_per_person'))
                                                <span class="text-danger"> {{ $errors->first('cost_per_person') }}</span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-2">                                        
                                        <div class="form-group">
                                            <label for="owner_get_per_person"> Owner Get <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="owner_get_per_person" name="owner_get_per_person" class="form-control" value="{{ $travel_package->owner_get_per_person }}" placeholder="Owner get" readonly required>
                                            @if($errors->has('owner_get_per_person'))
                                                <span class="text-danger"> {{ $errors->first('owner_get_per_person') }}</span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-2">                                        
                                        <div class="form-group">
                                            <label for="referrel_code"> Referrel Code <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="referrel_code" name="referrel_code" class="form-control" value="{{ $travel_package->referrel_code }}" placeholder="Referrel Code" required>
                                            @if($errors->has('referrel_code'))
                                                <span class="text-danger"> {{ $errors->first('referrel_code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="travel_starting_date"> Travel Starting Date <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="travel_starting_date" name="travel_starting_date" class="form-control datePicker" value="{{ $travel_package->travel_starting_date }}" placeholder="Referrel Code" required>
                                            @if($errors->has('travel_starting_date'))
                                                <span class="text-danger"> {{ $errors->first('travel_starting_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="travel_starting_date_timestamp"> Travel Starting Time <span class="text-danger" title="Required">*</span></label>
                                            <input type="time" id="travel_starting_date_timestamp" name="travel_starting_date_timestamp" class="form-control" value="{{ $travel_package->travel_starting_date_timestamp }}" placeholder="Referrel Code" required>
                                            @if($errors->has('travel_starting_date_timestamp'))
                                                <span class="text-danger"> {{ $errors->first('travel_starting_date_timestamp') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">                                        
                                        <div class="form-group">
                                            <label for="term_and_condition"> Terms & Condition <span class="text-danger" title="Required">*</span></label>                                            
                                            <textarea class="form-control" id="term_and_condition" name="term_and_condition" placeholder="Terms & Condition" rows="3">{{ $travel_package->term_and_condition }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="status"> Status <span class="text-danger" title="Required">*</span></label>
                                            <select id="status" name="status" class="form-control" required>
                                                <option value="0" @if($travel_package->status == 0) selected @endif>Pending</option>
                                                <option value="1" @if($travel_package->status == 1) selected @endif>Success</option>
                                                <option value="2" @if($travel_package->status == 2) selected @endif>Cancel</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="status_message"> Status Message <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="status_message" name="status_message" class="form-control" value="{{ $travel_package->status_message }}" placeholder="Status Message" required>
                                            @if($errors->has('status_message'))
                                                <span class="text-danger"> {{ $errors->first('status_message') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="travel_package_rating"> Travel Package Rating <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="travel_package_rating" name="travel_package_rating" class="form-control" value="{{ $travel_package->travel_package_rating }}" placeholder="Travel Package Rating" required>
                                            @if($errors->has('travel_package_rating'))
                                                <span class="text-danger"> {{ $errors->first('travel_package_rating') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">                                        
                                        <div class="form-group">
                                            <label for="facilities"> Factilites <span class="text-danger" title="Required">*</span></label>                                                                                       
                                            <select id="facilities" name="facilities[]" class="form-control selectable" multiple required>  
                                                @foreach($amenities as $amenity)                                              
                                                    <option value="{{ $amenity->id }}" @if(in_array($amenity->id, json_decode($travel_package->facilities))) selected @endif>{{ $amenity->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('facilities'))
                                                <span class="text-danger"> {{ $errors->first('facilities') }}</span>
                                            @endif
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-12">                                        
                                        <div class="form-group">
                                            <label for="details"> Details <span class="text-danger" title="Required">*</span></label>                                                                                       
                                            <textarea id="details" name="details" class="form-control" placeholder="Details">{{ $travel_package->details }}</textarea>
                                            @if($errors->has('details'))
                                                <span class="text-danger"> {{ $errors->first('details') }}</span>
                                            @endif
                                        </div>
                                    </div> 
                                </div>
                                <div class="row mt-4">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success" value="Submit"/>
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
    $("#travel_package").addClass('active');
    $("#district_id").change(function(){
        var district_id = $(this).val();
        $("#spot_ids").empty();
        $.get("/admin/car/package/district/spot/"+ district_id, function( data ) {
            for( var i = 0; i < data.length; i++){
                $("#spot_ids").append('<option value="'+ data[i].id +'">'+ data[i].name +'</option>');
            }            
        });
    });
    $("#owner_id").change(function(){
        var owner_id = $(this).val();
        $.get("/admin/hotel/package/get-charge/"+ owner_id, function( travel_package_charge ) {         
            $("#quicar_charge").val(travel_package_charge);
        });
    });

    function calculateCharge(){
        var quicar_charge   = $("#quicar_charge").val();
        var cost_per_person = $("#cost_per_person").val();
        var owner_get       = parseFloat(cost_per_person - (cost_per_person * quicar_charge/100));
        $("#owner_get_per_person").val(owner_get);
    }
</script>    
@endsection
