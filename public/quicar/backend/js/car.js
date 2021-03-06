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

//im1 upload
function img1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img1Preview').css('background-image', 'url('+e.target.result +')');
            $('#img1Preview').hide();
            $('#img1Preview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#img1Upload").change(function() {
    img1(this);
});


//img2 upload
function img2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img2Preview').css('background-image', 'url('+e.target.result +')');
            $('#img2Preview').hide();
            $('#img2Preview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#img2Upload").change(function() {
    img2(this);
});

//img3 upload
function img3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img3Preview').css('background-image', 'url('+e.target.result +')');
            $('#img3Preview').hide();
            $('#img3Preview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#img3Upload").change(function() {
    img3(this);
});

//img4 upload
function img4(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img4Preview').css('background-image', 'url('+e.target.result +')');
            $('#img4Preview').hide();
            $('#img4Preview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#img4Upload").change(function() {
    img4(this);
});

//img5 upload
function img5(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img5Preview').css('background-image', 'url('+e.target.result +')');
            $('#img5Preview').hide();
            $('#img5Preview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#img5Upload").change(function() {
    img5(this);
});
