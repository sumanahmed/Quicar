@extends('quicar.backend.layout.admin')
@section('title','User Account')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="incomed">
                        <div class="incomed-body">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('backend.account.user_account') }}" method="get" class="form-horizontal">
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
                                    <h5 class="card-title">User Account</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered" id="userAccountTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>User Name</th>
                                                <th>User Phone</th>
                                                <th>Total Ride</th>
                                                <th>Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>               
                                            @foreach($user_accounts as $user_account)
                                                @php 
                                                    $user = \App\User::select('name','phone')->where('api_token', $user_account->user_id)->first();
                                                @endphp
                                                <tr class="user_account-{{ $user_account->id }}">
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->phone }}</td>                                                    
                                                    <td>{{ $user_account->total_ride }}</td>   
                                                    <td>{{ $user_account->amount }}</td>   
                                                    <td>
                                                        <a href="{{ route('backend.account.user_account.details', $user_account->user_id) }}" class="btn btn-info">Details</a>
                                                    </td>                                         
                                                </tr>
                                            @endforeach                       
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
