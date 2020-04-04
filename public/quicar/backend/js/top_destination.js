// open delete user modal
$(document).on('click', '.delete_modal', function () {
    var id = $(this).val();
    $('#deleteTopDestinationModal').modal('show');
    $('input[name=del_id]').val(id);
});

// delete user
$('#topDestinationDelete').click(function () {
    $.ajax({
        type: 'POST',
        url: '/admin/top-destination-delete',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('input[name=del_id]').val()
        },
        success: function (data) {
            $('#deleteTopDestinationModal').modal('hide');
            $('.top_destination-' + $('input[name=del_id]').val()).remove();
            toastr.success('Top Destination Delete Successfully')
        }
    });
});