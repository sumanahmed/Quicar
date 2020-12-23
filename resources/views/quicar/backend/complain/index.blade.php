@extends('quicar.backend.layout.admin')
@section('title','Complain')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Complain</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="complainTable">
                                <thead class="thead-dark">
                                <tr>                                  
                                    <th>Owner</th>                                   
                                    <th>Complain Type</th>                                   
                                    <th>Message</th>                                 
                                    <th>Status</th>                                   
                                    <th>Answer Status</th>                                   
                                    <th>Answer Time</th>                                   
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="allFeedback">
                                @if(isset($complains) && count($complains) > 0)
                                    @foreach($complains as $complain)
                                        <tr class="feedback-{{ $complain->id }}">
                                            <td>{{ $complain->owner_name }} {{ $complain->owner_phone }}</td>
                                            @if($complain->report_type == 1)
                                                <td>Ride</td>
                                            @elseif($complain->report_type == 2)
                                                <td>Car Package</td>
                                            @elseif($complain->report_type == 3)
                                                <td>Hotel Package</td>
                                            @elseif($complain->report_type == 4)
                                                <td>Travel Package</td>
                                            @else   
                                                <td>Others</td>
                                            @endif 
                                            <td>{{ $complain->message }}</td>                                           
                                            @if($complain->status == 1)
                                                <td>Seen</td>
                                            @else 
                                                <td>Unseen</td>
                                            @endif
                                            @if($complain->answer_give == 1)
                                                <td>Answered</td>
                                            @else 
                                                <td>No Answer</td>
                                            @endif
                                            <td>{{ $complain->answer_time }}</td>
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="#" class="btn btn-raised btn-warning btn-sm" data-toggle="modal" id="replyFeedback" data-target="#replyFeedbackModal" data-id="{{ $complain->id }}" title="Reply"><i class="fas fa-reply"></i></a>
                                                <button href="#" class="btn btn-raised btn-danger btn-sm" data-toggle="modal" id="deleteFeedback" data-target="#deleteFeedbackModal" data-id="{{ $complain->id }}" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">No Data Found</td>
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

    <!-- Car Class Edit Modal -->
    <div id="replyFeedbackModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content tx-14">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Feedback Reply</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mg-b-0" style="padding: 2px 15px !important;">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Feedback</label>                                
                                <textarea id="feedback_feedback" class="form-control" rows="4" readonly></textarea>
                                <input type="hidden" id="feedback_id" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Reply <span class="text-danger text-bold" title="Required Field">*</span></label>                                
                                <textarea id="feedback_reply" class="form-control" rows="4"></textarea>
                                <span class="text-danger replyError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-success tx-13" id="feedbackReply">Reply</button>
                            <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Class Modal -->
    <div id="deleteFeedbackModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="del_id"/>
                    <button type="button" class="btn btn-danger btn-raised mr-2" id="destroyFeedback"><i class="fas fa-trash-alt"></i> Proceed</button>
                    <button type="button" class="btn btn-warning btn-raised" data-dismiss="modal" aria-label="Close"><i class="fas fa-backspace"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/feedback.js')}}"></script>
    <script>
        $("#complain").addClass('active');
        $('#complainTable').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });
    </script>    
@endsection
