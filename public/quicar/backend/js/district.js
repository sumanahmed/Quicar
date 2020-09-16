$('#districtTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
    }
});

//create offer
$("#createDistrict").click(function (e) {
    e.preventDefault();
    var name = $("#name").val();
    $.ajax({
        type:'POST',
        url: '/admin/districts/store',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            name : name,
        },
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.nameError').text(response.errors.name);
                }else{
                    $('.nameError').text('');
                }               
            }else{
                $('#createDistrictModal').modal('hide');
                $("#allDistrict").append('' +
                    '<tr class="district-'+ response.data.id +'">\n' +
                        '<td>'+ name +'</td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +                        
                            '<button class="btn btn-warning" data-toggle="modal" id="editDistrict" data-target="#editDistrictModal" data-id="'+ response.data.id +'" data-name="'+ response.data.value +'" title="Edit"><i class="fas fa-edit"></i></button>\n' +
                            '<button class="btn btn-danger" data-toggle="modal" id="deleteDistrict" data-target="#deleteDistrictModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#name").val('');
                toastr.success('Car District Created.')
            }
        }
    });
});


//open edit District modal
$(document).on('click', '#editDistrict', function () {
    $('#editDistrictModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_name').val($(this).data('name'));
 });

// update District
$("#updateDistrict").click(function (e) {
    e.preventDefault();
    var id      = $("#edit_id").val();
    var name    = $("#edit_name").val();
    $.ajax({
        type:'POST',
        url: '/admin/districts/update',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id    : id,
            name  : name,
        },
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.nameError').text(response.errors.name);
                }else{
                    $('.nameError').text('');
                }  
            }else{
                $('#editDistrictModal').modal('hide');
                $("tr.district-"+ response.data.id).replaceWith('' +
                    '<tr class="district-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.value +'</td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +
                            '<button class="btn btn-warning" data-toggle="modal" id="editDistrict" data-target="#editDistrictModal" data-id="'+ response.data.id +'" data-name="'+ response.data.value +'" title="Edit"><i class="fas fa-edit"></i></button>\n' +
                            '<button class="btn btn-danger" data-toggle="modal" id="deleteDistrict" data-target="#deleteDistrictModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('District Updated.')
            }
        }
    });
});

//open delete District modal
$(document).on('click', '#deleteDistrict', function () {
    $('#deleteDistrictModal').modal('show');
    $('input[name=del_id]').val($(this).data('id'));
 });

//destroy District
$("#destroyDistrict").click(function(){
    $.ajax({
        type: 'POST',
        url: '/admin/districts/destroy',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('input[name=del_id]').val()
        },
        success: function (data) {
            $('#deleteDistrictModal').modal('hide');
            $('.district-' + $('input[name=del_id]').val()).remove();
            toastr.success('District Deleted')
        }
    });
});