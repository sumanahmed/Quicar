@extends('quicar.backend.layout.admin')
@section('title','Partner Banner')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">All Partner Banner</h4>
                            <a class="btn btn-success float-right cursor-pointer" href="#" data-toggle="modal" data-target="#createPartnerBannerModal"><i data-feather="plus"></i>&nbsp; Add New</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="partnerBannerTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="allPartnerBanner">
                                @if(isset($partner_banners) && count($partner_banners) > 0)
                                    @php $i=1; @endphp
                                    @foreach($partner_banners as $partner_banner)
                                        <tr class="partiner_banner-{{ $partner_banner->id }}">
                                            <td>{{ $partner_banner->title }}</td>
                                            <td>{{ $partner_banner->status == 1 ? 'Show' : 'Hide' }}</td>
                                            <td><img src="http://quicarbd.com/{{$partner_banner->image_url }}" style="width:100px;height:50px"/></td>                                           
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="#" class="btn btn-warning" data-toggle="modal" id="editPartnerBanner" data-target="#editPartnerBannerModal" data-id="{{ $partner_banner->id }}" data-title="{{ $partner_banner->title }}" data-details="{{ $partner_banner->details }}" data-status="{{ $partner_banner->status }}" data-img="{{ $partner_banner->image_url }}" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger" data-toggle="modal" id="deletePartnerBanner" data-target="#deletePartnerBannerModal" data-id="{{ $partner_banner->id }}" title="Delete"><i class="fas fa-trash-alt"></i></a>
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
    <!-- Car Class Create Modal -->
    <div id="createPartnerBannerModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="createPartnerBannerForm" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-content tx-14">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Add New Banner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mg-b-0" style="padding: 2px 15px !important;">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control"placeholder="Enter Title" required>
                                    <span class="text-danger titleError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="details">Details <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <textarea name="details" id="details" class="form-control"placeholder="Enter Details" required></textarea>
                                    <span class="text-danger detailsError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="link">Status <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <select name="status" id="status" class="form-control" required>                                    
                                        <option value="1">Show</option>
                                        <option value="0">Hide</option>
                                    </select>
                                    <span class="text-danger statusError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="link">Image <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="file" name="img" id="img"/>
                                    <span class="text-danger imageError"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="button" class="btn btn-success tx-13" id="createPartnerBanner">Save</button>
                                <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Car Class Edit Modal -->
    <div id="editPartnerBannerModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <form id="editPartnerBannerForm" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-content tx-14">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Update Partner Banner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mg-b-0" style="padding: 2px 15px !important;">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="text" name="title" id="edit_title" class="form-control"placeholder="Enter Title" required>
                                    <input type="hidden" id="edit_id" />
                                    <span class="text-danger titleError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="edit_details">Details <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <textarea name="edit_details" id="edit_details" class="form-control"placeholder="Enter Details" required></textarea>
                                    <span class="text-danger detailsError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="link">Status <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <select name="status" id="edit_status" class="form-control" required>                                    
                                        <option value="1">Show</option>
                                        <option value="0">Hide</option>
                                    </select>
                                    <span class="text-danger statusError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="link">Previous Image <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <img id="bannerPreviousImage" style="width:100px;height:80px;" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="link">Image <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="file" name="img" id="edit_img"/>
                                    <span class="text-danger imageError"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="button" class="btn btn-success tx-13" id="updatePartnerBanner">Update</button>
                                <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Class Modal -->
    <div id="deletePartnerBannerModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-danger btn-raised mr-2" id="destroyPartnerBanner"><i class="fas fa-trash-alt"></i> Proceed</button>
                    <button type="button" class="btn btn-warning btn-raised" data-dismiss="modal" aria-label="Close"><i class="fas fa-backspace"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/partner_banner.js')}}"></script>
    <script>
        $(".banners").addClass('show');
        $("#partner_banner").addClass('active');
    </script>
@endsection
