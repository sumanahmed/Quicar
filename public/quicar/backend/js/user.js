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
    $('#n_key').val($(this).data('n_key'));
    $('#phone').val($(this).data('phone'));
 });

//show user info in modal
$(document).on('click', '#userDetail', function () {
    $('#userDetailModal').modal('show');
    $('#user_name').html($(this).data('name'));
    $('#user_phone').html($(this).data('phone'));
    $('#user_dob').html($(this).data('dob'));
    $('#user_nid').html($(this).data('nid'));
    $('#user_address').html($(this).data('address'));
    $('#total_ride').html($(this).data('total_ride'));
    $('#total_cancel').html($(this).data('total_cancel'));
    $('#total_spend').html($(this).data('total_spend'));
 });


 //destroy master category
$("#userNotificationSend").click(function(){
    var n_key       = $('#n_key').val();
    var title       = $('#title').val();
    var message     = $('#message').val();
    var notification= $('input[name=notification]:checked').val();
    var phone       = $('#phone').val();
    $.ajax({
        type: 'POST',
        url: '/admin/users/notification/send',
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
                $('#userSendNotificationModal').modal('hide');
                toastr.success(response.message)
            }
        }
    });
});