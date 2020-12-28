@extends('quicar.backend.layout.admin')
@section('title','Expired Car')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Cars</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="carTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Car Reg No</th>
                                    <th>Partner </th>
                                    <th>Tax Expired</th>
                                    <th>Fitness Expired</th>
                                    <th>Registration Expired</th>
                                    <th>Insurance Expired</th>
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="carData">
                                @if(isset($cars) && count($cars) > 0)
                                    @php $i=1; @endphp
                                    @foreach($cars as $car)
                                        <tr class="car-{{ $car->id }}">
                                            <td>{{ $car->carRegisterNumber }}</td>
                                            <td>{{ $car->owner_name }} <br/> {{ $car->owner_phone }}</td>
                                            <td>{{ $car->tax_expired_date }}</td>                                     
                                            <td>{{ $car->fitness_expired_date }}</td>                                     
                                            <td>{{ $car->registration_expired_date }}</td>                                     
                                            <td>{{ $car->insurance_expired_date }}</td>                                     
                                            <td style="vertical-align: middle;text-align: center;">                                              
                                                <a href="#" class="btn btn-raised btn-info" data-toggle="modal" id="ownerSendNotification" data-target="#ownerSendNotificationModal" title="Send Notification" data-id="{{ $car->id }}" data-phone="{{ $car->owner_phone }}" data-n_key="{{ $car->owner_n_key }}"><i class="fas fa-bell"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">No Data Found</td>
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
    <!-- driver details -->
    <div class="modal fade" tabindex="-1" id="driverDetailModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-center text-white w-100">Driver Details</h5>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td id="driver_name"></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td id="driver_phone"></td>
                            </tr>
                            <tr>
                                <th>Current Status</th>
                                <td id="current_status"></td>
                            </tr>
                            <tr>
                                <th>Nid</th>
                                <td id="nid"></td>
                            </tr>
                            <tr>
                                <th>Account Status</th>
                                <td id="account_status"></td>
                            </tr>
                            <tr>
                                <th>License</th>
                                <td><img id="driver_license" style="width:100px;height:60px;"/></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/owner.js')}}"></script>
<script>
    $("#expired").addClass('active');
</script>    
@endsection
