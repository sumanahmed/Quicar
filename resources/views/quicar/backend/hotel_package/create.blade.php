@extends('quicar.backend.layout.admin')
@section('title','Hotel Package')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('backend.hotel.package.store') }}" method="post" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mt-2 tx-spacing--1 float-left">Create Hotel Package</h4>
                            </div>
                            <div class="card-body">                                
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="hotel_name">Hotel Name <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="hotel_name" name="hotel_name" class="form-control" placeholder="Hotel Name" required>
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
                                                    <option value="{{ $district->id }}">{{ $district->value }}</option>
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
                                            </select>
                                            @if($errors->has('city_id'))
                                                <span class="text-danger"> {{ $errors->first('city_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-3">                                        
                                        <div class="form-group">
                                            <label for="area"> Area <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="area" name="area" class="form-control" placeholder="Area" required>
                                            @if($errors->has('area'))
                                                <span class="text-danger"> {{ $errors->first('area') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="room_type"> Room Type <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="room_type" name="room_type" class="form-control" placeholder="Room Type" required>
                                            @if($errors->has('room_type'))
                                                <span class="text-danger"> {{ $errors->first('room_type') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="room_size"> Room Size <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="room_size" name="room_size" class="form-control" placeholder="Room Size" required>
                                            @if($errors->has('room_size'))
                                                <span class="text-danger"> {{ $errors->first('room_size') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="propertyType"> Property Type <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="propertyType" name="propertyType" class="form-control" placeholder="Property Type" required>
                                            @if($errors->has('propertyType'))
                                                <span class="text-danger"> {{ $errors->first('propertyType') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="price"> Price <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="price" name="price" class="form-control" placeholder="Price" required>
                                            @if($errors->has('price'))
                                                <span class="text-danger"> {{ $errors->first('price') }}</span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="min_price"> Minimum Price <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="min_price" name="min_price" class="form-control" placeholder="Minimum Price" required>
                                            @if($errors->has('min_price'))
                                                <span class="text-danger"> {{ $errors->first('min_price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="max_price"> Max Price <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="max_price" name="max_price" class="form-control" placeholder="Max Price" required>
                                            @if($errors->has('max_price'))
                                                <span class="text-danger"> {{ $errors->first('max_price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="booking_contact_number"> Booking Contact Number <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="booking_contact_number" name="booking_contact_number" class="form-control" placeholder="Booking Contact Number" required>
                                            @if($errors->has('booking_contact_number'))
                                                <span class="text-danger"> {{ $errors->first('booking_contact_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="status"> Status <span class="text-danger" title="Required">*</span></label>
                                            <select id="status" name="status" class="form-control" required>
                                                <option value="0">Pending</option>
                                                <option value="1">Success</option>
                                                <option value="2">Cancel</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="status_message"> Status Message <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="status_message" name="status_message" class="form-control" placeholder="Status Message" required>
                                            @if($errors->has('status_message'))
                                                <span class="text-danger"> {{ $errors->first('status_message') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="hotel_website"> Hotel Website <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="hotel_website" name="hotel_website" class="form-control" placeholder="Hotel Website" required>
                                            @if($errors->has('hotel_website'))
                                                <span class="text-danger"> {{ $errors->first('hotel_website') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="referrel_code"> Referrel Code <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="referrel_code" name="referrel_code" class="form-control" placeholder="Referrel Code" required>
                                            @if($errors->has('referrel_code'))
                                                <span class="text-danger"> {{ $errors->first('referrel_code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="facebook_page"> Facebook Page <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="facebook_page" name="facebook_page" class="form-control" placeholder="Facebook Page" required>
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
                                                    <option value="{{ $owner->id }}">{{ $owner->name }}</option>
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
                                            <textarea class="form-control ckeditor" id="facilities" name="facilities" placeholder="Facilites" rows="3"></textarea>
                                            @if($errors->has('facilities'))
                                                <span class="text-danger"> {{ $errors->first('facilities') }}</span>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="col-6">                                        
                                        <div class="form-group">
                                            <label for="booking_policy"> Booking Policy <span class="text-danger" title="Required">*</span></label>                                            
                                            <textarea class="form-control ckeditor" id="booking_policy" name="booking_policy" placeholder="Booking Policy" rows="3"></textarea>
                                            @if($errors->has('booking_policy'))
                                                <span class="text-danger"> {{ $errors->first('booking_policy') }}</span>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="col-12">                                        
                                        <div class="form-group">
                                            <label for="cancellation_policy"> Cancellation Policy <span class="text-danger" title="Required">*</span></label>                                            
                                            <textarea class="form-control ckeditor" id="cancellation_policy" name="cancellation_policy" placeholder="Cancellation Policy" rows="3"></textarea>
                                            @if($errors->has('cancellation_policy'))
                                                <span class="text-danger"> {{ $errors->first('cancellation_policy') }}</span>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="col-6">                                        
                                        <div class="form-group">
                                            <label for="hotel_image">Hotel Image <span class="text-danger" title="Required">*</span></label>                                            
                                            <input type="file" name="hotel_image" id="hotel_image" class="form-control" required/>
                                            @if($errors->has('hotel_image'))
                                                <span class="text-danger"> {{ $errors->first('hotel_image') }}</span>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="col-6">                                        
                                        <div class="form-group">
                                            <label for="room_image">Room Image <span class="text-danger" title="Required">*</span></label>                                            
                                            <input type="file" name="room_image" id="room_image" class="form-control" required/>
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
        console.log(district_id);
        $("#city_id").empty();
        $.get("/admin/hotel/package/get-city/"+ district_id, function( data ) {
            for( var i = 0; i < data.length; i++){
                $("#city_id").append('<option value="'+ data[i].id +'">'+ data[i].name +'</option>');
            }            
        });
    });
</script>    
@endsection
