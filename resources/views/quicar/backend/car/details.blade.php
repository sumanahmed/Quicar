@extends('quicar.backend.layout.admin')
@section('title','Details Car')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mt-2 tx-spacing--1 float-left">Car Details</h4>
                            </div>
                            <div class="card-body">                                
                                <div class="row">
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="carRegisterNumber"> Registration No <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="carRegisterNumber" name="carRegisterNumber" value="{{ $car->carRegisterNumber }}" class="form-control" readonly>
                                            @if($errors->has('carRegisterNumber'))
                                                <span class="text-danger"> {{ $errors->first('carRegisterNumber') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="carRegisterNumber">Car Service Location <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="carServieLocation" name="carServieLocation" value="{{ $car->carServieLocation }}" class="form-control" readonly>
                                            @if($errors->has('carServieLocation'))
                                                <span class="text-danger"> {{ $errors->first('carServieLocation') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="owner_id">Owner <span class="text-danger" title="Required">*</span></label>                                            
                                            <select id="owner_id" name="owner_id" class="form-control" readonly>
                                                @foreach($owners as $owner)
                                                    <option value="{{ $owner->id }}" @if($owner->id == $car->owner_id) selected @endif>{{ $owner->name }}</option>
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
                                            <input type="text" value="{{ $car->carType }}" class="form-control" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="carBrand">Car Brand <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" value="{{ $car->carBrand }}" class="form-control" readonly/>
                                        </div>
                                    </div>                                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="carModel">Car Model <span class="text-danger" title="Required">*</span></label>                                             
                                            <input type="text" value="{{ $car->carModel }}" class="form-control" readonly/>
                                        </div>
                                    </div>                                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="carYear">Car Year <span class="text-danger" title="Required">*</span></label> 
                                            <input type="text" value="{{ $car->carYear }}" class="form-control" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="carColor">Car Color <span class="text-danger" title="Required">*</span></label> 
                                            <input type="text" value="{{ $car->carColor }}" class="form-control" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="carClass">Car Class <span class="text-danger" title="Required">*</span></label>                                            
                                            <input type="text" value="{{ $car->carClass }}" class="form-control" readonly/>
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
                                                                    <div id="img1Preview" style="background-image: url(http://quicarbd.com{{ $car->carImage }});"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="img2">Smart Card (Front) </label>
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' name="carSmartCardFont" id="img2Upload" accept=".png, .jpg, .jpeg"/>
                                                                    <label for="img2Upload"><i class="fas fa-pencil-alt"></i></label>
                                                                </div>
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img2Preview" style="background-image: url(http://quicarbd.com{{ $car->carSmartCardFont }});"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-top:30px;">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="img3">Smart Card (Back) </label>
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' name="carSmartCardBack" id="img3Upload" accept=".png, .jpg, .jpeg"/>
                                                                    <label for="img3Upload"><i class="fas fa-pencil-alt"></i></label>
                                                                </div>
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img3Preview" style="background-image: url(http://quicarbd.com{{ $car->carSmartCardBack }});"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="img4">Tax Token </label>
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' name="taxToken_image" id="img4Upload" accept=".png, .jpg, .jpeg"/>
                                                                    <label for="img4Upload"><i class="fas fa-pencil-alt"></i></label>
                                                                </div>
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img4Preview" style="background-image: url(http://quicarbd.com{{ $car->taxToken_image }});"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="img5">Fitness Certificate </label>
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' name="fitnessCertificate" id="img5Upload" accept=".png, .jpg, .jpeg"/>
                                                                    <label for="img5Upload"><i class="fas fa-pencil-alt"></i></label>
                                                                </div>
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img5Preview" style="background-image: url(http://quicarbd.com{{ $car->fitnessCertificate }});"></div>
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
                                                            <input type="text" id="tax_expired_date" name="tax_expired_date" value="{{ date('Y-m-d', strtotime($car->tax_expired_date)) }}" class="form-control datePicker" readonly/>
                                                            @if($errors->has('tax_expired_date'))
                                                                <span class="text-danger"> {{ $errors->first('tax_expired_date') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="fitness_expired_date">Fitness Expired Date <span class="text-danger" title="Required">*</span></label>
                                                            <input type="text" id="fitness_expired_date" name="fitness_expired_date" value="{{ date('Y-m-d', strtotime($car->fitness_expired_date)) }}" class="form-control datePicker" readonly/>
                                                            @if($errors->has('fitness_expired_date'))
                                                                <span class="text-danger"> {{ $errors->first('fitness_expired_date') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="registration_expired_date">Registration Expired Date <span class="text-danger" title="Required">*</span></label>
                                                            <input type="text" id="registration_expired_date" name="registration_expired_date" value="{{ date('Y-m-d', strtotime($car->registration_expired_date)) }}" class="form-control datePicker" readonly/>
                                                            @if($errors->has('registration_expired_date'))
                                                                <span class="text-danger"> {{ $errors->first('registration_expired_date') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="registration_expired_date">Insurance Expired Date <span class="text-danger" title="Required">*</span></label>
                                                            <input type="text" id="insurance_expired_date" name="insurance_expired_date" value="{{ date('Y-m-d', strtotime($car->insurance_expired_date)) }}" class="form-control datePicker" readonly/>
                                                            @if($errors->has('insurance_expired_date'))
                                                                <span class="text-danger"> {{ $errors->first('insurance_expired_date') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="status_message">Status Message  <span class="text-danger" title="Required">*</span></label>
                                                        <input type="text" name="status_message" id="status_message" class="form-control" value="{{ $car->status_message }}" readonly/>
                                                        @if($errors->has('status_message'))
                                                            <span class="text-danger"> {{ $errors->first('status_message') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
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
</script>    
@endsection
