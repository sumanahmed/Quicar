$('#partnerBannerTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
    }
});

//create banner
$("#createPartnerBanner").click(function (e) {
    e.preventDefault();
    var form_data = new FormData($("#createPartnerBannerForm")[0]);
    form_data.append('title', $("#title").val());
    form_data.append('details', $("#details").val());
    form_data.append('status', $("#status :selected").val());
    $.ajax({
        type:'POST',
        url: '/admin/home_owner_banner/store',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.title){
                    $('.titleError').text(response.errors.title);
                }
                if (response.errors.details) {
                    $('.detailsError').text(response.errors.details);
                }
                if (response.errors.status) {
                    $('.statusError').text(response.errors.status);
                }
                if (response.errors.img) {
                    $('.imageError').text(response.errors.img);
                }
            }else{
                $('#createPartnerBannerModal').modal('hide');
                if(response.data.status == 1){
                    var status = "Show";
                }else{
                    var status = "Hide";
                }
                $("#allPartnerBanner").append('' +
                    '<tr class="partiner_banner-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.title +'</td>\n' +
                        '<td>'+ status +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.image_url +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +
                            '<button class="btn btn-warning" data-toggle="modal" id="editPartnerBanner" data-target="#editPartnerBannerModal" data-id="'+ response.data.id +'" data-title="'+ response.data.title +'" data-status="'+ response.data.status +'" data-details="'+ response.data.details +'" data-img="'+ response.data.image_url +'" title="Edit"><i class="fas fa-edit"></i></button>\n' +
                            '<button class="btn btn-danger" data-toggle="modal" id="deletePartnerBanner" data-target="#deletePartnerBannerModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#title").val('');
                $("#details").val('');
                $("#status").val('');
                $("#image").val('');
                toastr.success('Parnter Banner Created.')
            }
        }
    });
});

//open edit Banner modal
$(document).on('click', '#editPartnerBanner', function () {
    var image = image_base_path + $(this).data('img');
    $('#editPartnerBannerModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_title').val($(this).data('title'));
    $('#edit_details').val($(this).data('details'));
    $('#edit_status').val($(this).data('status'));
    $("#bannerPreviousImage").attr("src", image);
 });

 // update master category
$("#updatePartnerBanner").click(function (e) {
    e.preventDefault();
    var form_data = new FormData($("#editPartnerBannerForm")[0]);
    form_data.append('id', $("#edit_id").val());
    form_data.append('title', $("#edit_title").val());
    form_data.append('details', $("#edit_details").val());
    form_data.append('status', $("#edit_status :selected").val());
    $.ajax({
        type:'POST',
        url: '/admin/home_owner_banner/update',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.title){
                    $('.titleError').text(response.errors.title);
                }
                if (response.errors.details) {
                    $('.detailsError').text(response.errors.details);
                }
                if (response.errors.status) {
                    $('.statusError').text(response.errors.status);
                }
                if (response.errors.img) {
                    $('.imageError').text(response.errors.img);
                }
            }else{
                $('#editPartnerBannerModal').modal('hide');
                if(response.data.status == 1){
                    var status = "Show";
                }else{
                    var status = "Hide";
                }
                $("tr.partiner_banner-"+ response.data.id).replaceWith('' +
                    '<tr class="partiner_banner-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.title +'</td>\n' +
                        '<td>'+ status +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.image_url +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +
                            '<button class="btn btn-warning" data-toggle="modal" id="editPartnerBanner" data-target="#editPartnerBannerModal" data-id="'+ response.data.id +'" data-title="'+ response.data.title +'" data-status="'+ response.data.status +'" data-details="'+ response.data.details +'" data-img="'+ response.data.image_url +'" title="Edit"><i class="fas fa-edit"></i></button>\n' +
                            '<button class="btn btn-danger" data-toggle="modal" id="deletePartnerBanner" data-target="#deletePartnerBannerModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Banner Updated.')
            }
        }
    });
});

// open delete user modal
$(document).on('click', '#deletePartnerBanner', function () {
    var id = $(this).val();
    $('#deletePartnerBannerModal').modal('show');
    $('input[name=del_id]').val($(this).data('id'));
});

// delete user
$('#destroyPartnerBanner').click(function () {
    $.ajax({
        type: 'POST',
        url: '/admin/home_owner_banner/destroy',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('input[name=del_id]').val()
        },
        success: function (data) {
            $('#deletePartnerBannerModal').modal('hide');
            $('.partiner_banner-' + $('input[name=del_id]').val()).remove();
            toastr.success('Banner Delete Successfully')
        }
    });
});