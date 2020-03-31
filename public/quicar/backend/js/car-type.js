$('#carTypeTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
    }
});

// Add Car Type
$('#create').click(function(){
    var name                = $('input[name=name]').val();
    var monthly_charge      = $('input[name=monthly_charge]').val();
    var admin_commisssion   = $('input[name=admin_commisssion]').val();
    var dealer_commisssion  = $('input[name=dealer_commisssion]').val();
    $.ajax({
        type:'POST',
        url:'/admin/car-types-store',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data:{
            name:name,
            monthly_charge:monthly_charge,
            admin_commisssion:admin_commisssion,
            dealer_commisssion:dealer_commisssion,
        },
        success:function(data){
            if((data.errors)){
                if(data.errors.name){
                    $('.nameError').text(data.errors.name);
                }else{
                    $('.nameError').text('');
                }
                if(data.errors.monthly_charge){
                    $('.monthlyChargeError').text(data.errors.monthly_charge);
                }else{
                    $('.monthlyChargeError').text('');
                }
                if(data.errors.admin_commisssion){
                    $('.adminCommisssionError').text(data.errors.admin_commisssion);
                }else{
                    $('.adminCommisssionError').text('');
                }
                if(data.errors.dealer_commisssion){
                    $('.dealerCommisssionError').text(data.errors.dealer_commisssion);
                }else{
                    $('.dealerCommisssionError').text('');
                }
            }else{
                $('#addModal').modal('hide');
                $("#carTypeData").append(
                    '<tr class="car_type-' + data.id + '">' +
                        '<td>' + data.name + '</td>' +
                        '<td>' + data.monthly_charge + '</td>' +
                        '<td>' + data.admin_commisssion + '</td>' +
                        '<td>' + data.dealer_commisssion + '</td>' +
                        '<td  style="vertical-align: middle;text-align: center;">' +
                            '<button value="' + data.id + '" class="btn btn-raised btn-info edit_modal"><i class="fas fa-edit"></i></button> '+
                        '</td>' +
                        '<input type="hidden" id="name_'+ data.id+'" value="' + data.name + '"/>\n' +
                        '<input type="hidden" id="monthly_charge_'+ data.id+'" value="' + data.monthly_charge + '"/>\n' +
                        '<input type="hidden" id="admin_commisssion_'+ data.id+'" value="' + data.admin_commisssion + '"/>\n' +
                        '<input type="hidden" id="dealer_commisssion_'+ data.id+'" value="' + data.dealer_commisssion + '"/>\n' +
                    '</tr>'
                );
                $('input[name=name]').val('');
                toastr.success('Car Type Created Successfully')
            }
        }
    });
});

// show zone data in edit modal
$(document).on('click', '.edit_modal', function () {
    var id = $(this).val();
    $("#edit_id").val(id);
    $('#editModal').modal('show');
    $("#edit_name").val($("#name_"+id).val());
    $("#edit_monthly_charge").val($("#monthly_charge_"+id).val());
    $("#edit_admin_commisssion").val($("#admin_commisssion_"+id).val());
    $("#edit_dealer_commisssion").val($("#dealer_commisssion_"+id).val());
});

// update zone data
$("#update").click(function () {
    var name               = $('input[name=edit_name]').val();
    var monthly_charge     = $('input[name=edit_monthly_charge]').val();
    var admin_commisssion  = $('input[name=edit_admin_commisssion]').val();
    var dealer_commisssion = $('input[name=edit_dealer_commisssion]').val();
    var id=$('input[name=edit_id]').val();
    $.ajax({
        type: 'POST',
        url: '/admin/car-types-update',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            name: name,
            monthly_charge: monthly_charge,
            admin_commisssion: admin_commisssion,
            dealer_commisssion: dealer_commisssion,
            id:id
        },
        success: function (data) {
            if ((data.errors)) {
                if(data.errors.name){
                    $('.nameError').text(data.errors.name);
                }else{
                    $('.nameError').text('');
                }
                if(data.errors.monthly_charge){
                    $('.monthlyChargeError').text(data.errors.monthly_charge);
                }else{
                    $('.monthlyChargeError').text('');
                }
                if(data.errors.admin_commisssion){
                    $('.adminCommisssionError').text(data.errors.admin_commisssion);
                }else{
                    $('.adminCommisssionError').text('');
                }
                if(data.errors.dealer_commisssion){
                    $('.dealerCommisssionError').text(data.errors.dealer_commisssion);
                }else{
                    $('.dealerCommisssionError').text('');
                }
            } else {
                $('#editModal').modal('hide');
                $(".car_type-" + data.id).replaceWith(
                    '<tr class="car_type-' + data.id + '">' +
                        '<td>' + data.name + '</td>' +
                        '<td>' + data.monthly_charge + '</td>' +
                        '<td>' + data.admin_commisssion + '</td>' +
                        '<td>' + data.dealer_commisssion + '</td>' +
                        '<td  style="vertical-align: middle;text-align: center;">' +
                            '<button value="' + data.id + '" class="btn btn-raised btn-info edit_modal"><i class="fas fa-edit"></i></button> '+
                        '</td>' +
                        '<input type="hidden" id="name_'+ data.id+'" value="' + data.name + '"/>\n' +
                        '<input type="hidden" id="monthly_charge_'+ data.id+'" value="' + data.monthly_charge + '"/>\n' +
                        '<input type="hidden" id="admin_commisssion_'+ data.id+'" value="' + data.admin_commisssion + '"/>\n' +
                        '<input type="hidden" id="dealer_commisssion_'+ data.id+'" value="' + data.dealer_commisssion + '"/>\n' +
                    '</tr>'
                );
                toastr.success('Car Type Update Successfully')
            }
        }
    });
});