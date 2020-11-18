$(document).ready(function () {
    // show data province in add customer
    $('#country').change(function () {
        let country = $('#country').val();
        $.ajax({
            type: 'post',
            url: '/Menu/province',
            data: {country: country},
            dataType: 'json',
            success: function (data) {
            let html = '<option value=""> --- Select Province --- </option>';
            let i;
            for (i = 0; i < data.length; i++) {
            html += '<option value="'+data[i].province+'">'+data[i].province+'</option>';
            }
            $('#province').html(html);
            },
            error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
    // show data city in add customer
        $('#province').change(function () {
        let province = $('#province').val();
        $.ajax({
            type: 'post',
            url: '/Menu/city',
            data: {province: province},
            dataType: 'json',
            success: function (data) {
            let html = '<option value=""> --- Select City --- </option>';
            let i;
            for (i = 0; i < data.length; i++) {
            html += '<option value="'+data[i].city+'">'+data[i].city+'</option>';
            }
            $('#city').html(html);
            },
            error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
    // show data district in add customer
        $('#city').change(function () {
        let city = $('#city').val();
        $.ajax({
            type: 'post',
            url: '/Menu/district',
            data: {city: city},
            dataType: 'json',
            success: function (data) {
            let html = '<option value=""> --- Select District --- </option>';
            let i;
            for (i = 0; i < data.length; i++) {
            html += '<option value="'+data[i].district+'">'+data[i].district+'</option>';
            }
            $('#district').html(html);
            },
            error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
    // add data sub district in add customer
        $('#district').change(function () {
        let district = $('#district').val();
        $.ajax({
            type: 'post',
            url: '/Menu/sub_district',
            data: {district: district},
            dataType: 'json',
            success: function (data) {
            let html = '<option value=""> --- Select Sub District --- </option>';
            let i;
            for (i = 0; i < data.length; i++) {
            html += '<option value="'+data[i].sub_district+'">'+data[i].sub_district+'</option>';
            }
            $('#sub_district').html(html);
            },
            error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
    // add data postal code in add customer
        $('#sub_district').change(function () {
        let sub_district = $('#sub_district').val();
        $.ajax({
            type: 'post',
            url: '/Menu/postal_code',
            data: {sub_district: sub_district},
            dataType: 'json',
            success: function (data) {
            let html = '<option value=""> --- Select Postal Code --- </option>';
            let i;
            for (i = 0; i < data.length; i++) {
            html += '<option value="'+data[i].postal_code+'">'+data[i].postal_code+'</option>';
            }
            $('#postal_code').html(html);
            },
            error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
        // show data province in edit customer
    $('#edit_country').change(function () {
        let country = $('#edit_country').val();
        $.ajax({
            type: 'post',
            url: '/Menu/province',
            data: {country: country},
            dataType: 'json',
            success: function (data) {
            let html = '<option value=""> --- Select Province --- </option>';
            let i;
            for (i = 0; i < data.length; i++) {
            html += '<option value="'+data[i].province+'">'+data[i].province+'</option>';
            }
            $('#edit_province').html(html);
            },
            error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
    // show data city in edit customer
        $('#edit_province').change(function () {
        let province = $('#edit_province').val();
        $.ajax({
            type: 'post',
            url: '/Menu/city',
            data: {province: province},
            dataType: 'json',
            success: function (data) {
            let html = '<option value=""> --- Select City --- </option>';
            let i;
            for (i = 0; i < data.length; i++) {
            html += '<option value="'+data[i].city+'">'+data[i].city+'</option>';
            }
            $('#edit_city').html(html);
            },
            error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
    // show data district in edit customer
        $('#edit_city').change(function () {
        let city = $('#edit_city').val();
        $.ajax({
            type: 'post',
            url: '/Menu/district',
            data: {city: city},
            dataType: 'json',
            success: function (data) {
            let html = '<option value=""> --- Select District --- </option>';
            let i;
            for (i = 0; i < data.length; i++) {
            html += '<option value="'+data[i].district+'">'+data[i].district+'</option>';
            }
            $('#edit_district').html(html);
            },
            error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
    // add data sub district in edit customer
        $('#edit_district').change(function () {
        let district = $('#edit_district').val();
        $.ajax({
            type: 'post',
            url: '/Menu/sub_district',
            data: {district: district},
            dataType: 'json',
            success: function (data) {
            let html = '<option value=""> --- Select Sub District --- </option>';
            let i;
            for (i = 0; i < data.length; i++) {
            html += '<option value="'+data[i].sub_district+'">'+data[i].sub_district+'</option>';
            }
            $('#edit_sub_district').html(html);
            },
            error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
    // add data postal code in edit customer
        $('#edit_sub_district').change(function () {
        let sub_district = $('#edit_sub_district').val();
        $.ajax({
            type: 'post',
            url: '/Menu/postal_code',
            data: {sub_district: sub_district},
            dataType: 'json',
            success: function (data) {
            let html = '<option value=""> --- Select Postal Code --- </option>';
            let i;
            for (i = 0; i < data.length; i++) {
            html += '<option value="'+data[i].postal_code+'">'+data[i].postal_code+'</option>';
            }
            $('#edit_postal_code').html(html);
            },
            error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
});