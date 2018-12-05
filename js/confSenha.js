$(document).ready(function(){
    $("#inputConfSenha").on("change paste keyup",  function() {
        if ($("#inputConfSenha").val() !== $("#inputSenha").val())
        {
            $("#inputConfSenha").css("border", "1px solid red");
        }
        else
        {
            $("#inputConfSenha").css("border", "1px solid #ced4da");
        }
    });
})
