
function fillSelect(url,selector,selector_class,ph){
    $.ajax({
        method: 'POST',
        url: url,
        data : {_token :$('#token').val()},
        dataType: 'JSON',
    }).done(function (x) {

        $(selector).html('<option value="">'+'Seleccione '+ph+'</option>');

        $.each( x, function(i,v){
            var option = '<option value="'+v.id+'">'+v.codigo+' - '+v.descripcion+'</option>';
            $(selector).append(option);

            if (selector_class !== undefined){
                $(selector_class).removeClass("hidden");
            }
        })
        $(selector).selectpicker('refresh');
    }).fail(function () {
        $(selector_class).addClass("hidden");
        $(selector).html('').selectpicker('refresh');
    })
}
