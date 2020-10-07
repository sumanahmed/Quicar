@extends('quicar.backend.layout.admin')
@section('title','Edit Car')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('backend.car.update', $car->id) }}" method="post" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mt-2 tx-spacing--1 float-left">Update Car</h4>
                            </div>
                            <div class="card-body">                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="name" name="name" value="{{ $car->name }}" class="form-control" required>
                                            <span class="text-danger errorName"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">                                        
                                        <div class="form-group">
                                            <label for="registration_no"> Registration No <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="registration_no" name="registration_no" value="{{ $car->registration_no }}" class="form-control" required>
                                            <span class="text-danger errorRegistrationNo"></span>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="year">Car Year <span class="text-danger" title="Required">*</span></label>                                            
                                            <select id="year" name="year" class="form-control selectable" required>
                                                @foreach($years as $year)
                                                    <option value="{{ $year->value }}" @if($year->value == $car->year) selected @endif>{{ $year->value }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger errorYear"></span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="model">Car Model <span class="text-danger" title="Required">*</span></label>                                            
                                            <select id="model" name="model" class="form-control selectable" required>
                                                @foreach($models as $model)
                                                    <option value="{{ $model->value }}" @if($model->value == $car->model) selected @endif>{{ $model->value }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger errorModel"></span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="brand">Car Brand <span class="text-danger" title="Required">*</span></label>                                            
                                            <select id="brand" name="brand" class="form-control selectable" required>
                                                @foreach($brands as $brand)
                                                    <option value="{{ $brand->value }}" @if($brand->value == $car->brand) selected @endif>{{ $brand->value }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger errorYear"></span>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="car_class">Car Class <span class="text-danger" title="Required">*</span></label>                                            
                                            <select id="car_class" name="car_class" class="form-control selectable" required>
                                                @foreach($classes as $class)
                                                    <option value="{{ $class->value }}" @if($class->value == $car->car_class) selected @endif>{{ $class->value }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger errorClass"></span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="color">Car Color <span class="text-danger" title="Required">*</span></label>                                            
                                            <select id="color" name="color" class="form-control selectable" required>
                                                @foreach($colors as $color)
                                                    <option value="{{ $color->value }}" @if($color->value == $car->color) selected @endif>{{ $color->value }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger errorColor"></span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="capacity">Capacity <span class="text-danger" title="Required">*</span></label>                                            
                                            <input type="text" id="capacity" name="capacity" class="form-control" value="{{ $car->capacity }}" required />
                                            <span class="text-danger errorCapacity"></span>
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
                                                            <label for="img1">Image One <span class="text-danger" title="Required">*</span></label>
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' name="img1" id="img1Upload" accept=".png, .jpg, .jpeg" required/>
                                                                    <label for="img1Upload"><i class="fas fa-pencil-alt"></i></label>
                                                                </div>
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img1Preview" style="background-image: url(http://quicarbd.com{{ $car->img1 }});"></div>
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
                                                                    <div id="img2Preview" style="background-image: url(http://quicarbd.com{{ $car->img2 }});"></div>
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
                                                                    <div id="img3Preview" style="background-image: url(http://quicarbd.com{{ $car->img3 }});"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="img4">Image Four </label>
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' name="img4" id="img4Upload" accept=".png, .jpg, .jpeg"/>
                                                                    <label for="img4Upload"><i class="fas fa-pencil-alt"></i></label>
                                                                </div>
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img4Preview" style="background-image: url(http://quicarbd.com{{ $car->img4 }});"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="img5">Image Five </label>
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' name="img5" id="img5Upload" accept=".png, .jpg, .jpeg"/>
                                                                    <label for="img5Upload"><i class="fas fa-pencil-alt"></i></label>
                                                                </div>
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img5Preview" style="background-image: url(http://quicarbd.com{{ $car->img5 }});"></div>
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
                                            <div class="card-header">Expired date assigned by file</div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="img1">Tax Paper <span class="text-danger" title="Required">*</span></label>
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' name="img1" id="img1Upload" accept=".png, .jpg, .jpeg" required/>
                                                                    <label for="img1Upload"><i class="fas fa-pencil-alt"></i></label>
                                                                </div>
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img1Preview" style="background-image: url(http://quicarbd.com{{ $car->tax }});"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="tax_expired_date">Tax Expired Date <span class="text-danger" title="Required">*</span></label>
                                                            <input type="text" id="tax_expired_date" name="tax_expired_date" class="form-control datePicker" required/>
                                                            <span class="text-danger errorTax"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="img1">Fitness Paper <span class="text-danger" title="Required">*</span></label>
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' name="img1" id="img1Upload" accept=".png, .jpg, .jpeg" required/>
                                                                    <label for="img1Upload"><i class="fas fa-pencil-alt"></i></label>
                                                                </div>
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img1Preview" style="background-image: url(http://quicarbd.com{{ $car->fitness }});"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="fitness_expired_date">Fitness Expired Date <span class="text-danger" title="Required">*</span></label>
                                                            <input type="text" id="fitness_expired_date" name="fitness_expired_date" class="form-control datePicker" required/>
                                                            <span class="text-danger errorFitness"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="img1">Registration Paper <span class="text-danger" title="Required">*</span></label>
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' name="img1" id="img1Upload" accept=".png, .jpg, .jpeg" required/>
                                                                    <label for="img1Upload"><i class="fas fa-pencil-alt"></i></label>
                                                                </div>
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img1Preview" style="background-image: url(http://quicarbd.com{{ $car->registration }});"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="registration_expired_date">Registration Expired Date <span class="text-danger" title="Required">*</span></label>
                                                            <input type="text" id="registration_expired_date" name="registration_expired_date" class="form-control datePicker" required/>
                                                            <span class="text-danger errorRegistration"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="img1">Insurance Paper <span class="text-danger" title="Required">*</span></label>
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' name="img1" id="img1Upload" accept=".png, .jpg, .jpeg" required/>
                                                                    <label for="img1Upload"><i class="fas fa-pencil-alt"></i></label>
                                                                </div>
                                                                <div class="avatar-preview" style="width:100%">
                                                                    <div id="img1Preview" style="background-image: url(http://quicarbd.com{{ $car->insurance }});"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="registration_expired_date">Insurance Expired Date <span class="text-danger" title="Required">*</span></label>
                                                            <input type="text" id="insurance_expired_date" name="insurance_expired_date" class="form-control datePicker" required/>
                                                            <span class="text-danger errorInsurance"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
<script src="{{ asset('quicar/backend/js/car.js')}}"></script>
<script>
    $("#car").addClass('active');
</script>    
@endsection
