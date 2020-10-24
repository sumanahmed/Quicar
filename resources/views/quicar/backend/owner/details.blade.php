@extends('quicar.backend.layout.admin')
@section('title','Partner Details')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">Partner Details</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $owner->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $owner->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date of Birth</th>
                                        <td>{{ $owner->dob }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $owner->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Ride</th>
                                        <td>{{ $total_ride }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Complete</th>
                                        <td>{{ $total_complete }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Cancel</th>
                                        <td>{{ $total_cancel }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Spend</th>
                                        <td>{{ $total_spend }}</td>
                                    </tr>
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
<script>
    $("#owner").addClass('active');
</script>
@endsection
