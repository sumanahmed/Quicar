@extends('quicar.backend.layout.admin')
@section('title','Car')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('backend.car.store') }}" method="post" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mt-2 tx-spacing--1 float-left">Add New Car</h4>
                            </div>
                            <div class="card-body">                                
                                <div class="row">
                                    <div class="col-3">                                        
                                        <div class="form-group">
                                            <label for="carRegisterNumber"> Registration No <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="carRegisterNumber" name="carRegisterNumber" placeholder="Enter Car Registration No" class="form-control" required>
                                            @if($errors->has('carRegisterNumber'))
                                                <span class="text-danger"> {{ $errors->first('carRegisterNumber') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-3">                                        
                                        <div class="form-group">
                                            <label for="district_id">Car Service Location <span class="text-danger" title="Required">*</span></label>
                                            <select name="district_id" id="district_id" class="form-control selectable">
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
                                            <select name="city_id" id="city_id" class="form-control selectable">
                                               
                                            </select>
                                            @if($errors->has('city_id'))
                                                <span class="text-danger"> {{ $errors->first('city_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="owner_id">Owner <span class="text-danger" title="Required">*</span></label>                                            
                                            <select id="owner_id" name="owner_id" class="form-control selectable" required>
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
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="carType">Car Type <span class="text-danger" title="Required">*</span></label>                                            
                                            <select id="carType" name="carType" class="form-control selectable" required>
                                                @foreach($types as $type)
                                                    <option value="{{ $type->name }}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('carType'))
                                                <span class="text-danger"> {{ $errors->first('carType') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="carBrand">Car Brand <span class="text-danger" title="Required">*</span></label>                                            
                                            <select id="carBrand" name="carBrand" class="form-control selectable" required>
                                                @foreach($brands as $brand)
                                                    <option value="{{ $brand->value }}">{{ $brand->value }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('carBrand'))
                                                <span class="text-danger"> {{ $errors->first('carBrand') }}</span>
                                            @endif
                                        </div>
                                    </div>                                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="carModel">Car Model <span class="text-danger" title="Required">*</span></label>                                            
                                            <select id="carModel" name="carModel" class="form-control selectable" required>
                                                @foreach($models as $model)
                                                    <option value="{{ $model->value }}">{{ $model->value }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('carModel'))
                                                <span class="text-danger"> {{ $errors->first('carModel') }}</span>
                                            @endif
                                        </div>
                                    </div>                                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="carYear">Car Year <span class="text-danger" title="Required">*</span></label>                                            
                                            <select id="carYear" name="carYear" class="form-control selectable" required>
                                                @foreach($years as $year)
                                                    <option value="{{ $year->value }}">{{ $year->value }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('carYear'))
                                                <span class="text-danger"> {{ $errors->first('carYear') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="carColor">Car Color <span class="text-danger" title="Required">*</span></label> 
                                            <input type="text" class="form-control" name="carColor" placeholder="Enter Color" />
                                            @if($errors->has('carColor'))
                                                <span class="text-danger"> {{ $errors->first('carColor') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="carClass">Car Class <span class="text-danger" title="Required">*</span></label>                                            
                                            <select id="carClass" name="carClass" class="form-control selectable" required>
                                                @foreach($classes as $class)
                                                    <option value="{{ $class->value }}">{{ $class->value }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('carClass'))
                                                <span class="text-danger"> {{ $errors->first('carClass') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">Car Images</div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="img1">Car Image <span class="text-danger" title="Required">*</span></label>
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' name="carImage" id="img1Upload" accept=".png, .jpg, .jpeg" required/>
                                                                    <label for="img1Upload"><i class="fas fa-pencil-alt"></i></label>
                                                                </div>
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img1Preview" style="background-image: url();"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="img2">Smart Card (Front) <span class="text-danger" title="Required">*</span> </label>
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' name="carSmartCardFont" id="img2Upload" accept=".png, .jpg, .jpeg"/>
                                                                    <label for="img2Upload"><i class="fas fa-pencil-alt"></i></label>
                                                                </div>
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img2Preview" style="background-image: url();"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-top:30px;">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="img3">Smart Card (Back) <span class="text-danger" title="Required">*</span> </label>
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' name="carSmartCardBack" id="img3Upload" accept=".png, .jpg, .jpeg"/>
                                                                    <label for="img3Upload"><i class="fas fa-pencil-alt"></i></label>
                                                                </div>
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img3Preview" style="background-image: url();"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="img4">Tax Token <span class="text-danger" title="Required">*</span> </label>
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' name="taxToken_image" id="img4Upload" accept=".png, .jpg, .jpeg"/>
                                                                    <label for="img4Upload"><i class="fas fa-pencil-alt"></i></label>
                                                                </div>
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img4Preview" style="background-image: url();"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="img5">Fitness Certificate <span class="text-danger" title="Required">*</span> </label>
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' name="fitnessCertificate" id="img5Upload" accept=".png, .jpg, .jpeg"/>
                                                                    <label for="img5Upload"><i class="fas fa-pencil-alt"></i></label>
                                                                </div>
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img5Preview" style="background-image: url();"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">Expired date </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="tax_expired_date">Tax Expired Date <span class="text-danger" title="Required">*</span></label>
                                                            <input type="text" id="tax_expired_date" name="tax_expired_date" class="form-control datePicker" required/>
                                                            @if($errors->has('tax_expired_date'))
                                                                <span class="text-danger"> {{ $errors->first('tax_expired_date') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="fitness_expired_date">Fitness Expired Date <span class="text-danger" title="Required">*</span></label>
                                                            <input type="text" id="fitness_expired_date" name="fitness_expired_date" class="form-control datePicker" required/>
                                                            @if($errors->has('fitness_expired_date'))
                                                                <span class="text-danger"> {{ $errors->first('fitness_expired_date') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="registration_expired_date">Registration Expired Date <span class="text-danger" title="Required">*</span></label>
                                                            <input type="text" id="registration_expired_date" name="registration_expired_date" class="form-control datePicker" required/>
                                                            @if($errors->has('registration_expired_date'))
                                                                <span class="text-danger"> {{ $errors->first('registration_expired_date') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="insurance_expired_date">Insurance Expired Date <span class="text-danger" title="Required">*</span></label>
                                                            <input type="text" id="insurance_expired_date" name="insurance_expired_date" class="form-control datePicker" required/>
                                                            @if($errors->has('insurance_expired_date'))
                                                                <span class="text-danger"> {{ $errors->first('insurance_expired_date') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="status_message">Status Message  <span class="text-danger" title="Required">*</span></label>
                                                        <input type="text" name="status_message" id="status_message" class="form-control" placeholder="Enter Status Message" required/>
                                                        @if($errors->has('status_message'))
                                                            <span class="text-danger"> {{ $errors->first('status_message') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
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
<script src="{{ asset('quicar/backend/js/car.js')}}"></script>
<script>
    $("#car").addClass('active');
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
