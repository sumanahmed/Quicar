//open edit Color modal
$(document).on('click', '#replyComplain', function () {
    $('#replyComplainModal').modal('show');
    $('#complain_id').val($(this).data('id'));
    $('#complain_message').val($(this).data('message'));
    $('#complain_reply').val('');
 });

// update Color
$("#complainReply").click(function (e) {
    e.preventDefault();
    var id       = $("#complain_id").val();
    var reply    = $("#complain_reply").val();
    $.ajax({
        type:'POST',
        url: '/admin/complain/reply-to-owner',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id    : id,
            reply : reply,
        },
        success:function(response){
            if((response.errors)){
                if(response.errors.reply){
                    $('.complainReplyError').text(response.errors.reply);
                }
            }else{
                $('#replyComplainModal').modal('hide');               
                toastr.success('Complain Replied Successfully.')
                location.reload();
            }
        }
    });
});

//open delete Feedback modal
$(document).on('click', '#deleteFeedback', function () {
    $('#deleteFeedbackModal').modal('show');
    $('input[name=del_id]').val($(this).data('id'));
 });

//destroy Feedback
$("#destroyFeedback").click(function(){
    $.ajax({
        type: 'POST',
        url: '/admin/feedbacks/destroy',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('input[name=del_id]').val()
        },
        success: function (data) {
            $('#deleteFeedbackModal').modal('hide');
            $('.feedback-' + $('input[name=del_id]').val()).remove();
            toastr.success('Feedback Deleted')
        }
    });
});