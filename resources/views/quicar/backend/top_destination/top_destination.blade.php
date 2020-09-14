@extends('quicar.backend.layout.admin')
@section('title','Top Destination')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Top Destination</h4>
                            <a class="btn btn-success float-right cursor-pointer" href="{{ route('backend.top-destination.create') }}"><i data-feather="plus"></i>&nbsp; Add New</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="carTypeTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="topDestinationData">
                                @if(isset($top_destinations) && count($top_destinations) > 0)
                                    @php $i=1; @endphp
                                    @foreach($top_destinations as $top_destination)
                                        <tr class="top_destination-{{ $top_destination->id }}">
                                            <td>{{ $top_destination->name }}</td>
                                            <td><img src="{{ asset($top_destination->image) }}" style="width:100px;height:50px"/></td>
                                            <td><?php echo $top_destination->status == 1 ? "Show" : "Hide"; ?></td>
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="{{ route('backend.top-destination.edit', $top_destination->id) }}" class="btn btn-raised btn-info"><i class="fas fa-edit"></i></a>
                                                <button value="{{ $top_destination->id }}" class="btn btn-raised btn-danger delete_modal"><i class="fas fa-trash-alt"></i></button>
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
    <!-- Delete User Modal -->
    <div id="deleteTopDestinationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-danger btn-raised mr-2" id="topDestinationDelete"><i class="fas fa-trash-alt"></i> Proceed</button>
                    <button type="button" class="btn btn-warning btn-raised" data-dismiss="modal" aria-label="Close"><i class="fas fa-backspace"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/top_destination.js')}}"></script>
    <script>
        $("#top_destination").addClass('active');
    </script>
@endsection
