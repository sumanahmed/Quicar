
$('#zoneTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
    }
});

// Add Zone
$('#create').click(function(){
    var name        = $('input[name=name]').val();
    $.ajax({
        type:'POST',
        url:'/admin/zones-store',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data:{
            name:name
        },
        success:function(data){
            if((data.errors)){
                if(data.errors.name){
                    $('.nameError').text(data.errors.name);
                }else{
                    $('.nameError').text('');
                }
            }else{
                $('#addModal').modal('hide');
                $("#zoneData").append(
                    '<tr class="zone-' + data.id + '">' +
                        '<td>' + data.name + '</td>' +
                        '<td> </td>' +
                        '<td  style="vertical-align: middle;text-align: center;">' +
                            '<button value="' + data.id + '" class="btn btn-raised btn-info edit_modal"><i class="fas fa-edit"></i></button> '+
                            '<button value="' + data.id + '" class="btn btn-raised btn-danger delete_modal"><i class="fas fa-trash-alt"></i></button>'+
                        '</td>' +
                        '<input type="hidden" id="name_'+ data.id+'" value="' + data.name + '"/>\n' +
                    '</tr>'
                );
                $('input[name=name]').val('');
                toastr.success('Zone Created Successfully')
            }
        }
    });
});

// show zone data in edit modal
$(document).on('click', '.edit_modal', function () {
    var id = $(this).val();
    $("#edit_id").val(id);
    $('#editZoneModal').modal('show');
    $("#edit_name").val($("#name_"+id).val());
});

// update zone data
$("#update").click(function () {
    var name = $('input[name=edit_name]').val();
    var id=$('input[name=edit_id]').val();

    $.ajax({
        type: 'POST',
        url: '/admin/zones-update',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            name: name,
            id:id
        },
        success: function (data) {
            if ((data.errors)) {
                if(data.errors.name){
                    $('.nameError').text(data.errors.name);
                }else{
                    $('.nameError').text('');
                }
            } else {
                $('#editZoneModal').modal('hide');
                $(".zone-" + data.id).replaceWith(
                '<tr class="zone-' + data.id + '">' +
                        '<td>' + data.name + '</td>' +
                        '<td  style="vertical-align: middle;text-align: center;">' +
                            '<button value="' + data.id + '" class="btn btn-raised btn-info edit_modal"><i class="fas fa-edit"></i></button> '+
                            '<button value="' + data.id + '" class="btn btn-raised btn-danger delete_modal"><i class="fas fa-trash-alt"></i></button>'+
                        '</td>' +
                        '<input type="hidden" id="name_'+ data.id+'" value="' + data.name + '"/>\n' +
                    '</tr>'
                );
                toastr.success('Zone Update Successfully')
            }
        }
    });
});