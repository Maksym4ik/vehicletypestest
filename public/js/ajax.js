$( document ).ready(function() {
    //ajax for update vehicle type
    $(".update-btn").on('click',function (event) {
        event.preventDefault();
        $.ajax({
            url: vehicleTypeUrl+'/'+$('#id').val(),
            type: 'PUT',
            data: {
                'userId': $('#userId').val(),
                'name': $('#name').val(),
                'id': $('#id').val(),
                'token' : token
            },
            success: function(result) {
                console.log(result.code);
                if(result.code == 409) {
                    $('.name-error-str').text(result.message);
                    $('#name').addClass('is-invalid');
                }
                if(result.code == 201) {
                    $('#name').removeClass('is-invalid');
                    $('.name-error-str').text('');
                    window.location.replace(vehicleTypeUrl+'/list');
                }
            }
        });
    });
    //ajax for create vehicle type
    $(".create-btn").on('click',function (event) {
        event.preventDefault();
        $.ajax({
            url: vehicleTypeUrl,
            type: 'POST',
            data: {
                'userId': $('#userId').val(),
                'name': $('#name').val(),
                'token' : token
            },
            success: function(result) {
                console.log(result.code);
                if(result.code == 409) {
                    $('.name-error').text(result.message);
                    $('#name').addClass('is-invalid');
                }
                if(result.code == 201) {
                    $('#name').removeClass('is-invalid');
                    window.location.replace(vehicleTypeUrl+'/list');
                }
            }
        });
    });

    //ajax for delete vehicle type record
    $(".delete-row-btn").on('click',function (event) {
        event.preventDefault();
        if(confirm("DELETE vehicle type - "+$(this).data('id')))
        $.ajax({
            url: vehicleTypeUrl+'/'+$(this).data('id'),
            type: 'DELETE',
            data:{
                'token' : token
            },
            success: function(result) {
                location.reload();
            }
        });
    });
});