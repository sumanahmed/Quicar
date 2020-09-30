@extends('quicar.backend.layout.admin')
@section('title','Users')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Users</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="userTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Joining Date & Time</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="userData">
                                    @if(isset($users) && count($users) > 0)
                                        @foreach($users as $user)
                                            <tr class="user-{{ $user->id }}">
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ date('d.m.Y', strtotime($user->date))." ".date('h:i:s a', strtotime($user->time)) }}</td>
                                                <td><img src="http://quicarbd.com/{{ $user->img }}" style="width:80px;height:60px"/>
                                                <td>{{ $user->account_status == 1 ? 'Active' : 'Inactive' }} </td>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    @if($user->account_status == "1")                                            
                                                        <a href="{{ route('backend.user.status.update',['user_id'=> $user->id, 'status'=>0]) }}" class="btn btn-raised btn-danger" title="Deactive"><i class="fas fa-angle-down"></i></a>
                                                    @else
                                                        <a href="{{ route('backend.user.status.update',['user_id'=> $user->id, 'status'=>1]) }}" class="btn btn-raised btn-success" title="Active"><i class="fas fa-angle-up"></i></a>
                                                    @endif                                                    
                                                    <a href="#" class="btn btn-raised btn-info" title="Send Notification"><i class="fas fa-bell"></i></a>
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
     <div id="deleteCarTypeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-danger btn-raised mr-2" id="cartypeDelete"><i class="fas fa-trash-alt"></i> Proceed</button>
                    <button type="button" class="btn btn-warning btn-raised" data-dismiss="modal" aria-label="Close"><i class="fas fa-backspace"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/user.js')}}"></script>
<script>
    $("#user").addClass('active');
</script>
@endsection
