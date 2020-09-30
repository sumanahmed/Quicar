@extends('quicar.backend.layout.admin')
@section('title','Partners')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Partners</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="ownerTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Joining Date & Time</th>
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="partnerData">
                                    @if(isset($owners) && count($owners) > 0)
                                        @php $i=1; @endphp
                                        @foreach($owners as $owner)
                                            <tr class="owner-{{ $owner->id }}">
                                                <td>{{ $owner->name }}</td>
                                                <td>{{ $owner->email }}</td>
                                                <td>{{ $owner->phone }}</td>
                                                <td>{{ date('d.m.Y', strtotime($owner->date))." ".date('h:i:s a', strtotime($owner->time)) }}</td>
                                                <td><img src="http://quicarbd.com/{{ $owner->img }}" style="width:80px;height:60px"/>
                                                <td style="vertical-align: middle;text-align: center;">
                                                 @if($owner->account_status == "1")                                            
                                                        <a href="{{ route('backend.owner.status.update',['owner_id'=> $owner->id, 'status'=>1]) }}" class="btn btn-raised btn-danger" title="Deactive"><i class="fas fa-angle-down"></i></a>
                                                    @else
                                                        <a href="{{ route('backend.owner.status.update',['owner_id'=> $owner->id, 'status'=>1]) }}" class="btn btn-raised btn-success" title="Active"><i class="fas fa-angle-up"></i></a>
                                                    @endif  
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
<script src="{{ asset('quicar/backend/js/owner.js')}}"></script>
<script>
    $("#owner").addClass('active');
</script>
@endsection
