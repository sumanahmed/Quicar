$('#driverTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
    }
});

//create offer
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
                $("#allDriver").append('' +
                    '<tr class="driver-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.name +'</td>\n' +
                        '<td>'+ response.data.email +'</td>\n' +
                        '<td>'+ response.data.phone +'</td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +                        
                            '<button class="btn btn-warning" data-toggle="modal" id="editDriver" data-target="#editDriverModal" data-id="'+ response.data.id +'" data-name="'+ response.data.value +'" title="Edit"><i class="fas fa-edit"></i></button>\n' +                            
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