$(document).on('change', '.company',function() {
    var sd=$( ".company option:selected" ).text();

    $.ajaxSetup({cache: false });
    $.pjax({
        Type : "POST",
        url : "index.php",
        container: '#second_form_pjax',
        data : {name : sd}
    });

    $.pjax.reload('#second_form_pjax', {timeout:false});
});

