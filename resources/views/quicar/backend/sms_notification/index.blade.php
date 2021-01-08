@extends('quicar.backend.layout.admin')
@section('title','SMS & Notification')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Users</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.sms_notification.send') }}" class="col-md-offset-3 col-md-6" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="for" class="control-label">For <span class="text-danger" title="Required">*</span></label>                                 
                                    <select id="for" name="for" class="form-control">
                                        <option value="1">User</option>
                                        <option value="2">Partner</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="status" class="control-label">Status <span class="text-danger" title="Required">*</span></label>                                    
                                    <select id="status" name="status" class="form-control">
                                        <option value="1">Approved</option>
                                        <option value="0">Pending</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title" class="control-label">Title <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                                </div>
                                
                                <div class="form-group">
                                    <label for="message" class="control-label">Message <span class="text-danger" title="Required">*</span></label>
                                    <textarea class="form-control" name="message"  id="message" placeholder="Enter your message"></textarea>
                                    <span class="errorMessage text-danger text-bold"></span>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-4">                                
                                        <input type="radio" name="notification" id="notification" value="1" checked>
                                        <label class="col-form-label">Notification</label>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <input type="radio" name="notification" id="sms_notification" value="2">
                                        <label class="col-form-label">SMS & Notification </label>                                
                                    </div>
                                    <span class="errorMessage text-danger text-bold"></span>
                                </div>

                                <div class="form-group">
                                <button type="submit" class="btn btn-success tx-13">Send</button>
                                <button type="reset" class="btn btn-danger tx-13">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/user.js')}}"></script>
<script>
    $("#sms_notification").addClass('active');
</script>
@endsection
