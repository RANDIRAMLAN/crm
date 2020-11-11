$(document).ready(function () {
    // login to app
    $('#login').submit('click', function () {
        let id = $('#id').val();
        let password = $('#password').val();
        $.ajax({
            type: 'post',
            url: '/Login/login_app',
            dataType: 'json',
            data: {id: id, password: password},
            success: function (response) {
                if(response.error){
                    if(response.error.id){
                        $('#id').addClass('is-invalid');
                        $('.error_id').html(response.error.id);
                    }else{
                        $('#id').removeClass('is-invalid');
                        $('.error_id').html("");
                    }
                    if(response.error.password){
                        $('#password').addClass('is-invalid');
                        $('.error_password').html(response.error.password)
                    }else{
                        $('#password').removeClass('is-invalid');
                        $('.error_password').html("");
                    }
                    if(response.error.msg_password){
                        $('.not-found-password').addClass('is-invalid');
                        $('#not-found-password').html(response.error.msg_password)
                    }
                    if(response.error.msg_id){
                        $('.not-found-id').addClass('is-invalid');
                        $('#not-found-id').html(response.error.msg_id);
                    }
                }else{
                    location.href = '/Menu/list_complaint'               
                }
            },
            error: function (xhr, ajaxOptions, thrownError) { 
                alert(xhr.responseText);
            }
        });
        return false;
    });
});

$(document).ready(function () {
    $('#data_user').DataTable();
});