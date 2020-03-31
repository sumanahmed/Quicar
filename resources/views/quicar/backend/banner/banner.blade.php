@extends('quicar.backend.layout.admin')
@section('title','Banner')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Banner</h4>
                            <a class="btn btn-success float-right cursor-pointer" data-toggle="modal" data-target="#addModal"><i data-feather="plus"></i>&nbsp; Add New</a>
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
                                <tbody id="carTypeData">
                                @if(isset($banners) && count($banners) > 0)
                                    @php $i=1; @endphp
                                    @foreach($banners as $banner)
                                        <tr class="banner-{{ $banner->id }}">
                                            <td>{{ $banner->title }}</td>
                                            <td><img src="{{ asset($banner->image) }}" style="width:100px;height:80px"/></td>
                                            <td><?php echo $banner->status == 1 ? "Show" : "Hide"; ?></td>
                                            <td style="vertical-align: middle;text-align: center;">
                                                <button value="{{ $banner->id }}" class="btn btn-raised btn-info edit_modal"><i class="fas fa-edit"></i></button>
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
     <!-- Add Car Type Modal -->
     <div id="addModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content tx-14">
                <form method="post" id="adminStore">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Banner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mg-b-0" style="padding: 2px 15px !important;">
                            <div class="form-row">
                                <div class="form-group col-md-10 offset-md-1">
                                    <label for="title">Title <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Enter Banner Title" required>
                                    <span class="text-danger titleError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-10 offset-md-1">
                                    <label for="image">Image <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="file" name="image" id="image" class="form-control" required>
                                    <span class="text-danger imageError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-10 offset-md-1">
                                    <label for="status">Status <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1">Show</option>
                                        <option value="2">Hide</option>
                                    </select>
                                    <span class="text-danger dealerCommisssionError"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success tx-13" id="create">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit zone Modal -->
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Zone</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mg-b-0" style="padding: 2px 15px !important;">
                        <input type="hidden" class="form-control" name="edit_id" id="edit_id">
                        <div class="form-row">
                            <div class="form-group col-md-10 offset-md-1">
                                <label for="edit_name">Name <span class="text-danger text-bold" title="Required Field">*</span></label>
                                <input type="text" name="edit_name" id="edit_name" class="form-control" value="" placeholder="Enter Your Name" required>
                                <span class="text-danger nameError"></span>
                            </div>
                        </div>
                        <div class="form-row">
                                <div class="form-group col-md-10 offset-md-1">
                                    <label for="name">Monthly Charge BDT <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="text" name="edit_monthly_charge" id="edit_monthly_charge" class="form-control" value="{{ old('monthly_charge') }}" placeholder="Enter Monthly Charge" required>
                                    <span class="text-danger monthlyChargeError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-10 offset-md-1">
                                    <label for="name">Admin Commisssion BDT <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="text" name="edit_admin_commisssion" id="edit_admin_commisssion" class="form-control" value="{{ old('admin_commisssion') }}" placeholder="Enter Admin Commisssion" required>
                                    <span class="text-danger adminCommisssionError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-10 offset-md-1">
                                    <label for="name">Dealer Commisssion BDT <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="text" name="edit_dealer_commisssion" id="edit_dealer_commisssion" class="form-control" value="{{ old('dealer_commisssion') }}" placeholder="Enter Dealer Commisssion" required>
                                    <span class="text-danger dealerCommisssionError"></span>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-raised" id="update">Update</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/banner.js')}}"></script>
    <script>
        $("#banner").addClass('active');
    </script>
    @if(Session::has('error_message'))
        <script>
            toastr.warning("{{ Session::get('error_message') }}")
        </script>
    @endif
    @if(Session::has('message'))
        <script>
            toastr.success("{{ Session::get('message') }}")
        </script>
    @endif
@endsection
