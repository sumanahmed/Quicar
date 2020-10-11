//create banner
$("#createBanner").click(function (e) {
    e.preventDefault();
    var form_data = new FormData($("#createBanneryForm")[0]);
    form_data.append('title', $("#title").val());
    form_data.append('des', $("#des").val());
    form_data.append('link', $("#link").val());
    form_data.append('type', $("#type :selected").val());
    form_data.append('status', $("#status :selected").val());
    $.ajax({
        type:'POST',
        url: '/admin/home_banner/store',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.title){
                    $('.titleError').text(response.errors.title);
                }else{
                    $('.titleError').text('');
                }
                if (response.errors.des) {
                    $('.desError').text(response.errors.des);
                }else{
                    $('.desError').text('');
                }               
                if (response.errors.link) {
                    $('.linkError').text(response.errors.link);
                }else{
                    $('.linkError').text('');
                }
                if (response.errors.type) {
                    $('.typeError').text(response.errors.type);
                }else{
                    $('.typeError').text('');
                } 
                if (response.errors.status) {
                    $('.statusError').text(response.errors.status);
                }else{
                    $('.statusError').text('');
                } 
                if (response.errors.img) {
                    $('.imageError').text(response.errors.img);
                }else{
                    $('.imageError').text('');
                }
            }else{
                $('#createBannerModal').modal('hide');
                if(response.data.status == 1){
                    var status = "Show";
                }else{
                    var status = "Hide";
                }
                if(response.data.type == 1){
                    var type = "User";
                }else{
                    var type = "Owner";
                }
                $("#allBanner").append('' +
                    '<tr class="banner-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.title +'</td>\n' +
                        '<td>'+ response.data.link +'</td>\n' +
                        '<td>'+ type +'</td>\n' +
                        '<td>'+ status +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.img +'" style="width:50px;"/></td>\n' +
                        '<td>\n' +
                            '<a href="#" class="btn btn-warning btn-info" data-toggle="modal" id="editBanner" data-target="#editBannerModal" data-id="'+ response.data.id +'" data-title="'+ response.data.title +'" data-type="'+ response.data.type +'" data-link="'+ response.data.link +'" data-status="'+ response.data.status +'" data-des="'+ response.data.des +'" data-img="'+ response.data.img +'" title="Edit"><i class="fas fa-edit"></i></a\n' +
                            '<button class="btn btn-raised btn-danger" data-toggle="modal" id="deleteBanner" data-target="#deleteBannerModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash-alt"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#title").val('');
                $("#link").val('');
                $("#des").val('');
                $("#type").val('');
                $("#status").val('');
                $("#image").val('');
                toastr.success('Banner Created.')
            }
        }
    });
});

//open edit Banner modal
$(document).on('click', '#editBanner', function () {
    var image = image_base_path + $(this).data('img');
    $('#editBannerModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_title').val($(this).data('title'));
    $('#edit_des').val($(this).data('des'));
    $('#edit_link').val($(this).data('link'));
    $('#edit_type').val($(this).data('type'));
    $('#edit_status').val($(this).data('status'));
    $("#bannerPreviousImage").attr("src", image);
 });

 // update master category
$("#updateBanner").click(function (e) {
    e.preventDefault();
    var form_data = new FormData($("#editBannerForm")[0]);
    form_data.append('title', $("#edit_title").val());
    form_data.append('des', $("#edit_des").val());
    form_data.append('link', $("#edit_link").val());
    form_data.append('type', $("#edit_type :selected").val());
    form_data.append('status', $("#edit_status :selected").val());
    $.ajax({
        type:'POST',
        url: '/admin/home_banner/update',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.title){
                    $('.titleError').text(response.errors.title);
                }else{
                    $('.titleError').text('');
                }
                if (response.errors.des) {
                    $('.desError').text(response.errors.des);
                }else{
                    $('.desError').text('');
                }               
                if (response.errors.link) {
                    $('.linkError').text(response.errors.link);
                }else{
                    $('.linkError').text('');
                }
                if (response.errors.type) {
                    $('.typeError').text(response.errors.type);
                }else{
                    $('.typeError').text('');
                } 
                if (response.errors.status) {
                    $('.statusError').text(response.errors.status);
                }else{
                    $('.statusError').text('');
                } 
                if (response.errors.img) {
                    $('.imageError').text(response.errors.img);
                }else{
                    $('.imageError').text('');
                }
            }else{
                $('#editBannerModal').modal('hide');
                if(response.data.status == 1){
                    var status = "Show";
                }else{
                    var status = "Hide";
                }
                if(response.data.type == 1){
                    var type = "User";
                }else{
                    var type = "Owner";
                }
                $("tr.banner-"+ response.data.id).replaceWith('' +
                    '<tr class="banner-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.title +'</td>\n' +
                        '<td>'+ response.data.link +'</td>\n' +
                        '<td>'+ type +'</td>\n' +
                        '<td>'+ status +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.img +'" style="width:50px;"/></td>\n' +
                        '<td>\n' +
                            '<a href="#" class="btn btn-warning btn-info" data-toggle="modal" id="editBanner" data-target="#editBannerModal" data-id="'+ response.data.id +'" data-title="'+ response.data.title +'" data-type="'+ response.data.type +'" data-link="'+ response.data.link +'" data-status="'+ response.data.status +'" data-des="'+ response.data.des +'" data-img="'+ response.data.img +'" title="Edit"><i class="fas fa-edit"></i></a\n' +
                            '<button class="btn btn-raised btn-danger" data-toggle="modal" id="deleteBanner" data-target="#deleteBannerModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash-alt"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Banner Updated.')
            }
        }
    });
});

// open delete user modal
$(document).on('click', '#deleteBanner', function () {
    var id = $(this).val();
    $('#deleteBannerModal').modal('show');
    $('input[name=del_id]').val($(this).data('id'));
});

// delete user
$('#destroyBanner').click(function () {
    $.ajax({
        type: 'POST',
        url: '/admin/home_banner/destroy',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('input[name=del_id]').val()
        },
        success: function (data) {
            $('#deleteBannerModal').modal('hide');
            $('.banner-' + $('input[name=del_id]').val()).remove();
            toastr.success('Banner Delete Successfully')
        }
    });
});