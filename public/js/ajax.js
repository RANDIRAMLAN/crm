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
    // show data user using ajax
    show_data();
    function show_data() {
        let search = $('#search').val();
    $.ajax({
        type: 'post',
        url: '/User/show_data',
        data: {search: search},
        dataType: 'json',
        success: function (data) {
        let html = '';
        let i;
        let no = 1;
        for (i = 0; i < data.length; i++) {
        html += '<tr id="' + data[i].id + '">' +
                '<td>' + no++ + '</td>' +
                '<td>' + data[i].employee_id + '</td>' +
                '<td>' + data[i].name + '</td>' +
                '<td>' + data[i].email + '</td>' +
                '<td>' + data[i].role_id + '</td>' +
                '<td>' + data[i].status + '</td>' +
                '<td style="text-align:center;">' +
                '<a href="javascript:void(0);" class="btn btn-info btn-sm edit_data_user" data-id="' + data[i].id + '" data-role_id="' + data[i].role_id + '"data-status="' + data[i].status + '">Edit</a>' +
                '</td>' +
                '</tr>';
            }
            $('#list_user').html(html);
        },
        error: function (xhr, ajaxOptions, thrownError) { 
        alert(xhr.responseText);
        }
    });
    }

    $('#search').keyup(function () {
        show_data();
    })

});