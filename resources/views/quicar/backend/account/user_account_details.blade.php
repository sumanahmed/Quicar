@extends('quicar.backend.layout.admin')
@section('title','User Account')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="incomed">
                        <div>
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5 class="card-title">User Account</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered" id="userAccountTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Ride ID</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Reason</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>       
                                            @php $total=0; @endphp        
                                            @foreach($user_accounts as $user_account)
                                                @php $total += $user_account->amount; @endphp
                                                <tr class="user_account-{{ $user_account->id }}">
                                                    <td>{{ $user_account->ride_id }}</td>
                                                    <td>{{ $user_account->date }}</td>                                                    
                                                    <td>{{ $user_account->time }}</td>                                                    
                                                    <td>{{ $user_account->reason }}</td>                                                    
                                                    <td>{{ $user_account->amount }}</td>    
                                                </tr>
                                            @endforeach    
                                            <tr>
                                                <td colspan="4">Total</td>
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
    $("#user_account").addClass('active');
    $('#userAccountTable').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
        }
    });
</script>    
@endsection
