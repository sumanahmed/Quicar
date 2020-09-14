
//create offer
$("#createModel").click(function (e) {
    e.preventDefault();
    var name = $("#name").val();
    $.ajax({
        type:'POST',
        url: '/admin/models/store',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            name : name,
        },
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.nameError').text(response.errors.name);
                }else{
                    $('.nameError').text('');
                }               
            }else{
                $('#createModelModal').modal('hide');
                $("#allModel").append('' +
                    '<tr class="Model-'+ response.data.id +'">\n' +
                        '<td>'+ name +'</td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +                        
                            '<button class="btn btn-warning" data-toggle="modal" id="editModel" data-target="#editModelModal" data-id="'+ response.data.id +'" data-name="'+ response.data.value +'" title="Edit"><i class="fas fa-edit"></i></button>\n' +
                            '<button class="btn btn-danger" data-toggle="modal" id="deleteModel" data-target="#deleteModelModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#name").val('');
                toastr.success('Car Model Created.')
            }
        }
    });
});


//open edit Model modal
$(document).on('click', '#editModel', function () {
    $('#editModelModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_name').val($(this).data('name'));
 });

// update Model
$("#updateModel").click(function (e) {
    e.preventDefault();
    var id      = $("#edit_id").val();
    var name    = $("#edit_name").val();
    $.ajax({
        type:'POST',
        url: '/admin/models/update',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id    : id,
            name  : name,
        },
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.nameError').text(response.errors.name);
                }else{
                    $('.nameError').text('');
                }  
            }else{
                $('#editModelModal').modal('hide');
                $("tr.Model-"+ response.data.id).replaceWith('' +
                    '<tr class="Model-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.value +'</td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +
                            '<button class="btn btn-warning" data-toggle="modal" id="editModel" data-target="#editModelModal" data-id="'+ response.data.id +'" data-name="'+ response.data.value +'" title="Edit"><i class="fas fa-edit"></i></button>\n' +
                            '<button class="btn btn-danger" data-toggle="modal" id="deleteModel" data-target="#deleteModelModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Model Updated.')
            }
        }
    });
});

//open delete Model modal
$(document).on('click', '#deleteModel', function () {
    $('#deleteModelModal').modal('show');
    $('input[name=del_id]').val($(this).data('id'));
 });

//destroy Model
$("#destroyModel").click(function(){
    $.ajax({
        type: 'POST',
        url: '/admin/models/destroy',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('input[name=del_id]').val()
        },
        success: function (data) {
            $('#deleteModelModal').modal('hide');
            $('.Model-' + $('input[name=del_id]').val()).remove();
            toastr.success('Model Deleted')
        }
    });
});