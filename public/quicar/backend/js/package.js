$('#packageTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
    }
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
        url: '/admin/package-delete',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('input[name=del_id]').val()
        },
        success: function (data) {
            $('#deletePackageModal').modal('hide');
            $('.package-' + $('input[name=del_id]').val()).remove();
            toastr.success('Package Delete Successfully')
        }
    });
});