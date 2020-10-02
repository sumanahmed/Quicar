
//create offer
$("#createCarType").click(function (e) {
    e.preventDefault();
    var name = $("#name").val();
    $.ajax({
        type:'POST',
        url: '/admin/car_type/store',
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
                $('#createCarTypeModal').modal('hide');
                $("#allCarType").append('' +
                    '<tr class="car_type-'+ response.data.id +'">\n' +
                        '<td>'+ name +'</td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +                        
                            '<button class="btn btn-warning" data-toggle="modal" id="editCarType" data-target="#editCarTypeModal" data-id="'+ response.data.id +'" data-name="'+ response.data.name +'" title="Edit"><i class="fas fa-edit"></i></button>\n' +
                            '<button class="btn btn-danger" data-toggle="modal" id="deleteCarType" data-target="#deleteCarTypeModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#name").val('');
                toastr.success('Car Type Created.')
            }
        }
    });
});


//open edit CarType modal
$(document).on('click', '#editCarType', function () {
    $('#editCarTypeModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_name').val($(this).data('name'));
 });

// update CarType
$("#updateCarType").click(function (e) {
    e.preventDefault();
    var id      = $("#edit_id").val();
    var name    = $("#edit_name").val();
    $.ajax({
        type:'POST',
        url: '/admin/car_type/update',
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
                $('#editCarTypeModal').modal('hide');
                $("tr.car_type-"+ response.data.id).replaceWith('' +
                    '<tr class="car_type-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.name +'</td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +
                            '<button class="btn btn-warning" data-toggle="modal" id="editCarType" data-target="#editCarTypeModal" data-id="'+ response.data.id +'" data-name="'+ response.data.name +'" title="Edit"><i class="fas fa-edit"></i></button>\n' +
                            '<button class="btn btn-danger" data-toggle="modal" id="deleteCarType" data-target="#deleteCarTypeModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Car Type Updated.')
            }
        }
    });
});

//open delete CarType modal
$(document).on('click', '#deleteCarType', function () {
    $('#deleteCarTypeModal').modal('show');
    $('input[name=del_id]').val($(this).data('id'));
 });

//destroy CarType
$("#destroyCarType").click(function(){
    $.ajax({
        type: 'POST',
        url: '/admin/car_type/destroy',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('input[name=del_id]').val()
        },
        success: function (data) {
            $('#deleteCarTypeModal').modal('hide');
            $('.car_type-' + $('input[name=del_id]').val()).remove();
            toastr.success('Car Type Deleted')
        }
    });
});