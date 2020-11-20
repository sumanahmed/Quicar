
$('#modelTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
    }
});

//create offer
$("#createModel").click(function (e) {
    e.preventDefault();
    var name        = $("#name").val();
    var car_type_id = $("#car_type_id :selected").val();
    var car_brand_id= $("#car_brand_id :selected").val();
    $.ajax({
        type:'POST',
        url: '/admin/models/store',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            name        : name,
            car_type_id : car_type_id,
            car_brand_id: car_brand_id,
        },
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.nameError').text(response.errors.name);
                }           
                if(response.errors.car_type_id){
                    $('.carTypeError').text(response.errors.car_type_id);
                }           
                if(response.errors.car_brand_id){
                    $('.carBrandError').text(response.errors.car_brand_id);
                }           
            }else{
                $('#createModelModal').modal('hide');
                $("#allModel").append('' +
                    '<tr class="Model-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.value +'</td>\n' +
                        '<td>'+ response.data.car_type_name +'</td>\n' +
                        '<td>'+ response.data.car_brand_name +'</td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +                        
                            '<button class="btn btn-warning" data-toggle="modal" id="editModel" data-target="#editModelModal" data-id="'+ response.data.id +'" data-name="'+ response.data.value +'" data-car_type_id="'+ response.data.car_type_id +'" data-car_brand_id="'+ response.data.car_brand_id +'" title="Edit"><i class="fas fa-edit"></i></button>\n' +
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
    $('#edit_car_type_id').val($(this).data('car_type_id'));
    $('#edit_car_brand_id').val($(this).data('car_brand_id'));
 });

// update Model
$("#updateModel").click(function (e) {
    e.preventDefault();
    var id          = $("#edit_id").val();
    var name        = $("#edit_name").val();
    var car_type_id = $("#edit_car_type_id :selected").val();
    var car_brand_id= $("#car_brand_id :selected").val();
    $.ajax({
        type:'POST',
        url: '/admin/models/update',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id          : id,
            name        : name,
            car_type_id : car_type_id,
            car_brand_id: car_brand_id,
        },
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.nameError').text(response.errors.name);
                }
                if(response.errors.car_type_id){
                    $('.carTypeError').text(response.errors.car_type_id);
                }           
                if(response.errors.car_brand_id){
                    $('.carBrandError').text(response.errors.car_brand_id);
                }
            }else{
                $('#editModelModal').modal('hide');
                $("tr.Model-"+ response.data.id).replaceWith('' +
                    '<tr class="Model-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.value +'</td>\n' +
                        '<td>'+ response.data.car_type_name +'</td>\n' +
                        '<td>'+ response.data.car_brand_name +'</td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +
                            '<button class="btn btn-warning" data-toggle="modal" id="editModel" data-target="#editModelModal" data-id="'+ response.data.id +'" data-name="'+ response.data.value +'" data-car_type_id="'+ response.data.car_type_id +'" data-car_brand_id="'+ response.data.car_brand_id +'" title="Edit"><i class="fas fa-edit"></i></button>\n' +
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