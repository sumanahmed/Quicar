@extends('quicar.backend.layout.admin')
@section('title','Partners')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Partners</h4>
                            <a class="btn btn-success float-right cursor-pointer" href="{{ route('backend.owner.create') }}"><i data-feather="plus"></i>&nbsp; Add New</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="ownerTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width:15%">Name</th>
                                        <th style="width:15%">Email</th>
                                        <th style="width:10%">Phone</th>
                                        <th style="width:10%">Joining Date & Time</th>
                                        <th style="width:15%">Image</th>
                                        <th style="width:15%">Current Status</th>
                                        <th style="width:15%">Status</th>
                                        <th style="width:25%; vertical-align: middle;text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="partnerData">
                                    @if(isset($owners) && count($owners) > 0)
                                        @php $i=1; @endphp
                                        @foreach($owners as $owner)
                                            <tr class="owner-{{ $owner->id }}">
                                                <td>{{ $owner->name }}</td>
                                                <td>{{ $owner->email }}</td>
                                                <td>{{ $owner->phone }}</td>
                                                <td>{{ date('d.m.Y', strtotime($owner->date))." ".date('h:i:s a', strtotime($owner->time)) }}</td>
                                                <td><img src="http://quicarbd.com/{{ $owner->img }}" style="width:80px;height:60px"/>
                                                <td>{{ $owner->current_status == 1 ? 'Online' : 'Offline' }} </td>
                                                <td>{{ $owner->account_status == 1 ? 'Active' : 'Inactive' }} </td>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    <a href="{{ route('backend.owner.details', $owner->id) }}" class="btn btn-raised btn-warning btn-sm" title="Detail"><i class="fas fa-eye"></i></a>
                                                    @if($owner->account_status == "1")                                            
                                                        <a href="{{ route('backend.owner.status.update',['owner_id'=> $owner->id, 'status'=>0]) }}" class="btn btn-raised btn-danger btn-sm" title="Deactive"><i class="fas fa-angle-down"></i></a>
                                                    @else
                                                        <a href="{{ route('backend.owner.status.update',['owner_id'=> $owner->id, 'status'=>1]) }}" class="btn btn-raised btn-success btn-sm" title="Active"><i class="fas fa-angle-up"></i></a>
                                                    @endif  
                                                    <a href="#" class="btn btn-raised btn-info btn-sm" data-toggle="modal" id="ownerSendNotification" data-target="#ownerSendNotificationModal" title="Send Notification" data-id="{{ $owner->id }}" data-phone="{{ $owner->phone }}" data-n_key="{{ $owner->n_key }}"><i class="fas fa-bell"></i></a>
                                                    <a href="{{ route('backend.owner.edit', $owner->id) }}" class="btn btn-raised btn-success btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
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
    <div id="ownerSendNotificationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content tx-14">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Owner Send Notification</h5>
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
                            <button type="button" class="btn btn-success tx-13" id="ownerNotificationSend">Send</button>
                            <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/owner.js')}}"></script>
<script>
    $("#owner").addClass('active');
</script>
@endsection
