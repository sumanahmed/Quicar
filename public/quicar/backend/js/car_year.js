$('#carYearTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
    }
});

//create offer
$("#createCarYear").click(function (e) {
    e.preventDefault();
    var name        = $("#name").val();
    var car_type_id = $("#car_type_id :selected").val();
    var car_model_id= $("#car_model_id :selected").val();
    $.ajax({
        type:'POST',
        url: '/admin/car/years/store',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            name        : name,
            car_type_id : car_type_id,
            car_model_id: car_model_id,
        },
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.nameError').text(response.errors.name);
                }              
                if(response.errors.car_type_id){
                    $('.carTypeError').text(response.errors.car_type_id);
                }              
                if(response.errors.car_model_id){
                    $('.carModelError').text(response.errors.car_model_id);
                }              
            }else{
                $('#createCarYearModal').modal('hide');
                $("#allYear").append('' +
                    '<tr class="car_year'+ response.data.id +'">\n' +
                        '<td>'+ response.data.value +'</td>\n' +
                        '<td>'+ response.data.car_type_name +'</td>\n' +
                        '<td>'+ response.data.car_model_name +'</td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +                        
                            '<button class="btn btn-warning" data-toggle="modal" id="editCarYear" data-target="#editCarYearModal" data-id="'+ response.data.id +'" data-name="'+ response.data.value +'" data-car_type_id="'+ response.data.car_type_id +'" data-car_model_id="'+ response.data.car_model_id +'" title="Edit"><i class="fas fa-edit"></i></button>\n' +
                            '<button class="btn btn-danger" data-toggle="modal" id="deleteCarYear" data-target="#deleteCarYearModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#name").val('');
                $("#car_type_id").val('');
                $("#car_model_id").val('');
                toastr.success('Car Year Created.')
            }
        }
    });
});


//open edit Year modal
$(document).on('click', '#editCarYear', function () {
    $('#editCarYearModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_name').val($(this).data('name'));
    $('#edit_car_type_id').val($(this).data('car_type_id'));
    $('#edit_car_type_id').val($(this).data('car_type_id'));
 });

// update Year
$("#updateCarYear").click(function (e) {
    e.preventDefault();
    var id          = $("#edit_id").val();
    var name        = $("#edit_name").val();
    var car_type_id = $("#edit_car_type_id").val();
    var car_model_id= $("#edit_car_model_id").val();
    $.ajax({
        type:'POST',
        url: '/admin/car/years/update',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id          : id,
            name        : name,
            car_type_id : car_type_id,
            car_model_id: car_model_id,
        },
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.nameError').text(response.errors.name);
                } 
                if(response.errors.car_type_id){
                    $('.carTypeError').text(response.errors.car_type_id);
                }              
                if(response.errors.car_model_id){
                    $('.carModelError').text(response.errors.car_model_id);
                }    
            }else{
                $('#editCarYearModal').modal('hide');
                $("tr.car_year"+ response.data.id).replaceWith('' +
                    '<tr class="car_year'+ response.data.id +'">\n' +
                        '<td>'+ response.data.value +'</td>\n' +
                        '<td>'+ response.data.car_type_name +'</td>\n' +
                        '<td>'+ response.data.car_model_name +'</td>\n' +
                        '<td style="vertical-align: middle;text-align: center;">\n' +
                            '<button class="btn btn-warning" data-toggle="modal" id="editCarYear" data-target="#editCarYearModal" data-id="'+ response.data.id +'" data-name="'+ response.data.value +'" data-car_type_id="'+ response.data.car_type_id +'" data-car_model_id="'+ response.data.car_model_id +'" title="Edit"><i class="fas fa-edit"></i></button>\n' +
                            '<button class="btn btn-danger" data-toggle="modal" id="deleteCarYear" data-target="#deleteCarYearModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
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
$("#destroyCarYear").click(function(){
    $.ajax({
        type: 'POST',
        url: '/admin/car/years/destroy',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('input[name=del_id]').val()
        },
        success: function (data) {
            $('#deleteYearModal').modal('hide');
            $('.car_year' + $('input[name=del_id]').val()).remove();
            toastr.success('Year Deleted')
        }
    });
});