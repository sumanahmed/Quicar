@extends('quicar.backend.layout.admin')
@section('title','Partner Account')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="incomed">
                        <div>
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5 class="card-title">Partner Account Details</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered" id="userAccountTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Ride ID</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Reason</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>       
                                            @php $total=0; @endphp        
                                            @foreach($owner_accounts as $owner_account)
                                                @php $total += $owner_account->amount; @endphp
                                                <tr class="owner_account-{{ $owner_account->id }}">
                                                    <td>{{ $owner_account->ride_id }}</td>
                                                    <td>{{ $owner_account->date }}</td>                                                    
                                                    <td>{{ $owner_account->time }}</td>                                                    
                                                    <td>{{ $owner_account->reason }}</td>  
                                                    @if($owner_account->type == 0)
                                                        <td><span class="badge badge-success">Debit</span></td>
                                                    @else
                                                        <td><span class="badge badge-danger">Credit</span></td>
                                                    @endif                                                   
                                                    <td>{{ $owner_account->amount }}</td>    
                                                </tr>
                                            @endforeach    
                                            <tr>
                                                <td colspan="5">Total</td>
                                                <td>{{ $total }}</td>
                                            </tr>                   
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
