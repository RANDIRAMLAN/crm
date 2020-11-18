// autocomplate search data company
        $('#company').autocomplete({
        source: '/Menu/company',
        focus: function(event, ui) {
            $('#company').val(ui.item.label);
            return false;
        },
        select: function(event,ui) {
            $('#company').val(ui.item.label);
            $('#phone_number').val(ui.item.phone_number);
            $('#email').val(ui.item.email);  
            return false;
    }
});
    // autocomplate search data user
        $('#to_do').autocomplete({
        source: '/Menu/name',
        focus: function(event, ui) {
            $("#to_do").val(ui.item.employee_id);
            return false;
        },
        select: function(event,ui) {
            $('#to_do').val(ui.item.employee_id);
            return false;
    }
});

