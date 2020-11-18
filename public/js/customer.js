$(document).ready(function () {
    // data table list customer
    $('#data_customer').DataTable({
        "bPaginate": true,
        "bInfo": true,
        "bFilter": true,
        "bLengthChange": true,
        "pageLength": 1000000000
    });
    // add data customer
    $('#add_data_customer').submit('click', function () {
        let company = $('#company').val();
        let owner = $('#owner').val();
        let phone_number = $('#phone_number').val();
        let email = $('#email').val();
        let address = $('#address').val();
        let country = $('#country').val();
        let province = $('#province').val();
        let city = $('#city').val();
        let district = $('#district').val();
        let sub_district = $('#sub_district').val();
        let postal_code = $('#postal_code').val();
        $.ajax({
            type: 'post',
            url: '/Customer/add_data_customer',
            data: {
                company: company, 
                owner: owner, 
                phone_number: phone_number,
                email: email,
                address: address,
                country: country,
                province: province,
                city: city,
                district: district,
                sub_district: sub_district,
                postal_code: postal_code
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
                    if(response.error.owner){
                        $('#owner').addClass('is-invalid');
                        $('.error_owner').html(response.error.owner);
                    }else{
                        $('#owner').removeClass('is-invalid');
                        $('#owner').addClass('is-valid');
                        $('.error_owner').html("");
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
                    if(response.error.address){
                        $('#address').addClass('is-invalid');
                        $('.error_address').html(response.error.address);
                    }else{
                        $('#address').removeClass('is-invalid');
                        $('#address').addClass('is-valid');
                        $('.error_address').html("");
                    }
                    if(response.error.country){
                        $('#country').addClass('is-invalid');
                        $('.error_country').html(response.error.country);
                    }else{
                        $('#country').removeClass('is-invalid');
                        $('#country').addClass('is-valid');
                        $('.error_country').html("");
                    }
                    if(response.error.province){
                        $('#province').addClass('is-invalid');
                        $('.error_province').html(response.error.province);
                    }else{
                        $('#province').removeClass('is-invalid');
                        $('#province').addClass('is-valid');
                        $('.error_province').html("");
                    }
                    if(response.error.city){
                        $('#city').addClass('is-invalid');
                        $('.error_city').html(response.error.city);
                    }else{
                        $('#city').removeClass('is-invalid');
                        $('#city').addClass('is-valid');
                        $('.error_city').html("");
                    }
                    if(response.error.district){
                        $('#district').addClass('is-invalid');
                        $('.error_district').html(response.error.district);
                    }else{
                        $('#district').removeClass('is-invalid');
                        $('#district').addClass('is-valid');
                        $('.error_district').html("");
                    }
                    if(response.error.sub_district){
                        $('#sub_district').addClass('is-invalid');
                        $('.error_sub_district').html(response.error.sub_district);
                    }else{
                        $('#sub_district').removeClass('is-invalid');
                        $('#sub_district').addClass('is-valid');
                        $('.error_sub_district').html("");
                    }
                    if(response.error.postal_code){
                        $('#postal_code').addClass('is-invalid');
                        $('.error_postal_code').html(response.error.postal_code);
                    }else{
                        $('#postal_code').removeClass('is-invalid');
                        $('#postal_code').addClass('is-valid');
                        $('.error_postal_code').html("");
                    }
                }else{
                    $('#addDataCustomer').modal('hide');
                    $('#information_customer').modal('show');
                    $('#msg_customer').html(response.msg);
                    setTimeout(() => {
                        $('#information_customer').modal('hide');
                        location.href = '/Menu/list_customer';
                    }, 1500);
                }       
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
    // edit data customer
    $('.edit_data_customer').on('click', function () {
        $('#edit_id').val($(this).data('id'));
        $('#editDataCustomer').modal('show');
        $('#edit_company').val($(this).data('company'));
        $('#edit_owner').val($(this).data('owner'));
        $('#edit_phone_number').val($(this).data('phone_number'));
        $('#edit_email').val($(this).data('email'));
        $('#edit_address').val($(this).data('address'))
        $('#old_country').val($(this).data('country'));
        $('#old_province').val($(this).data('province'));
        $('#old_city').val($(this).data('city'));
        $('#old_district').val($(this).data('district'));
        $('#old_sub_district').val($(this).data('sub_district'));
        $('#old_postal_code').val($(this).data('postal_code')); 
    });
    $('#edit_data_customer').submit('click', function () {
        let id = $('#edit_id').val();
        let company = $('#edit_company').val();
        let owner = $('#edit_owner').val();
        let phone_number = $('#edit_phone_number').val();
        let email = $('#edit_email').val();
        let address = $('#edit_address').val();
        let country = $('#edit_country').val();
        let old_country = $('#old_country').val();
        let province = $('#edit_province').val();
        let old_province = $('#old_province').val();
        let city = $('#edit_city').val();
        let old_city = $('#old_city').val();
        let district = $('#edit_district').val();
        let old_district = $('#old_district').val();
        let sub_district = $('#edit_sub_district').val();
        let old_sub_district = $('#old_sub_district').val();
        let postal_code = $('#edit_postal_code').val();
        let old_postal_code = $('#old_postal_code').val();
        $.ajax({
            type: 'post',
            url: '/Customer/edit_data_customer',
            data: {
                id: id,
                company: company, 
                owner: owner, 
                phone_number: phone_number,
                email: email,
                address: address,
                country: country,
                old_country: old_country,
                province: province,
                old_province: old_province,
                city: city,
                old_city: old_city,
                district: district,
                old_district: old_district,
                sub_district: sub_district,
                old_sub_district: old_sub_district,
                postal_code: postal_code,
                old_postal_code: old_postal_code
            },
            dataType: 'json',
            success: function (response) {        
                if(response.error){
                    if(response.error.company){
                        $('#edit_company').addClass('is-invalid');
                        $('.error_edit_company').html(response.error.company);
                    }else{
                        $('#edit_company').removeClass('is-invalid');
                        $('#edit_company').addClass('is-valid');
                        $('.error_edit_company').html("");
                    }
                    if(response.error.owner){
                        $('#edit_owner').addClass('is-invalid');
                        $('.error_edit_owner').html(response.error.owner);
                    }else{
                        $('#edit_owner').removeClass('is-invalid');
                        $('#edit_owner').addClass('is-valid');
                        $('.error_edit_owner').html("");
                    }
                    if(response.error.phone_number){
                        $('#edit_phone_number').addClass('is-invalid');
                        $('.error_edit_phone_number').html(response.error.phone_number);
                    }else{
                        $('#edit_phone_number').removeClass('is-invalid');
                        $('#edit_phone_number').addClass('is-valid');
                        $('.error_edit_phone_number').html("");
                    }
                    if(response.error.email){
                        $('#edit_email').addClass('is-invalid');
                        $('.error_edit_email').html(response.error.email);
                    }else{
                        $('#edit_email').removeClass('is-invalid');
                        $('#edit_email').addClass('is-valid');
                        $('.error_edit_email').html("");
                    }
                    if(response.error.address){
                        $('#edit_address').addClass('is-invalid');
                        $('.error_edit_address').html(response.error.address);
                    }else{
                        $('#edit_address').removeClass('is-invalid');
                        $('#edit_address').addClass('is-valid');
                        $('.error_edit_address').html("");
                    }
                    if(response.error.country){
                        $('#edit_country').addClass('is-invalid');
                        $('.error_edit_country').html(response.error.country);
                    }else{
                        $('#edit_country').removeClass('is-invalid');
                        $('#edit_country').addClass('is-valid');
                        $('.error_edit_country').html("");
                    }
                    if(response.error.province){
                        $('#edit_province').addClass('is-invalid');
                        $('.error_edit_province').html(response.error.province);
                    }else{
                        $('#edit_province').removeClass('is-invalid');
                        $('#edit_province').addClass('is-valid');
                        $('.error_edit_province').html("");
                    }
                    if(response.error.city){
                        $('#edit_city').addClass('is-invalid');
                        $('.error_edit_city').html(response.error.city);
                    }else{
                        $('#edit_city').removeClass('is-invalid');
                        $('#edit_city').addClass('is-valid');
                        $('.error_edit_city').html("");
                    }
                    if(response.error.district){
                        $('#edit_district').addClass('is-invalid');
                        $('.error_edit_district').html(response.error.district);
                    }else{
                        $('#edit_district').removeClass('is-invalid');
                        $('#edit_district').addClass('is-valid');
                        $('.error_edit_district').html("");
                    }
                    if(response.error.sub_district){
                        $('#edit_sub_district').addClass('is-invalid');
                        $('.error_edit_sub_district').html(response.error.sub_district);
                    }else{
                        $('#edit_sub_district').removeClass('is-invalid');
                        $('#edit_sub_district').addClass('is-valid');
                        $('.error_edit_sub_district').html("");
                    }
                    if(response.error.postal_code){
                        $('#edit_postal_code').addClass('is-invalid');
                        $('.error_edit_postal_code').html(response.error.postal_code);
                    }else{
                        $('#edit_postal_code').removeClass('is-invalid');
                        $('#edit_postal_code').addClass('is-valid');
                        $('.error_edit_postal_code').html("");
                    }
                }else{
                    $('#editDataCustomer').modal('hide');
                    $('#information_customer').modal('show');
                    $('#msg_customer').html(response.msg);
                    setTimeout(() => {
                        $('#information_customer').modal('hide');
                        location.href = '/Menu/list_customer';
                    }, 1500);
                }       
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
});