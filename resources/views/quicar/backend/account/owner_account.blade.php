@extends('quicar.backend.layout.admin')
@section('title','Partner Account')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="incomed">
                        <div class="incomed-body">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('backend.account.owner_account') }}" method="get" class="form-horizontal">
                                        <div class="form-row">
                                            <div class="form-group col-3">
                                                <label>Start Date</label>
                                                <input type="text" name="start_date" class="datePicker form-control" @isset($start_date) value="{{ $start_date }}" @endisset/>    
                                            </div>
                                            <div class="form-group col-3">
                                                <label>End Date</label>
                                                <input type="text" name="end_date" class="datePicker form-control"  @isset($end_date) value="{{ $end_date }}" @endisset/>    
                                            </div>
                                            <div class="form-group col-3">
                                                <label></label>
                                                <input type="submit" class="btn btn-success" value="Filter" style="margin-top: 28px;"/>    
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5 class="card-title">Partner Account</h4>
                                </div>
                                <div class="card-body">
                                <table class="table table-bordered" id="ownerAccountTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Partner Name</th>
                                            <th>Partner Phone</th>
                                            <th>Ride ID</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody id="IncomeData">
                                        @if(isset($owner_accounts) && count($owner_accounts) > 0)
                                            @php $i=1; $total = 0; @endphp
                                            @foreach($owner_accounts as $owner_account)
                                                <tr class="owner_account-{{ $owner_account->id }}">
                                                    <td>{{ $owner_account->owner_name }}</td>
                                                    <td>{{ $owner_account->owner_phone }}</td>
                                                    <td>{{ $owner_account->ride_id }}</td>
                                                    @if($owner_account->type == 0)
                                                        <td><span class="badge badge-success">Debit</span></td>
                                                    @else
                                                        <td><span class="badge badge-danger">Credit</span></td>
                                                    @endif                                            
                                                    <td>{{ $owner_account->amount }}</td>                                            
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center">No Data Found</td>
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
@endsection
@section('scripts')
<script>
    $(".account-sub").addClass('show');
    $("#owner_account").addClass('active');
    $('#ownerAccountTable').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
        }
    });
</script>    
@endsection
