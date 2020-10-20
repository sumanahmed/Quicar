@extends('quicar.backend.layout.admin')
@section('title','Partner Withdraw')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="incomed">
                        <div class="incomed-body">
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5 class="card-title">Partner Withdraw Request</h4>
                                </div>
                                <div class="card-body">
                                <table class="table table-bordered" id="withdrawTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Partner Name</th>
                                            <th>Partner Phone</th>
                                            <th>Amount</th>
                                            <th>Sender Phone</th>
                                            <th>TnxID</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="allWithdraw">
                                        @if(isset($withdraws) && count($withdraws) > 0)                                            
                                            @foreach($withdraws as $withdraw)
                                                <tr class="withdraw-{{ $withdraw->id }}">
                                                    <td>{{ $withdraw->name }}</td>
                                                    <td>{{ $withdraw->phone }}</td>                                                                                            
                                                    <td>{{ $withdraw->amount }}</td>    
                                                    <td>01620xxxxxx</td>    
                                                    <td>Jq123asdf231</td>    
                                                    <td>
                                                        <a class="btn btn-info" href="#" data-toggle="modal" id="payWithdraw" data-target="#payWithdrawModal" data-id="{{ $withdraw->id }}" data-name="{{ $withdraw->name }}" data-phone="{{ $withdraw->phone }}" data-amount="{{ $withdraw->amount }}" title="Pay Now">Pay Now</a>
                                                    </td>                                        
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6" class="text-center">No Data Found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </div>
    <div id="payWithdrawModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content tx-14">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Pay Withdraw Request Amount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mg-b-0" style="padding: 2px 15px !important;">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Name <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" id="name" class="form-control"  readonly>
                                <input type="hidden" id="withdraw_id" />
                                <span class="text-danger nameError"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Phone <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" id="phone" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Available Amount <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" id="avaialbe_amount" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Requested Amount <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" id="requested_amount" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Sender Phone <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" id="sender_phone" class="form-control" placeholder="Enter Sender Phone Number">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">TnxID <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" id="tnxId" class="form-control" placeholder="Enter Send Amount tnx id">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-success tx-13" id="sendWithdrawAmount">Send</button>
                            <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(".account-sub").addClass('show');
    $("#withdraw").addClass('active');
    $('#withdrawTable').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
        }
    });
</script>    
@endsection
