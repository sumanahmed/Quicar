// open delete user modal
$(document).on('click', '.delete_modal', function () {
    var id = $(this).val();
    $('#deleteBannerModal').modal('show');
    $('input[name=del_id]').val(id);
});

// delete user
$('#bannerDelete').click(function () {
    $.ajax({
        type: 'POST',
        url: '/admin/banner-delete',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('input[name=del_id]').val()
        },
        success: function (data) {
            $('#deleteCategoryModal').modal('hide');
            $('.category-' + $('input[name=del_id]').val()).remove();
            toastr.success('Banner Delete Successfully')
        }
    });
});