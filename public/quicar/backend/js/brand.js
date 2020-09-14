
//create offer
$("#createBrand").click(function (e) {
    e.preventDefault();
    var name = $("#name").val();
    $.ajax({
        type:'POST',
        url: '/admin/brands/store',
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
                $('#createBrandModal').modal('hide');
                $("#allBrand").append('' +
                    '<tr class="brand-'+ response.data.id +'">\n' +
                        '<td>'+ name +'</td>\n' +
                        '<td>\n' +                        
                            '<button class="btn btn-warning" data-toggle="modal" id="editBrand" data-target="#editBrandModal" data-id="'+ response.data.id +'" data-name="'+ response.data.value +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger" data-toggle="modal" id="deleteBrand" data-target="#deleteBrandModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#name").val('');
                toastr.success('Car Brand Created.')
            }
        }
    });
});


//open edit Brand modal
$(document).on('click', '#editBrand', function () {
    $('#editBrandModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_name').val($(this).data('name'));
 });

// update Brand
$("#updateBrand").click(function (e) {
    e.preventDefault();
    var id      = $("#edit_id").val();
    var name    = $("#edit_name").val();
    $.ajax({
        type:'POST',
        url: '/admin/brands/update',
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
                $('#editBrandModal').modal('hide');
                $("tr.brand-"+ response.data.id).replaceWith('' +
                    '<tr class="brand-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.value +'</td>\n' +
                        '<td>\n' +
                            '<button class="btn btn-warning" data-toggle="modal" id="editBrand" data-target="#editBrandModal" data-id="'+ response.data.id +'" data-name="'+ response.data.value +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger" data-toggle="modal" id="deleteBrand" data-target="#deleteBrandModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Brand Updated.')
            }
        }
    });
});

//open delete Brand modal
$(document).on('click', '#deleteBrand', function () {
    $('#deleteBrandModal').modal('show');
    $('input[name=del_id]').val($(this).data('id'));
 });

//destroy Brand
$("#destroyBrand").click(function(){
    $.ajax({
        type: 'POST',
        url: '/admin/brands/destroy',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('input[name=del_id]').val()
        },
        success: function (data) {
            $('#deleteBrandModal').modal('hide');
            $('.brand-' + $('input[name=del_id]').val()).remove();
            toastr.success('Brand Deleted')
        }
    });
});