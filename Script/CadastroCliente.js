$(document).ready(function(){
    GetEstados();
    GetOrigem();
});

$("#CadastrarCliente").on("click", function(){
    Cliente.Origem = $("#Origem").val() == null ? "" :  $("#Origem").val().join(",");

    if(ValidarCliente()){
        $(this).attr("disabled", "disabled");
        $.ajax({
                url: "https://api.hunter.io/v2/email-verifier?email=" + Cliente.Email + "&api_key=838f1852ed755b445253132ca98aaeb81fff1c6f",                
                type: 'GET',
                success:function(info){
                if(info != null && info.data.webmail){
                    CadastrarCliente();
                }else{
                    $("#labelErrorResponse").html("E-mail Inválido!");
                    $("#ErrorResponse").fadeIn();
                    $(this).removeAttr("disabled");
                }
            }
        });        
    }else{
        $("#labelErrorResponse").html(Cliente.MensagemError);
        $("#ErrorResponse").fadeIn();        
    }
});

function CadastrarCliente(){
    $.post(
        "../Controllers/Base/Gerenciar.php?Controller=ClienteController&Funcao=InserirCliente",{
            Dados : JSON.stringify(Cliente)
        }, function(data){
            debugger;
            Info = JSON.parse(data);
            if(!Info.Erro){
               window.location = 'Cliente.php';
            }
            else{
                $("#labelErrorResponse").html(Info.Mensagem);
                $("#ErrorResponse").fadeIn();
                $("#CadastrarCliente").removeAttr("disabled");
            }
        }
    );
}


