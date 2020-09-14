$('#carTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
    }
});

//show driver info in modal
$(document).on('click', '#driverDetail', function () {
    
    var current_status = '';    
    if($(this).data('driver_current_status') == "0"){
        current_status = "Off Ride";
    }{
        current_status = "On Ride";       
    }

    var account_status = ''; 
    if($(this).data('account_status') == "0"){
        account_status = "Off";
    }else{
        account_status = "On";       
    }


    $('#driverDetailModal').modal('show');
    $('#driver_name').html($(this).data('driver_name'));
    $('#driver_phone').html($(this).data('driver_phone'));
    $('#current_status').html(current_status);
    $('#nid').html($(this).data('nid'));
    $('#account_status').html(account_status);
    $("#driver_license").attr("src", image_base_path + $(this).data('license'));
 });

