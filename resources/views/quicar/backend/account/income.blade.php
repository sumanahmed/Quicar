@extends('quicar.backend.layout.admin')
@section('title','Incomes')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="incomed">
                        <div class="incomed-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Incomes</h4>
                        </div>
                        <div class="incomed-body">
                            <table class="table table-bordered" id="incomeTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>User Name</th>
                                        <th>User Phone</th>
                                        <th>Ride ID</th>
                                        <th>Tnx ID</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="IncomeData">
                                @if(isset($incomes) && count($incomes) > 0)
                                    @php $i=1; $total = 0; @endphp
                                    @foreach($incomes as $income)
                                        @php $total += $income->amount; @endphp
                                        <tr class="income-{{ $income->id }}">
                                            <td>{{ $income->user_name }}</td>
                                            <td>{{ $income->user_phone }}</td>
                                            <td>{{ $income->ride_id }}</td>
                                            <td>{{ $income->tnx_id }}</td>
                                            <td>{{ $income->date }}</td>
                                            <td>{{ date("H:i:s a", strtotime($income->time)) }}</td>
                                            <td>{{ $income->amount }}</td>                                            
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6" class="text-center"><b>Total Amount</b></td>
                                        <td><b>{{ $total }}</b></td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">No Data Found</td>
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
@endsection
@section('scripts')
<script src="{{ asset('quiincome/backend/js/income.js')}}"></script>
<script>
    $(".account-sub").addClass('show');
    $("#income").addClass('active');
</script>    
@endsection
