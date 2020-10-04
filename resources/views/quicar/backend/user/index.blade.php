@extends('quicar.backend.layout.admin')
@section('title','Users')
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
                            <table class="table table-bordered" id="userTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Joining Date & Time</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="userData">
                                    @if(isset($users) && count($users) > 0)
                                        @foreach($users as $user)
                                            <tr class="user-{{ $user->id }}">
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ date('d.m.Y', strtotime($user->date))." ".date('h:i:s a', strtotime($user->time)) }}</td>
                                                <td><img src="http://quicarbd.com/{{ $user->img }}" style="width:80px;height:60px"/>
                                                <td>{{ $user->account_status == 1 ? 'Active' : 'Inactive' }} </td>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    @if($user->account_status == "1")                                            
                                                        <a href="{{ route('backend.user.status.update',['user_id'=> $user->id, 'status'=>0]) }}" class="btn btn-raised btn-danger" title="Deactive"><i class="fas fa-angle-down"></i></a>
                                                    @else
                                                        <a href="{{ route('backend.user.status.update',['user_id'=> $user->id, 'status'=>1]) }}" class="btn btn-raised btn-success" title="Active"><i class="fas fa-angle-up"></i></a>
                                                    @endif                                                    
                                                    <a href="#" class="btn btn-raised btn-info" data-toggle="modal" id="userSendNotification" data-target="#userSendNotificationModal" title="Send Notification" data-id="{{ $user->id }}" data-phone="{{ $user->phone }}" data-n_key="{{ $user->n_key }}"><i class="fas fa-bell"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">No Data Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </div>
     <!-- Delete Car Type Modal -->
     <div id="userSendNotificationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
            <div class="modal-content tx-14">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">User Send Notification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mg-b-0" style="padding: 2px 15px !important;">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="col-form-label">Title <span class="text-danger" title="Required">*</span></label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" required>
                                <input type="hidden" name="n_key" id="n_key" />
                                <input type="hidden" name="phone" id="phone" />
                                <span class="errorTitle text-danger text-bold"></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="col-form-label">Message <span class="text-danger" title="Required">*</span></label>
                                <textarea class="form-control" name="message"  id="message" placeholder="Enter your message"></textarea>
                                <span class="errorMessage text-danger text-bold"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">                                
                                <input type="radio" name="notification" id="notification" value="1" checked>
                                <label class="col-form-label">Notification</label>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="radio" name="notification" id="sms_notification" value="2">
                                <label class="col-form-label">SMS & Notification </label>                                
                            </div>
                            <span class="errorMessage text-danger text-bold"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-success tx-13" id="userNotificationSend">Send</button>
                            <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/user.js')}}"></script>
<script>
    $("#user").addClass('active');
</script>
@endsection
