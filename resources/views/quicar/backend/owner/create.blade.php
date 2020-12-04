@extends('quicar.backend.layout.admin')
@section('title','Partner')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('backend.owner.store') }}" method="post" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mt-2 tx-spacing--1 float-left">Add New Partner</h4>
                            </div>
                            <div class="card-body">                                
                                <div class="row">
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger" title="Required">*</span></label>
                                            <input type="text" id="name" name="name" placeholder="Enter Name" class="form-control" required>
                                            @if($errors->has('name'))
                                                <span class="text-danger"> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">                                        
                                        <div class="form-group">
                                            <label for="email">Email <span class="text-danger" title="Required">*</span></label>
                                            <input type="email" id="email" name="email" placeholder="Enter Email Address" class="form-control" required>
                                            @if($errors->has('email'))
                                                <span class="text-danger"> {{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="phone">Phone <span class="text-danger" title="Required">*</span></label>                                            
                                            <input type="phone" id="phone" name="phone" placeholder="Enter Phone Number" class="form-control" required>
                                            @if($errors->has('phone'))
                                                <span class="text-danger"> {{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="dob">Date of Birth <span class="text-danger" title="Required">*</span></label>                                            
                                            <input type="dob" id="phone" name="dob" class="form-control datePicker" required>
                                            @if($errors->has('dob'))
                                                <span class="text-danger"> {{ $errors->first('dob') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="nid">NID No <span class="text-danger" title="Required">*</span></label>                                            
                                            <input type="nid" id="nid" name="nid" placeholder="Enter NID Number" class="form-control" required>
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
                                                    <option value="{{ $district->value }}">{{ $district->value }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('district'))
                                                <span class="text-danger"> {{ $errors->first('district') }}</span>
                                            @endif
                                        </div>
                                    </div>                                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="city">City <span class="text-danger" title="Required">*</span></label>               
                                            <select type="city" id="city" name="city" class="form-control" required>
                                                @foreach($citys as $city)
                                                    <option value="{{ $city->name }}">{{ $city->name }}</option>
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
                                            <input type="area" id="area" name="area" placeholder="Enter area" class="form-control" required>
                                            @if($errors->has('area'))
                                                <span class="text-danger"> {{ $errors->first('area') }}</span>
                                            @endif
                                        </div>
                                    </div>                                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="img">Image </label>                                            
                                            <input type="file" name="img" class="form-control" />
                                            @if($errors->has('img'))
                                                <span class="text-danger"> {{ $errors->first('img') }}</span>
                                            @endif
                                        </div>
                                    </div>
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
<script src="{{ asset('quicar/backend/js/owner.js')}}"></script>
<script>
    $("#owner").addClass('active');
</script>    
@endsection
