$('#userTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
    }
});

//open send notification modal
$(document).on('click', '#userSendNotification', function () {
    var image = image_base_path + $(this).data('image');
    $('#userSendNotificationModal').modal('show');
    $('#notification_id').val($(this).data('id'));
 });

 //destroy master category
$("#userNotificationSend").click(function(){
    $.ajax({
        type: 'POST',
        url: '/admin/users/notification/send',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('input[name=del_id]').val()
        },
        success: function (response) {
            $('#userSendNotificationModal').modal('hide');
            if(response.status == '403'){
                toastr.error(response.message)
            }else{                
                toastr.success(response.message)
            }  
        }
    });
});