
//create offer
$("#createYear").click(function (e) {
    e.preventDefault();
    var name = $("#name").val();
    var car_type_id = $("#car_type_id :selected").val();
    $.ajax({
        type:'POST',
        url: '/admin/years/store',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            name : name,
            car_type_id : car_type_id,
        },
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.nameError').text(response.errors.name);
                }else{
                    $('.nameError').text('');
                }               
            }else{
                $('#createYearModal').modal('hide');
                $("#allYear").append('' +
                    '<tr class="Year-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.value +'</td>\n' +
                        '<td>'+ response.data.car_type_name +'</td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +                        
                            '<button class="btn btn-warning" data-toggle="modal" id="editYear" data-target="#editYearModal" data-id="'+ response.data.id +'" data-name="'+ response.data.value +'" data-car_type_id="'+ response.data.car_type_id +'" title="Edit"><i class="fas fa-edit"></i></button>\n' +
                            '<button class="btn btn-danger" data-toggle="modal" id="deleteYear" data-target="#deleteYearModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#name").val('');
                toastr.success('Car Year Created.')
            }
        }
    });
});


//open edit Year modal
$(document).on('click', '#editYear', function () {
    $('#editYearModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_name').val($(this).data('name'));
    $('#edit_car_type_id').val($(this).data('car_type_id'));
 });

// update Year
$("#updateYear").click(function (e) {
    e.preventDefault();
    var id      = $("#edit_id").val();
    var name    = $("#edit_name").val();
    var car_type_id    = $("#edit_car_type_id").val();
    $.ajax({
        type:'POST',
        url: '/admin/years/update',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id    : id,
            name  : name,
            car_type_id  : car_type_id,
        },
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.nameError').text(response.errors.name);
                }else{
                    $('.nameError').text('');
                }  
            }else{
                $('#editYearModal').modal('hide');
                $("tr.Year-"+ response.data.id).replaceWith('' +
                    '<tr class="Year-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.value +'</td>\n' +
                        '<td>'+ response.data.car_type_name +'</td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +
                            '<button class="btn btn-warning" data-toggle="modal" id="editYear" data-target="#editYearModal" data-id="'+ response.data.id +'" data-name="'+ response.data.value +'" data-car_type_id="'+ response.data.car_type_id +'" title="Edit"><i class="fas fa-edit"></i></button>\n' +
                            '<button class="btn btn-danger" data-toggle="modal" id="deleteYear" data-target="#deleteYearModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Year Updated.')
            }
        }
    });
});

//open delete Year modal
$(document).on('click', '#deleteYear', function () {
    $('#deleteYearModal').modal('show');
    $('input[name=del_id]').val($(this).data('id'));
 });

//destroy Year
$("#destroyYear").click(function(){
    $.ajax({
        type: 'POST',
        url: '/admin/years/destroy',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('input[name=del_id]').val()
        },
        success: function (data) {
            $('#deleteYearModal').modal('hide');
            $('.Year-' + $('input[name=del_id]').val()).remove();
            toastr.success('Year Deleted')
        }
    });
});