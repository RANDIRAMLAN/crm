$(document).ready(function () {
    show_data_complaint();
    // show data
    function show_data_complaint() {
        let search = $('#search_data_complaint').val();
        $.ajax({
            type: 'post',
            url: '/Complaint/show_data_complaint',
            data: {search: search},
            dataType: 'json',
            success: function (data) {
                let html = '';
                let i;
                let no = 1;
                for (i = 0; i < data.length; i++) {
                html += '<tr>' +
                '<td width="10px" class="text-center">' + no++ + '</td>' +
                '<td>' + data[i].company + '</td>' +
                '<td>' + data[i].complaint + '</td>' +
                '<td>' + data[i].to_do + '</td>' +
                '<td width="10px">' + data[i].status + '</td>' +
                '<td width="10px" class="text-center">' +
                '<a href="/Complaint/edit_data_complaint/'+data[i].id+'" class="btn btn-info btn-sm">Edit</i></a>' +
                '</td>' +
                '<td width="10px" class="text-center">' +
                '<a href="javascript:void(0);" class="btn btn-info btn-sm edit_screen_complaint" data-id="'+data[i].id+'">Complaint</i></a>' +
                '</td>' +
                '<td width="10px" class="text-center">' +
                '<a href="javascript:void(0);" class="btn btn-info btn-sm edit_screen_fix" data-id="'+data[i].id+'">Fix</i></a>' +
                '</td>' +
                '</tr>';
            } 
            $('#list_complaint').html(html);
        },
        error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
    });
} 
// live search data
$('#search_data_complaint').keyup(function () {
    show_data_complaint();
});
// add data complaint
$('#add_data_complaint').submit('click', function () {
    let company = $('#company').val();
    let phone_number = $('#phone_number').val();
    let email = $('#email').val();
    let complaint = $('#complaint').val();
    let complaint_desc = $('#complaint_desc').val();
    let to_do = $('#to_do').val();
    $.ajax({
        type: 'post',
        url: '/Complaint/save_data_complaint',
        data: {
            company: company,
            phone_number: phone_number,
            email: email,
            complaint: complaint,
            complaint_desc: complaint_desc,
            to_do: to_do,
        },
        dataType: 'json',
        success: function (response) {
            if(response.error){
                if(response.error.company){
                    $('#company').addClass('is-invalid');
                    $('.error_company').html(response.error.company);
                }else{
                    $('#company').removeClass('is-invalid');
                    $('#company').addClass('is-valid');
                    $('.error_company').html("");
                }
                if(response.error.phone_number){
                    $('#phone_number').addClass('is-invalid');
                    $('.error_phone_number').html(response.error.phone_number);
                }else{
                    $('#phone_number').removeClass('is-invalid');
                    $('#phone_number').addClass('is-valid');
                    $('.error_phone_number').html("");
                }
                if(response.error.email){
                    $('#email').addClass('is-invalid');
                    $('.error_email').html(response.error.email);
                }else{
                    $('#email').removeClass('is-invalid');
                    $('#email').addClass('is-valid');
                    $('.error_email').html("");
                }
                if(response.error.complaint){
                    $('#complaint').addClass('is-invalid');
                    $('#error_complaint').html(response.error.complaint);
                }else{
                    $('#complaint').removeClass('is-invalid');
                    $('#complaint').addClass('is-valid');
                    $('.error_complaint').html("");
                }
                if(response.error.complaint_desc){
                    $('#complaint_desc').addClass('is-invalid');
                    $('.error_complaint_desc').html(response.error.complaint_desc);
                }else{
                    $('#complaint_desc').removeClass('is-invalid');
                    $('#complaint_desc').addClass('is-valid');
                    $('.error_complaint_desc').html("");
                }
                if(response.error.to_do){
                    $('#to_do').addClass('is-invalid');
                    $('.error_to_do').html(response.error.to_do);
                }else{
                    $('#to_do').removeClass('is-invalid');
                    $('#to_do').addClass('is-valid');
                    $('.error.to_do').html("");
                }
                if(response.error.screen_complaint){
                    $('#screen_complaint').addClass('is-invalid');
                    $('.error_screen_complaint').html(response.error.screen_complaint);
                }else{
                    $('#screen_complaint').removeClass('is-invalid');
                    $('#screen_complaint').addClass('is-valid');
                    $('.error_screen_complaint').html("");
                }
            }else{
                    $('#information_complaint').modal('show');
                    $('#msg_complaint').html(response.msg);
                    setTimeout(() => {
                        $('#information_complaint').modal('hide');
                        location.href = '/Menu/list_complaint';
                    }, 1500);
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
    });
    return false;
});
// edit screen complaint
$('#data_complaint').on('click', '.edit_screen_complaint', function () {
    $('#editScreenComplaint').modal('show');
    $('#id').val($(this).data('id'));
});
$('.btn_screen_complaint').click(function (e) {
let form = $('#edit_screen_complaint')[0];
let data = new FormData(form);
$.ajax({
    type: 'post',
    url: '/Complaint/screen_complaint',
    data: data,
    enctype: 'multipart/form-data',
    processData: false,
    contentType: false,
    cache: false,
    dataType: 'json',
    success: function (response) {
        if(response.error){
            if(response.error.screen_complaint){
                $('#screen_complaint').addClass('is-invalid')
                $('.error_screen_complaint').html(response.error.screen_complaint);
            }else{
                $('#screen_complaint').removeClass('is-invalid')
                $('.error_screen_complaint').html("");
            }
        }else{
            $('#editScreenComplaint').modal('hide');
            $('#information_screen_complaint').modal('show');
            $('#msg_screen_complaint').html(response.msg);
            setTimeout(() => {
                $('#information_screen_complaint').modal('hide');
                location.href = '/Menu/list_complaint';
            }, 1500)
        }
    },
    error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
    });
    return false;
    });
});