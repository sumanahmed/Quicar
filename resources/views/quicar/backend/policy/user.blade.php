@extends('quicar.backend.layout.admin')
@section('title','User Policy')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('backend.policy.user.update') }}" method="post" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mt-2 tx-spacing--1 float-left">Update User Policy</h4>
                            </div>
                            <div class="card-body">                                                
                                <div class="row">
                                    <div class="col-12">                                        
                                        <div class="form-group">
                                            <label for="terms_of_services"> Terms Of Services <span class="text-danger" title="Required">*</span></label>                                                                                       
                                            <textarea id="terms_of_services" name="terms_of_services" class="form-control ckeditor" placeholder="Details">{{ $policy_user->terms_of_services }}</textarea>
                                            @if($errors->has('terms_of_services'))
                                                <span class="text-danger"> {{ $errors->first('terms_of_services') }}</span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-12">                                        
                                        <div class="form-group">
                                            <label for="privacy_policy"> Privacy Policy <span class="text-danger" title="Required">*</span></label>                                                                                       
                                            <textarea id="privacy_policy" name="privacy_policy" class="form-control ckeditor" placeholder="Details">{{ $policy_user->privacy_policy }}</textarea>
                                            @if($errors->has('privacy_policy'))
                                                <span class="text-danger"> {{ $errors->first('privacy_policy') }}</span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-12">                                        
                                        <div class="form-group">
                                            <label for="booking_policy"> Booking Policy <span class="text-danger" title="Required">*</span></label>                                                                                       
                                            <textarea id="booking_policy" name="booking_policy" class="form-control ckeditor" placeholder="Details">{{ $policy_user->booking_policy }}</textarea>
                                            @if($errors->has('booking_policy'))
                                                <span class="text-danger"> {{ $errors->first('booking_policy') }}</span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-12">                                        
                                        <div class="form-group">
                                            <label for="cancellation_policy"> Cancellation Policy <span class="text-danger" title="Required">*</span></label>                                                                                       
                                            <textarea id="cancellation_policy" name="cancellation_policy" class="form-control ckeditor" placeholder="Details">{{ $policy_user->cancellation_policy }}</textarea>
                                            @if($errors->has('cancellation_policy'))
                                                <span class="text-danger"> {{ $errors->first('cancellation_policy') }}</span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-12">                                        
                                        <div class="form-group">
                                            <label for="payment_policy"> Payment Policy <span class="text-danger" title="Required">*</span></label>                                                                                       
                                            <textarea id="payment_policy" name="payment_policy" class="form-control ckeditor" placeholder="Details">{{ $policy_user->payment_policy }}</textarea>
                                            @if($errors->has('payment_policy'))
                                                <span class="text-danger"> {{ $errors->first('payment_policy') }}</span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-12">                                        
                                        <div class="form-group">
                                            <label for="refund_policy"> Refund Policy <span class="text-danger" title="Required">*</span></label>                                                                                       
                                            <textarea id="refund_policy" name="refund_policy" class="form-control ckeditor" placeholder="Details">{{ $policy_user->refund_policy }}</textarea>
                                            @if($errors->has('refund_policy'))
                                                <span class="text-danger"> {{ $errors->first('refund_policy') }}</span>
                                            @endif
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
<script>
    $(".policy").addClass('show');
    $("#userPolicy").addClass('active');
</script>    
@endsection
