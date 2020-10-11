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
                            <a class="btn btn-success float-right cursor-pointer" href="#" data-toggle="modal" data-target="#createBannerModal"><i data-feather="plus"></i>&nbsp; Add New</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="carTypeTable">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Title</th>
                                    <th>Link</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="allBanner">
                                @if(isset($banners) && count($banners) > 0)
                                    @php $i=1; @endphp
                                    @foreach($banners as $banner)
                                        <tr class="banner-{{ $banner->id }}">
                                            <td>{{ $banner->title }}</td>
                                            <td>{{ $banner->link }}</td>
                                            <td>{{ $banner->type == 1 ? 'User' : 'Owner' }}</td>
                                            <td>{{ $banner->status == 1 ? 'Show' : 'Hide' }}</td>
                                            <td><img src="http://quicarbd.com/{{$banner->img }}" style="width:100px;height:50px"/></td>                                           
                                            <td style="vertical-align: middle;text-align: center;">
                                                <a href="#" class="btn btn-warning btn-info" data-toggle="modal" id="editBanner" data-target="#editBannerModal" data-id="{{ $banner->id }}" data-title="{{ $banner->title }}" data-type="{{ $banner->type }}" data-link="{{ $banner->link }}" data-status="{{ $banner->status }}" data-des="{{ $banner->des }}" data-img="{{ $banner->img }}" title="Edit"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-raised btn-danger" data-toggle="modal" id="deleteBanner" data-target="#deleteBannerModal" data-id="{{ $banner->id }}" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">No Data Found</td>
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
    <div id="createBannerModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="createBanneryForm" method="POST" enctype="multipart/form-data">
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
                                    <label for="des">Description <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <textarea name="des" id="des" class="form-control"placeholder="Enter Description" required></textarea>
                                    <span class="text-danger desError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="link">Link <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="text" name="link" id="link" class="form-control"placeholder="Enter Link" required>
                                    <span class="text-danger linkError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="link">Type <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <select name="type" id="type" class="form-control" required>                                    
                                        <option value="1">User</option>
                                        <option value="2">Owner</option>
                                    </select>
                                    <span class="text-danger typeError"></span>
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
                                <button type="button" class="btn btn-success tx-13" id="createBanner">Save</button>
                                <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Car Class Edit Modal -->
    <div id="editBannerModal" class="modal fade bd-example-modal-xl mt-3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <form id="editBannerForm" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-content tx-14">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Update Banner</h5>
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
                                    <label for="des">Description <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <textarea name="des" id="edit_des" class="form-control"placeholder="Enter Description" required></textarea>
                                    <span class="text-danger desError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="link">Link <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <input type="text" name="link" id="edit_link" class="form-control"placeholder="Enter Link" required>
                                    <span class="text-danger linkError"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="link">Type <span class="text-danger text-bold" title="Required Field">*</span></label>
                                    <select name="type" id="edit_type" class="form-control" required>                                    
                                        <option value="1">User</option>
                                        <option value="2">Owner</option>
                                    </select>
                                    <span class="text-danger typeError"></span>
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
                                <button type="button" class="btn btn-success tx-13" id="updateBanner">Update</button>
                                <button type="button" class="btn btn-danger tx-13" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Class Modal -->
    <div id="deleteBannerModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-danger btn-raised mr-2" id="destroyBanner"><i class="fas fa-trash-alt"></i> Proceed</button>
                    <button type="button" class="btn btn-warning btn-raised" data-dismiss="modal" aria-label="Close"><i class="fas fa-backspace"></i> Cancel</button>
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
@endsection
