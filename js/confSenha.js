$(document).ready(function(){
    // Impede do usuário inserir apenas um valor na senha e dar submit
	$("#formCad").submit(function(e) {
		if($('#inputSenha').val() != $('#inputConfSenha').val()) {
			e.preventDefault();
			$("#inputConfSenha").css("border", "1px solid red");
            $('[data-toggle="popover"]').popover();
        }
    });

	$("#formSen").submit(function(e) {
		if($('#inputSenha').val() != $('#inputConfSenha').val()) {
			e.preventDefault();
			$("#inputConfSenha").css("border", "1px solid red");
            $('[data-toggle="popover"]').popover();
        }
    });    

    // Verifica o campo confirmar senha com senha para mostrar para o usuário que está diferente de senha
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
})
