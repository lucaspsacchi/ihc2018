$(document).ready(function(){
    $("#inputConfSenha").on("change paste keyup",  function() {
        if ($("#inputConfSenha").val() !== $("#inputSenha").val())
        {
            $("#inputConfSenha").css("border", "1px solid red");
            $('[data-toggle="popover"]').popover(); 
        }
        else
        {
            $('#inputConfSenha').each(function() {
                $(this).popover('hide');
            });
            $("#inputConfSenha").css("border", "1px solid #ced4da");
        }
    });


    $("#inputSenha").on("change paste keyup",  function() {
        if ($("#inputConfSenha").val() !== $("#inputSenha").val())
        {
            $("#inputConfSenha").css("border", "1px solid red");
            $('[data-toggle="popover"]').popover(); 
        }
        else
        {
            $('#inputConfSenha').each(function() {
                $(this).popover('hide');
            });
            $("#inputConfSenha").css("border", "1px solid #ced4da");
        }
    });
})
