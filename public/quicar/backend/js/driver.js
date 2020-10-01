$('#driverTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
    }
});

//create driver
$("#createDriver").click(function (e) {
    e.preventDefault();

    var form_data = new FormData($("#createDriverForm")[0]);
    form_data.append('name', $("#name").val());
    form_data.append('email', $("#email").val());
    form_data.append('phone', $("#phone").val());
    form_data.append('dob', $("#dob").val());
    form_data.append('owner_id', $("#owner_id :selected").val());
    form_data.append('nid', $("#nid").val());
    form_data.append('division', $("#division").val());
    form_data.append('district', $("#district").val());
    form_data.append('address', $("#address").val());

    $.ajax({
        type:'POST',
        url: '/admin/drivers/store',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.nameError').text(response.errors.name);
                }else{
                    $('.nameError').text('');
                }               
                if(response.errors.phone){
                    $('.phoneError').text(response.errors.phone);
                }else{
                    $('.phoneError').text('');
                }               
                if(response.errors.dob){
                    $('.dobError').text(response.errors.dob);
                }else{
                    $('.dobError').text('');
                }               
                if(response.errors.owner_id){
                    $('.ownerError').text(response.errors.owner_id);
                }else{
                    $('.ownerError').text('');
                }               
                if(response.errors.nid){
                    $('.nidError').text(response.errors.nid);
                }else{
                    $('.nidError').text('');
                }               
                if(response.errors.division){
                    $('.divisionError').text(response.errors.division);
                }else{
                    $('.divisionError').text('');
                }               
                if(response.errors.district){
                    $('.districtError').text(response.errors.district);
                }else{
                    $('.districtError').text('');
                }               
                if(response.errors.address){
                    $('.addressError').text(response.errors.address);
                }else{
                    $('.addressError').text('');
                }               
            }else{
                $('#createDriverModal').modal('hide');
                if(response.data.account_status == 1){
                    var status = "Active";
                }else{
                    var status = "Inactive";
                }
                $("#allDriver").append('' +
                    '<tr class="driver-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.name +'</td>\n' +
                        '<td>'+ response.data.email +'</td>\n' +
                        '<td>'+ response.data.phone +'</td>\n' +
                        '<td><img src="http://quicarbd.com/'+ response.data.img +'" style="width:80px;height:80px;"/></td>\n' +
                        '<td>'+ status +'</td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +                        
                            '<button class="btn btn-info" data-toggle="modal" id="editDriver" data-target="#editDriverModal" data-id="'+ response.data.id +'" data-name="'+ response.data.name +'"\n' + 
                                'data-email="'+ response.data.email +'" data-phone="'+ response.data.phone +'" data-dob="'+ response.data.dob +'" data-owner_id="'+ response.data.owner_id +'" data-nid="'+ response.data.nid +'"\n' + 
                                'data-division="'+ response.data.division +'" data-district="'+ response.data.district +'" data-address="'+ response.data.address +'" data-img="http://quicarbd.com/'+ response.data.img +'"\n' + 
                                'data-license="http://quicarbd.com/'+ response.data.license +'" title="Edit"><i class="fas fa-edit"></i></button>\n' +                            
                            '<button class="btn btn-danger" data-toggle="modal" id="deleteDriver" data-target="#deleteDriverModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#name").val('');
                $("#email").val('');
                $("#phone").val('');
                $("#dob").val('');
                $("#owner_id").val('');
                $("#nid").val('');
                $("#division").val('');
                $("#district").val('');
                $("#address").val('');
                toastr.success('Driver Created.')
            }
        }
    });
});

//open edit Driver modal
$(document).on('click', '#editDriver', function () {
    console.log('yess');
    $('#editDriverModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_name').val($(this).data('name'));
    $('#edit_email').val($(this).data('email'));
    $('#edit_phone').val($(this).data('phone'));
    $('#edit_dob').val($(this).data('dob'));
    $('#edit_owner_id').val($(this).data('owner_id'));
    $('#edit_nid').val($(this).data('nid'));
    $('#edit_division').val($(this).data('division'));
    $('#edit_district').val($(this).data('district'));
    $('#edit_address').val($(this).data('address'));
    $("#previous_image").attr("src", $(this).data('img'));
    $("#previous_license").attr("src", $(this).data('license'));
});

//update driver
$("#updateDriver").click(function (e) {
    e.preventDefault();

    var form_data = new FormData($("#editDriverForm")[0]);
    form_data.append('id', $("#edit_id").val());
    form_data.append('name', $("#edit_name").val());
    form_data.append('email', $("#edit_email").val());
    form_data.append('phone', $("#edit_phone").val());
    form_data.append('dob', $("#edit_dob").val());
    form_data.append('owner_id', $("#edit_owner_id :selected").val());
    form_data.append('nid', $("#edit_nid").val());
    form_data.append('division', $("#edit_division").val());
    form_data.append('district', $("#edit_district").val());
    form_data.append('address', $("#edit_address").val());

    $.ajax({
        type:'POST',
        url: '/admin/drivers/update',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.nameError').text(response.errors.name);
                }else{
                    $('.nameError').text('');
                }               
                if(response.errors.phone){
                    $('.phoneError').text(response.errors.phone);
                }else{
                    $('.phoneError').text('');
                }               
                if(response.errors.dob){
                    $('.dobError').text(response.errors.dob);
                }else{
                    $('.dobError').text('');
                }               
                if(response.errors.owner_id){
                    $('.ownerError').text(response.errors.owner_id);
                }else{
                    $('.ownerError').text('');
                }               
                if(response.errors.nid){
                    $('.nidError').text(response.errors.nid);
                }else{
                    $('.nidError').text('');
                }               
                if(response.errors.division){
                    $('.divisionError').text(response.errors.division);
                }else{
                    $('.divisionError').text('');
                }               
                if(response.errors.district){
                    $('.districtError').text(response.errors.district);
                }else{
                    $('.districtError').text('');
                }               
                if(response.errors.address){
                    $('.addressError').text(response.errors.address);
                }else{
                    $('.addressError').text('');
                }               
            }else{
                $('#editDriverModal').modal('hide');
                if(response.data.account_status == 1){
                    var status = "Active";
                }else{
                    var status = "Inactive";
                }
                $("tr.driver-"+ response.data.id).replaceWith('' +
                    '<tr class="driver-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.name +'</td>\n' +
                        '<td>'+ response.data.email +'</td>\n' +
                        '<td>'+ response.data.phone +'</td>\n' +
                        '<td><img src="http://quicarbd.com/'+ response.data.img +'" style="width:80px;height:80px;"/></td>\n' +
                        '<td>'+ status +'</td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +                        
                            '<button class="btn btn-info" data-toggle="modal" id="editDriver" data-target="#editDriverModal" data-id="'+ response.data.id +'" data-name="'+ response.data.name +'"\n' + 
                                'data-email="'+ response.data.email +'" data-phone="'+ response.data.phone +'" data-dob="'+ response.data.dob +'" data-owner_id="'+ response.data.owner_id +'" data-nid="'+ response.data.nid +'"\n' + 
                                'data-division="'+ response.data.division +'" data-district="'+ response.data.district +'" data-address="'+ response.data.address +'" data-img="http://quicarbd.com/'+ response.data.img +'"\n' + 
                                'data-license="http://quicarbd.com/'+ response.data.license +'" title="Edit"><i class="fas fa-edit"></i></button>\n' +                            
                            '<button class="btn btn-danger" data-toggle="modal" id="deleteDriver" data-target="#deleteDriverModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Driver Update.')
            }
        }
    });
});

//open delete driver modal
$(document).on('click', '#deleteDriver', function () {
    $('#deleteDriverModal').modal('show');
    $('input[name=del_id]').val($(this).data('id'));
 });

//destroy driver
$("#destroyDriver").click(function(){
    $.ajax({
        type: 'POST',
        url: '/admin/drivers/destroy',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('input[name=del_id]').val()
        },
        success: function (response) {
            $('#deleteDriverModal').modal('hide');
            $('.driver-' + $('input[name=del_id]').val()).remove();
            toastr.success(response.message)
        }
    });
});






