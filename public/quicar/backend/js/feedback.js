$('#feedbackTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
    }
});

//open edit Color modal
$(document).on('click', '#replyFeedback', function () {
    $('#replyFeedbackModal').modal('show');
    $('#feedback_id').val($(this).data('id'));
    $('#feedback_feedback').val($(this).data('feedback'));
    $('#feedback_reply').val('');
 });

// update Color
$("#feedbackReplay").click(function (e) {
    e.preventDefault();
    var id       = $("#feedback_id").val();
    var replay   = $("#feedback_replay").val();
    $.ajax({
        type:'POST',
        url: '/admin/feedbacks/reply',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id    : id,
            replay : replay,
        },
        success:function(response){
            if((response.errors)){
                if(response.errors.reply){
                    $('.replayError').text(response.errors.reply);
                }else{
                    $('.replayError').text('');
                }  
            }else{
                $('#replyFeedbackModal').modal('hide');
                $("tr.feedback-"+ response.data.id).replaceWith('' +
                    '<tr class="feedback-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.review +'</td>\n' +
                        '<td>'+ response.data.replay +'</td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +                            
                            '<a href="#" class="btn btn-raised btn-warning" data-toggle="modal" id="replyFeedback" data-target="#replyFeedbackModal" data-id="'+ response.data.id +'" data-feedback="'+ response.data.review +'" data-reply="'+ response.data.replay +'" title="Reply"><i class="fas fa-reply"></i></a>\n' +
                            '<button href="#" class="btn btn-raised btn-danger" data-toggle="modal" id="deleteFeedback" data-target="#deleteFeedbackModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash-alt"></i></button>\n' +                            
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Feedback Replied Successfully.')
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