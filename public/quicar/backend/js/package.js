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
    $('#deleteCarTypeModal').modal('show');
    $('input[name=del_id]').val(id);
});

// delete user
$('#cartypeDelete').click(function () {
    $.ajax({
        type: 'POST',
        url: '/admin/car-types-delete',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('input[name=del_id]').val()
        },
        success: function (data) {
            $('#deleteCarTypeModal').modal('hide');
            $('.car_type-' + $('input[name=del_id]').val()).remove();
            toastr.success('Car Type Delete Successfully')
        }
    });
});