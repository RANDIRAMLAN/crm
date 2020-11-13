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
// data table list user
$('#data_user').DataTable({
        "bPaginate": true,
        "bInfo": true,
        "bFilter": true,
        "bLengthChange": true,
        "pageLength": 1000000000
});
// add user
$('#add_data_user').submit('click', function () {
    let employee_id = $('#employee_id').val();
    let name = $('#name').val();
    let email =$('#email').val();
    let password = $('#password').val();
    let role_id = $('#role_id').val();
    let status = $('#status').val();
    $.ajax({
        type: 'post',
        url: '/User/add_data_user',
        dataType: 'json',
        data: {employee_id: employee_id, name: name, email: email, password: password, role_id: role_id, status:status},
        success: function (response) {
            if(response.error){
                if(response.error.employee_id){
                    $('#employee_id').addClass('is-invalid');
                    $('.error_employee_id').html(response.error.employee_id);
                }else{
                    $('#employee_id').removeClass('is-invalid');
                    $('#employee_id').addClass('is-valid');
                    $('.error_employee_id').html("");
                }
                if(response.error.name){
                    $('#name').addClass('is-invalid');
                    $('.error_name').html(response.error.name);
                }else{
                    $('#name').removeClass('is-invalid');
                    $('#name').addClass('is-valid');
                    $('.error_name').html("");
                }
                if(response.error.email){
                    $('#email').addClass('is-invalid');
                    $('.error_email').html(response.error.email);
                }else{
                    $('#email').removeClass('is-invalid');
                    $('#email').addClass('is-valid');
                    $('.error_email').html("");
                }
                if(response.error.password){
                    $('#password').addClass('is-invalid');
                    $('.error_password').html(response.error.password);
                }else{
                    $('#password').removeClass('is-invalid');
                    $('#password').addClass('is-valid');
                    $('.error_password').html("");
                }
                if(response.error.role_id){
                    $('#role_id').addClass('is-invalid');
                    $('.error_role_id').html(response.error.role_id);
                }else{
                    $('#role_id').removeClass('is-invalid');
                    $('#role_id').addClass('is-valid');
                    $('.error_role_id').html("");
                }
                if(response.error.status){
                    $('#status').addClass('is-invalid');
                    $('.error_status').html(response.error.status);
                }else{
                    $('#status').removeClass('is-invalid');
                    $('#status').addClass('is-valid');
                    $('.error_status').html("");
                }
            }else{
            $('#addData').modal('hide');
            $('#information').modal('show');
            $('#msg').html(response.msg);
            setTimeout(() => {
                $('#information').modal('hide');
                location.href = '/Menu/list_user';
            }, 1500);
            }
        },
        error: function (xhr, ajaxOptions, thrownError) { 
                alert(xhr.responseText);
            }
    });
    return false;
    });
    // edit user
    $('.edit_data_user').on('click', function () {
        $('#editData').modal('show');
        $('.edit_email').val($(this).data('email'));
    });
    $('#edit_data_user').submit('click', function () {
        let email = $('.edit_email').val();
        let password = $('.edit_password').val();
        let role_id = $('.edit_role_id').val();
        let status = $('.edit_status').val();
        $.ajax({
            type: 'post',
            url: '/User/edit_data_user',
            data: {email: email, password: password, role_id: role_id, status: status},
            dataType: 'json',
            success: function name(response) {
                if(response.error){
                    if(response.error.password){
                        $('.edit_password').addClass('is-invalid');
                        $('.error_edit_password').html(response.error.password);
                    }else{
                        $('edit_password').removeClass('is-invalid');
                        $('.edit_password').addClass('is-valid');
                        $('.error_edit_password').html("");
                    }
                    if(response.error.role_id){
                        $('.edit_role_id').addClass('is-invalid');
                        $('.error_edit_role_id').html(response.error.role_id)
                    }else{
                        $('.edit_role_id').removeClass('is-invalid');
                        $('.edit_role_id').addClass('is-valid');
                        $('error_edit_role_id').html("");
                    }
                    if(response.error.status){
                        $('.edit_status').addClass('is-invalid');
                        $('.error_edit_status').html(response.error.status);
                    }else{
                        $('.edit_status').removeClass('is-invalid');
                        $('.edit_status').addClass('is-valid')
                        $('.error_edit_status').html("");
                    }
                }else{
                $('#editData').modal('hide');
                $('#information').modal('show');
                $('#msg').html(response.msg);
                setTimeout(() => {
                $('#information').modal('hide');
                location.href = '/Menu/list_user';
            }, 1500);
                }
            }, 
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.responseText);
            }
        })
    return false;
    });
});