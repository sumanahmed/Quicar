@extends('quicar.backend.layout.admin')
@section('title','View Car')
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Name <span class="text-danger" title="Required">*</span></label>
                                        <input type="text" id="name" name="name" value="{{ $car->name }}" class="form-control" readonly>
                                        <span class="text-danger errorName"></span>
                                    </div>
                                </div>
                                <div class="col-6">                                        
                                    <div class="form-group">
                                        <label for="registration_no"> Registration No <span class="text-danger" title="Required">*</span></label>
                                        <input type="text" id="registration_no" name="registration_no" value="{{ $car->registration_no }}" class="form-control" readonly>
                                        <span class="text-danger errorRegistrationNo"></span>
                                    </div>
                                </div>
                            </div>                                
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="year">Car Year <span class="text-danger" title="Required">*</span></label>                                            
                                        <input type="text" value="{{ $car->year }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="model">Car Model <span class="text-danger" title="Required">*</span></label>                                            
                                        <input type="text" value="{{ $car->model }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="brand">Car Brand <span class="text-danger" title="Required">*</span></label>                                            
                                        <input type="text" value="{{ $car->brand }}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>                                
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="car_class">Car Class <span class="text-danger" title="Required">*</span></label>                                            
                                        <input type="text" value="{{ $car->car_class }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="color">Car Color <span class="text-danger" title="Required">*</span></label>                                            
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
                                        <label for="capacity">Capacity <span class="text-danger" title="Required">*</span></label>                                            
                                        <input type="text" class="form-control" value="{{ $car->capacity }}" readonly />
                                        <span class="text-danger errorCapacity"></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="tax">Tax </label>                                            
                                        <input type="text" id="tax" name="tax" class="form-control" value="{{ $car->tax }}" readonly/>
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
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">Driver Details</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="img1">Image One <span class="text-danger" title="Required">*</span></label>
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">
                                                                <input type='file' name="img1" id="img1Upload" accept=".png, .jpg, .jpeg" required/>
                                                                <label for="img1Upload"><i class="fas fa-pencil-alt"></i></label>
                                                            </div>
                                                            <div class="avatar-preview" style="width:100%">
                                                                <div id="img1Preview" style="background-image: url({{ asset('quicar/backend/img/upload2.jpg') }});"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="img2">Image Two </label>
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">
                                                                <input type='file' name="img2" id="img2Upload" accept=".png, .jpg, .jpeg"/>
                                                                <label for="img2Upload"><i class="fas fa-pencil-alt"></i></label>
                                                            </div>
                                                            <div class="avatar-preview" style="width:100%">
                                                                <div id="img2Preview" style="background-image: url({{ asset('quicar/backend/img/upload2.jpg') }});"></div>
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
                                        <div class="card-header">Current Ride Details</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="img1">Image One <span class="text-danger" title="Required">*</span></label>
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">
                                                                <input type='file' name="img1" id="img1Upload" accept=".png, .jpg, .jpeg" required/>
                                                                <label for="img1Upload"><i class="fas fa-pencil-alt"></i></label>
                                                            </div>
                                                            <div class="avatar-preview" style="width:100%">
                                                                <div id="img1Preview" style="background-image: url({{ asset('quicar/backend/img/upload2.jpg') }});"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="img2">Image Two </label>
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">
                                                                <input type='file' name="img2" id="img2Upload" accept=".png, .jpg, .jpeg"/>
                                                                <label for="img2Upload"><i class="fas fa-pencil-alt"></i></label>
                                                            </div>
                                                            <div class="avatar-preview" style="width:100%">
                                                                <div id="img2Preview" style="background-image: url({{ asset('quicar/backend/img/upload2.jpg') }});"></div>
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
                                        <div class="card-header">Product Images</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="img1">Image One <span class="text-danger" title="Required">*</span></label>
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">
                                                                <input type='file' name="img1" id="img1Upload" accept=".png, .jpg, .jpeg" required/>
                                                                <label for="img1Upload"><i class="fas fa-pencil-alt"></i></label>
                                                            </div>
                                                            <div class="avatar-preview" style="width:100%">
                                                                <div id="img1Preview" style="background-image: url({{ asset('quicar/backend/img/upload2.jpg') }});"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="img2">Image Two </label>
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">
                                                                <input type='file' name="img2" id="img2Upload" accept=".png, .jpg, .jpeg"/>
                                                                <label for="img2Upload"><i class="fas fa-pencil-alt"></i></label>
                                                            </div>
                                                            <div class="avatar-preview" style="width:100%">
                                                                <div id="img2Preview" style="background-image: url({{ asset('quicar/backend/img/upload2.jpg') }});"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" style="margin-top:30px;">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="img3">Image Three </label>
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">
                                                                <input type='file' name="img3" id="img3Upload" accept=".png, .jpg, .jpeg"/>
                                                                <label for="img3Upload"><i class="fas fa-pencil-alt"></i></label>
                                                            </div>
                                                            <div class="avatar-preview" style="width:100%">
                                                                <div id="img3Preview" style="background-image: url({{ asset('quicar/backend/img/upload2.jpg') }});"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="img4">Image Three </label>
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">
                                                                <input type='file' name="img4" id="img4Upload" accept=".png, .jpg, .jpeg"/>
                                                                <label for="img4Upload"><i class="fas fa-pencil-alt"></i></label>
                                                            </div>
                                                            <div class="avatar-preview" style="width:100%">
                                                                <div id="img4Preview" style="background-image: url({{ asset('quicar/backend/img/upload2.jpg') }});"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="img5">Image Three </label>
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">
                                                                <input type='file' name="img5" id="img5Upload" accept=".png, .jpg, .jpeg"/>
                                                                <label for="img5Upload"><i class="fas fa-pencil-alt"></i></label>
                                                            </div>
                                                            <div class="avatar-preview" style="width:100%">
                                                                <div id="img5Preview" style="background-image: url({{ asset('quicar/backend/img/upload2.jpg') }});"></div>
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
<script src="{{ asset('quicar/backend/js/car.js')}}"></script>
<script>
    $("#car").addClass('active');
</script>    
@endsection
