// Add Banner
$(document).ready(function() {
    $("#create").click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'/admin/banner-store',
            method:'POST',
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            data:new FormData($("#saveBannerForm")[0]),
            success:function(data){
                if((data.errors)){
                    if(data.errors.title){
                        $('.titleError').text(data.errors.title);
                    }else{
                        $('.titleError').text('');
                    }
                    if (data.errors.status) {
                        $('.statusError').text(data.errors.status);
                    }else{
                        $('.statusError').text('');
                    }
                }else{
                    $('#addModal').modal('hide');
                    var status = data.sta == 1 ? 'Show' : 'Hide';
                    $("#bannerData").append(
                        '<tr class="banner-' + data.id + '">' +
                            '<td>' + data.title + '</td>' +
                            '<td><img src="' + data.image + '" style="width:100px;height:80px"/></td>' +
                            '<td>'+ status +'</td>' +
                            '<td  style="vertical-align: middle;text-align: center;">' +
                                '<button value="' + data.id + '" class="btn btn-raised btn-info edit_modal"><i class="fas fa-edit"></i></button>'+
                                '<button value="' + data.id + '" class="btn btn-raised btn-danger delete_modal"><i class="fas fa-trash-alt"></i></button>'+
                            '</td>' +
                            '<input type="hidden" id="title_'+ data.id+'" value="' + data.title + '"/>\n' +
                            '<input type="hidden" id="image_'+ data.id+'" value="' + data.image + '"/>\n' +
                            '<input type="hidden" id="status_'+ data.id+'" value="' + data.status + '"/>\n' +
                        '</tr>'
                    );
                    $('input[name=title]').val('');
                    $('input[name=image]').val('');
                    $('input[name=status]').val('');
                    toastr.success('Banner Created Successfully')
                }
            }
        });

    });
});


$('#create').click(function(){
    var name        = $('input[name=name]').val();
    var email       = $('input[name=email]').val();
    var phone       = $('input[name=phone]').val();
    var password    = $('input[name=password]').val();
    var district_id = $('select[name=district_id] :selected').val();
    var upazila_id  = $('select[name=upazila_id] :selected').val();
    var zone_id     = $('select[name=zone_id] :selected').val();

    $.ajax({
        type:'POST',
        url:'/admin/banners-store',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data:{
            name:name,
            email:email,
            phone:phone,
            password:password,
            district_id:district_id,
            upazila_id:upazila_id,
            zone_id:zone_id,
        },
        success:function(data){
            if((data.errors)){
                if(data.errors.name){
                    $('.nameError').text(data.errors.name);
                }else{
                    $('.nameError').text('');
                }

                if (data.errors.email) {
                    $('.emailError').text(data.errors.email);
                }else{
                    $('.emailError').text('');
                }

                if (data.errors.phone) {
                    $('.errorPhone').text(data.errors.phone);
                }else{
                    $('.errorPhone').text('');
                }

                if (data.errors.password) {
                    $('.errorPassword').text(data.errors.password);
                }else{
                    $('.errorPassword').text('');
                }

                if (data.errors.district_id) {
                    $('.errorDistrict').text(data.errors.district_id);
                }else{
                    $('.errorDistrict').text('');
                }

                if (data.errors.upazila_id) {
                    $('.errorUpazila').text(data.errors.upazila_id);
                }else{
                    $('.errorUpazila').text('');
                }

                if (data.errors.zone_id) {
                    $('.errorZone').text(data.errors.zone_id);
                }else{
                    $('.errorZone').text('');
                }
            }else{
                $('#addModal').modal('hide');
                $("#bannerData").append(
                    '<tr class="banner-' + data.id + '">' +
                        '<td>' + data.name + '</td>' +
                        '<td>' + data.email + '</td>' +
                        '<td>' + data.phone + '</td>' +
                        '<td>' + data.gender + '</td>' +
                        '<td  style="vertical-align: middle;text-align: center;">' +
                            '<button value="' + data.id + '" class="btn btn-raised btn-info edit_modal"><i class="fas fa-edit"></i></button>'+
                            '<button value="' + data.id + '" class="btn btn-raised btn-danger delete_modal"><i class="fas fa-trash-alt"></i></button>'+
                        '</td>' +
                        '<input type="hidden" id="name_'+ data.id+'" value="' + data.name + '"/>\n' +
                        '<input type="hidden" id="email_'+ data.id+'" value="' + data.email + '"/>\n' +
                        '<input type="hidden" id="phone_'+ data.id+'" value="' + data.phone + '"/>\n' +
                        '<input type="hidden" id="password_'+ data.id+'" value="' + data.password + '"/>\n' +
                        '<input type="hidden" id="gender_'+ data.id+'" value="' + data.gender + '"/>\n' +
                    '</tr>'
                );
                $('input[name=name]').val('');
                $('input[name=email]').val('');
                $('input[name=phone]').val('');
                $('input[name=password]').val('');
                $('select[name=gender]').val('');
                toastr.success('User Created Successfully')
            }
        }
    });
});