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
                html += '<tr class="' + data[i].status + '">' +
                '<td class="text-center">' + no++ + '</td>' +
                '<td>' + data[i].complaint + '</td>' +
                '<td>' + data[i].complaint_desc + '</td>' +
                '<td>' + data[i].to_do + '</td>' +
                '<td>' + data[i].status + '</td>' +
                '<td class="text-center">' +
                '<a href="/Complaint/edit_data_complaint/'+data[i].id+'" class="btn btn-info btn-sm">Edit</i></a>' +
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
$('#search_data_complaint').keyup(function () {
    show_data_complaint();
});
});