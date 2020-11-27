@extends('quicar.backend.layout.admin')
@section('title','Hotel Package')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('backend.hotel.package.update', $hotel_package->id) }}" method="post" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mt-2 tx-spacing--1 float-left">Update Hotel Package</h4>
                            </div>
                            <div class="card-body">                                
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="hotel_name">Hotel Name <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="hotel_name" name="hotel_name" class="form-control" value="{{ $hotel_package->hotel_name }}" required>
                                            @if($errors->has('hotel_name'))
                                                <span class="text-danger"> {{ $errors->first('hotel_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="district_id">District <span class="text-danger" title="Required">*</span></label>
                                            <select id="district_id" name="district_id" class="form-control selectable" required>
                                                <option selected disabled>Select</option>
                                                @foreach($districts as $district)
                                                    <option value="{{ $district->id }}" @if($district->id == $hotel_package->district_id) selected @endif>{{ $district->value }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('district_id'))
                                                <span class="text-danger"> {{ $errors->first('district_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="city_id">City <span class="text-danger" title="Required">*</span></label>
                                            <select id="city_id" name="city_id" class="form-control selectable" required>
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}" @if($city->id == $hotel_package->city_id) selected @endif>{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('city_id'))
                                                <span class="text-danger"> {{ $errors->first('city_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-3">                                        
                                        <div class="form-group">
                                            <label for="area"> Area <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="area" name="area" class="form-control" value="{{ $hotel_package->area }}" required>
                                            @if($errors->has('area'))
                                                <span class="text-danger"> {{ $errors->first('area') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="room_type"> Room Type <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="room_type" name="room_type" class="form-control" value="{{ $hotel_package->room_type }}" required>
                                            @if($errors->has('room_type'))
                                                <span class="text-danger"> {{ $errors->first('room_type') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="room_size"> Room Size <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="room_size" name="room_size" class="form-control" value="{{ $hotel_package->room_size }}" required>
                                            @if($errors->has('room_size'))
                                                <span class="text-danger"> {{ $errors->first('room_size') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="propertyType"> Property Type <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="propertyType" name="propertyType" class="form-control" value="{{ $hotel_package->propertyType }}" required>
                                            @if($errors->has('propertyType'))
                                                <span class="text-danger"> {{ $errors->first('propertyType') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="price"> Price <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="price" name="price" class="form-control" value="{{ $hotel_package->price }}" required>
                                            @if($errors->has('price'))
                                                <span class="text-danger"> {{ $errors->first('price') }}</span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="min_price"> Minimum Price <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="min_price" name="min_price" class="form-control"  value="{{ $hotel_package->min_price }}" required>
                                            @if($errors->has('min_price'))
                                                <span class="text-danger"> {{ $errors->first('min_price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="max_price"> Max Price <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="max_price" name="max_price" class="form-control" value="{{ $hotel_package->max_price }}" required>
                                            @if($errors->has('max_price'))
                                                <span class="text-danger"> {{ $errors->first('max_price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="booking_contact_number"> Booking Contact Number <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="booking_contact_number" name="booking_contact_number" class="form-control" value="{{ $hotel_package->booking_contact_number }}" required>
                                            @if($errors->has('booking_contact_number'))
                                                <span class="text-danger"> {{ $errors->first('booking_contact_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="status"> Status <span class="text-danger" title="Required">*</span></label>
                                            <select id="status" name="status" class="form-control" required>
                                                <option value="0" @if($hotel_package->status == 0) selected @endif>Pending</option>
                                                <option value="1" @if($hotel_package->status == 1) selected @endif>Success</option>
                                                <option value="2" @if($hotel_package->status == 2) selected @endif>Cancel</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="status_message"> Status Message <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="status_message" name="status_message" class="form-control" value="{{ $hotel_package->status_message }}" required>
                                            @if($errors->has('status_message'))
                                                <span class="text-danger"> {{ $errors->first('status_message') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="hotel_website"> Hotel Website <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="hotel_website" name="hotel_website" class="form-control" value="{{ $hotel_package->hotel_website }}" required>
                                            @if($errors->has('hotel_website'))
                                                <span class="text-danger"> {{ $errors->first('hotel_website') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="referrel_code"> Referrel Code <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="referrel_code" name="referrel_code" class="form-control" value="{{ $hotel_package->referrel_code }}" required>
                                            @if($errors->has('referrel_code'))
                                                <span class="text-danger"> {{ $errors->first('referrel_code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="facebook_page"> Facebook Page <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="facebook_page" name="facebook_page" class="form-control" value="{{ $hotel_package->facebook_page }}" required>
                                            @if($errors->has('facebook_page'))
                                                <span class="text-danger"> {{ $errors->first('facebook_page') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="owner_id"> Partner <span class="text-danger" title="Required">*</span></label>
                                            <select id="owner_id" name="owner_id" class="form-control" required>
                                                @foreach($owners as $owner)
                                                    <option value="{{ $owner->id }}" @if($owner->id == $hotel_package->owner_id) selected @endif>{{ $owner->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('owner_id'))
                                                <span class="text-danger"> {{ $errors->first('owner_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">                                        
                                        <div class="form-group">
                                            <label for="facilities"> Factilites <span class="text-danger" title="Required">*</span></label>                                            
                                            <textarea class="form-control ckeditor" id="facilities" name="facilities" placeholder="Facilites" rows="3">{{ $hotel_package->facilities }}</textarea>
                                            @if($errors->has('facilities'))
                                                <span class="text-danger"> {{ $errors->first('facilities') }}</span>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="col-6">                                        
                                        <div class="form-group">
                                            <label for="booking_policy"> Booking Policy <span class="text-danger" title="Required">*</span></label>                                            
                                            <textarea class="form-control ckeditor" id="booking_policy" name="booking_policy" placeholder="Booking Policy" rows="3">{{ $hotel_package->booking_policy }}</textarea>
                                            @if($errors->has('booking_policy'))
                                                <span class="text-danger"> {{ $errors->first('booking_policy') }}</span>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="col-12">                                        
                                        <div class="form-group">
                                            <label for="cancellation_policy"> Cancellation Policy <span class="text-danger" title="Required">*</span></label>                                            
                                            <textarea class="form-control ckeditor" id="cancellation_policy" name="cancellation_policy" placeholder="Cancellation Policy" rows="3"><{{ $hotel_package->cancellation_policy }}</textarea>
                                            @if($errors->has('cancellation_policy'))
                                                <span class="text-danger"> {{ $errors->first('cancellation_policy') }}</span>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="col-6">                                        
                                        <div class="form-group">
                                            <label for="hotel_image"> Hotel Image <span class="text-danger" title="Required">*</span></label>                                            
                                            <img src="http://quicarbd.com/{{ $hotel_package->hotel_image }}" class="form-control" style="width:200px;height:200px;"/>
                                        </div>
                                    </div>  
                                    <div class="col-6">                                        
                                        <div class="form-group">
                                            <label for="hotel_image">Update Hotel Image <span class="text-danger" title="Required">*</span></label>                                            
                                            <input type="file" name="hotel_image" id="hotel_image" class="form-control"/>
                                            @if($errors->has('image'))
                                                <span class="text-danger"> {{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="col-6">                                        
                                        <div class="form-group">
                                            <label for="room_image"> Room Image <span class="text-danger" title="Required">*</span></label>                                            
                                            <img src="http://quicarbd.com/{{ $hotel_package->room_image }}" class="form-control" style="width:200px;height:200px;" />
                                        </div>
                                    </div>
                                    <div class="col-6">                                        
                                        <div class="form-group">
                                            <label for="room_image">Update Room Image <span class="text-danger" title="Required">*</span></label>                                            
                                            <input type="file" name="room_image" id="room_image" class="form-control"/>
                                            @if($errors->has('room_image'))
                                                <span class="text-danger"> {{ $errors->first('room_image') }}</span>
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
    $("#hotel_package").addClass('active');
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
