@extends('quicar.backend.layout.admin')
@section('title','Partner')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('backend.owner.update', $owner->id) }}" method="post" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mt-2 tx-spacing--1 float-left">Update Partner</h4>
                            </div>
                            <div class="card-body">                                
                                <div class="row">
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="name" name="name" value="{{ $owner->name }}" class="form-control" required>
                                            @if($errors->has('name'))
                                                <span class="text-danger"> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="email">Email <span class="text-danger" title="Required">*</span></label>
                                            <input type="email" id="email" name="email" value="{{ $owner->email }}" class="form-control" required>
                                            @if($errors->has('email'))
                                                <span class="text-danger"> {{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="phone">Phone <span class="text-danger" title="Required">*</span></label>                                            
                                            <input type="phone" id="phone" name="phone" value="{{ $owner->phone }}" class="form-control" required>
                                            @if($errors->has('phone'))
                                                <span class="text-danger"> {{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="dob">Date of Birth <span class="text-danger" title="Required">*</span></label>                                            
                                            <input type="dob" id="phone" name="dob" value="{{ $owner->dob }}" class="form-control" required>
                                            @if($errors->has('dob'))
                                                <span class="text-danger"> {{ $errors->first('dob') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="nid">NID No <span class="text-danger" title="Required">*</span></label>                                            
                                            <input type="nid" id="nid" name="nid" value="{{ $owner->nid }}" class="form-control" required>
                                            @if($errors->has('nid'))
                                                <span class="text-danger"> {{ $errors->first('nid') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="district">Disitrict <span class="text-danger" title="Required">*</span></label>                                            
                                            <select id="district" name="district" class="form-control selectable" required>
                                                @foreach($districts as $district)
                                                    <option value="{{ $district->value }}" @if($district->value == $owner->district) selected @endif>{{ $district->value }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('district'))
                                                <span class="text-danger"> {{ $errors->first('district') }}</span>
                                            @endif
                                        </div>
                                    </div>                                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="account_status">Account Status <span class="text-danger" title="Required">*</span></label>                                            
                                            <select id="account_status" name="account_status" class="form-control" required>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select>
                                            @if($errors->has('account_status'))
                                                <span class="text-danger"> {{ $errors->first('account_status') }}</span>
                                            @endif
                                        </div>
                                    </div>                                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="city">City <span class="text-danger" title="Required">*</span></label>                                                                                        
                                            <select type="city" id="city" name="city" class="form-control" required>
                                                @foreach($citys as $city)
                                                    <option value="{{ $city->name }}" @if($city->name == $owner->city) selected @endif>{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('city'))
                                                <span class="text-danger"> {{ $errors->first('city') }}</span>
                                            @endif
                                        </div>
                                    </div>                                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="area">Area <span class="text-danger" title="Required">*</span></label>                                            
                                            <input type="area" id="area" name="area" value="{{ $owner->area }}" class="form-control" required>
                                            @if($errors->has('area'))
                                                <span class="text-danger"> {{ $errors->first('area') }}</span>
                                            @endif
                                        </div>
                                    </div>                                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="bidding_percent">Bidding Percentage <span class="text-danger" title="Required">*</span></label>                                            
                                            <input type="bidding_percent" id="bidding_percent" name="bidding_percent" value="{{ $owner->bidding_percent }}" class="form-control" required>
                                            @if($errors->has('bidding_percent'))
                                                <span class="text-danger"> {{ $errors->first('bidding_percent') }}</span>
                                            @endif
                                        </div>
                                    </div>                                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="car_package_charge">Car Package Charge <span class="text-danger" title="Required">*</span></label>                                            
                                            <input type="car_package_charge" id="car_package_charge" name="car_package_charge" value="{{ $owner->bidding_percent }}" class="form-control" required>
                                            @if($errors->has('car_package_charge'))
                                                <span class="text-danger"> {{ $errors->first('car_package_charge') }}</span>
                                            @endif
                                        </div>
                                    </div>                                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="hotel_package_charge">Hotel Package Charge <span class="text-danger" title="Required">*</span></label>                                            
                                            <input type="hotel_package_charge" id="hotel_package_charge" name="hotel_package_charge" value="{{ $owner->bidding_percent }}" class="form-control" required>
                                            @if($errors->has('hotel_package_charge'))
                                                <span class="text-danger"> {{ $errors->first('hotel_package_charge') }}</span>
                                            @endif
                                        </div>
                                    </div>                                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="travel_package_charge">Travel Package Charge <span class="text-danger" title="Required">*</span></label>                                            
                                            <input type="travel_package_charge" id="travel_package_charge" name="travel_package_charge" value="{{ $owner->bidding_percent }}" class="form-control" required>
                                            @if($errors->has('travel_package_charge'))
                                                <span class="text-danger"> {{ $errors->first('travel_package_charge') }}</span>
                                            @endif
                                        </div>
                                    </div>                                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="img">Previous Image </label>                                            
                                            <img src="{{ asset($owner->img) }}" class="form-control" style="width:100px;height:80px;"/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="img">Update Image </label>                                            
                                            <input type="file" name="img" class="form-control" />
                                            @if($errors->has('img'))
                                                <span class="text-danger"> {{ $errors->first('img') }}</span>
                                            @endif
                                        </div>
                                    </div>
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
<script src="{{ asset('quicar/backend/js/owner.js')}}"></script>
<script>
    $("#owner").addClass('active');
</script>    
@endsection
