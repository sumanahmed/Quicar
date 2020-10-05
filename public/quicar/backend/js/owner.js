$('#ownerTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
    }
});

//open send notification modal
$(document).on('click', '#ownerSendNotification', function () {
    var image = image_base_path + $(this).data('image');
    $('#ownerSendNotificationModal').modal('show');
    $('#n_key').val($(this).data('n_key'));
    $('#phone').val($(this).data('phone'));
 });

 //destroy master category
$("#ownerNotificationSend").click(function(){
    var n_key       = $('#n_key').val();
    var title       = $('#title').val();
    var message     = $('#message').val();
    var notification= $('input[name=notification]:checked').val();
    var phone       = $('#phone').val();
    $.ajax({
        type: 'POST',
        url: '/admin/owners/notification/send',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            n_key       : n_key,
            title       : title,
            message     : message,
            notification: notification,
            phone       : phone,
        },
        success: function (response) {
            if((response.errors)){
                if(response.errors.title){
                    $('.errorTitle').text(response.errors.title);
                }else{
                    $('.errorTitle').text('');
                }  
                if(response.errors.message){
                    $('.errorMessage').text(response.errors.message);
                }else{
                    $('.errorMessage').text('');
                }  
            }else{
                $('#ownerSendNotificationModal').modal('hide');
                toastr.success(response.message)
            }
        }
    });
});