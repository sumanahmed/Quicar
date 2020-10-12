$('#packageTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
    }
});


// open delete user modal
$(document).on('click', '.package_add_remove', function () {
    var id = $(this).data('id');
    var status = $(this).data('status');
    var title = $(this).data('title');
    var des = $(this).data('des');
    $.ajax({
        type: 'POST',
        url: '/admin/package/add-remove',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id      : id,
            status  : status,
            title   : title,
            des     : des,
        },
        success: function (response) {          
            if(response.status == 403){
                toastr.error(response.message)
            }else{
                toastr.success(response.message)
            }
            location.reload();            
        }
    });
});

// open delete user modal
$(document).on('click', '.delete_modal', function () {
    var id = $(this).val();
    $('#deletePackageModal').modal('show');
    $('input[name=del_id]').val(id);
});

// delete user
$('#packageDelete').click(function () {
    $.ajax({
        type: 'POST',
        url: '/admin/package/destroy',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('input[name=del_id]').val()
        },
        success: function (response) {
            $('#deletePackageModal').modal('hide');
            $('.package-' + $('input[name=del_id]').val()).remove();
            if(response.status == 403){
                toastr.error(response.message)
            }else{
                toastr.success(response.message)
            }
            
        }
    });
});