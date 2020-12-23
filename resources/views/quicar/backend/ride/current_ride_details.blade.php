@extends('quicar.backend.layout.admin')
@section('title','View Car')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row">
                <div class="col-sm-12 col-lg-12">                   
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">Car Details</h4>
                        </div>                        
                        <div class="card-body">  
                            @php 
                                $car = \App\Model\Car::find($ride->car_id);
                            @endphp                              
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" name="name" value="{{ $car->name }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-6">                                        
                                    <div class="form-group">
                                        <label for="registration_no"> Registration No</label>
                                        <input type="text" id="registration_no" name="registration_no" value="{{ $car->registration_no }}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>                                
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="year">Car Year</label>                                            
                                        <input type="text" value="{{ $car->year }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="model">Car Model</label>                                            
                                        <input type="text" value="{{ $car->model }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="brand">Car Brand</label>                                            
                                        <input type="text" value="{{ $car->brand }}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>                                
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="car_class">Car Class</label>                                            
                                        <input type="text" value="{{ $car->car_class }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="color">Car Color</label>                                            
                                        <input type="text" value="{{ $car->color }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        
                                    </div>
                                </div>
                            </div>                                
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="capacity">Capacity</label>                                            
                                        <input type="text" class="form-control" value="{{ $car->capacity }}" readonly />
                                        <span class="text-danger errorCapacity"></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="tax">Tax </label>                                            
                                        <input type="text" id="tax" class="form-control" value="{{ $car->tax }}" readonly/>
                                        <span class="text-danger errorTax"></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="tax">Fitness </label>                                            
                                        <input type="text" id="fitness" name="fitness" class="form-control" value="{{ $car->fitness }}" readonly />
                                        <span class="text-danger errorFitness"></span>
                                    </div>
                                </div>
                            </div>  

                            @php 
                                if($ride->driver_id != 0){
                                    $driver = \App\Model\Driver::find($car->driver_id);
                                }                                
                            @endphp

                            @if(isset($ride->driver_id) && $ride->driver_id != 0)
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header bg-info text-white">Driver Details</div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="capacity">Driver Name</label>                                            
                                                            <input type="text" class="form-control" value="{{ $driver->name }}" readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="tax">Driver Phone </label>                                            
                                                            <input type="text" class="form-control" value="{{ $driver->phone }}" readonly/>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="tax">Current Status </label>                                            
                                                            <input type="text" class="form-control" value="{{ $driver->c_status == 0 ? 'Off Ride' : 'On Ride' }}" readonly />
                                                            <span class="text-danger errorFitness"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="capacity">Image</label>                                            
                                                            <div class="avatar-upload">
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img1Preview" style="background-image: url(http://quicarbd.com/{{ $driver->img }});"></div>
                                                                </div>
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="capacity">License</label>                                            
                                                            <div class="avatar-upload">
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img1Preview" style="background-image: url(http://quicarbd.com/{{$driver->license }});"></div>
                                                                </div>
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @php                                
                                
                                if($ride->status == 0){
                                    $status = 'Requesting';
                                }else if($ride->status == 1){
                                    $status = 'Accepted';
                                }else if($ride->status == 2){
                                    $status = 'Started';
                                }else if($ride->status == 3){
                                    $status = 'Finished';
                                }else if($ride->status == 4){
                                    $status = 'Completed';
                                }else{
                                    $status = 'Cancelled';
                                }
                                
                                if($ride->ride_type == 1){
                                    $ride_type = 'City Ride';
                                }else if($ride->status == 2){
                                    $ride_type = 'Logn/Schedule Ride';
                                }else if($ride->status == 3){
                                    $ride_type = 'Ambulance Ride';
                                }else{
                                    $ride_type = 'Package Ride';
                                }                       
                            @endphp                            
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header bg-info text-white">Ride Details</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="capacity">Starting Address</label>                                            
                                                        <input type="text" class="form-control" value="{{ $ride->starting_address }}" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="tax">Ending Address</label>                                            
                                                        <input type="text" class="form-control" value="{{ $ride->ending_address }}" readonly/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="capacity">Status</label>                                            
                                                        <input type="text" class="form-control" value="{{ $status }}" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="tax">Ride Type</label>                                            
                                                        <input type="text" class="form-control" value="{{ $ride_type }}" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="tax">Date</label>                                            
                                                        <input type="text" class="form-control" value="{{ $ride->date }}" readonly />
                                                        <span class="text-danger errorFitness"></span>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="tax">Time</label>                                            
                                                        <input type="text" class="form-control" value="{{ date('H:i:s a', strtotime($ride->time)) }}" readonly />
                                                        <span class="text-danger errorFitness"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="capacity">Owner Assign</label>                                            
                                                        <input type="text" class="form-control" value="{{ $ride->owner_assign }}" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="tax">Amount</label>                                            
                                                        <input type="text" class="form-control" value="{{ $ride->amount }}" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="tax">Payment Status</label>                                            
                                                        <input type="text" class="form-control" value="{{ $ride->payment_status == 0 ? 'Unpaid' : 'Paid' }}" readonly />
                                                        <span class="text-danger errorFitness"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($ride->owner_assign == 'yes')
                                @php 
                                    $owner = \App\Model\Owner::where('api_token',$ride->owner_id)->first();
                                @endphp
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header bg-info text-white">Owner Details</div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="capacity">Owner Name</label>                                            
                                                            <input type="text" class="form-control" value="{{ $owner->name }}" readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="tax">Owner Phone </label>                                            
                                                            <input type="text" class="form-control" value="{{ $owner->phone }}" readonly/>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="tax">Owner Email </label>                                            
                                                            <input type="text" class="form-control" value="{{ $owner->email }}" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="capacity">Image</label>                                            
                                                            <div class="avatar-upload">
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img1Preview" style="background-image: url(http://quicarbd.com/{{ $owner->img }});"></div>
                                                                </div>
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                           
                            @php 
                                $user = \App\User::where('api_token',$ride->user_id)->first();
                            @endphp
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header bg-info text-white">User Details</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="capacity">User Name</label>                                            
                                                        <input type="text" class="form-control" value="{{ $user->name }}" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="tax">User Phone </label>                                            
                                                        <input type="text" class="form-control" value="{{ $user->phone }}" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="tax">User Email </label>                                            
                                                        <input type="text" class="form-control" value="{{ $user->email }}" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="capacity">Division</label>                                            
                                                        <input type="text" class="form-control" value="{{ $user->division }}" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="tax">District </label>                                            
                                                        <input type="text" class="form-control" value="{{ $user->district }}" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="tax">Address </label>                                            
                                                        <input type="text" class="form-control" value="{{ $user->address }}" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="capacity">NID</label>                                            
                                                        <input type="text" class="form-control" value="{{ $user->nid }}" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="tax">Current Lattitude </label>                                            
                                                        <input type="text" class="form-control" value="{{ $user->c_lat }}" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="tax">Current Longitude </label>                                            
                                                        <input type="text" class="form-control" value="{{ $user->c_lon }}" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="capacity">Rating</label>                                            
                                                        <input type="text" class="form-control" value="{{ $user->rating }}" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="tax">Date </label>                                            
                                                        <input type="text" class="form-control" value="{{ $user->date }}" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="tax">Time </label>                                            
                                                        <input type="text" class="form-control" value="{{ date('H:i:s a', strtotime($user->time)) }}" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="capacity">Image</label>                                            
                                                        <div class="avatar-upload">
                                                            <div class="avatar-preview" style="width:100%">
                                                                <div id="img1Preview" style="background-image: url(http://quicarbd.com/{{ $user->img }});"></div>
                                                            </div>
                                                        </div>                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/ride.js')}}"></script>
<script>
    $(".menu-order-dropdown").addClass('show');
    $("#current_ride").addClass('active');
    
</script>    
@endsection
