$(document).ready(function(){
    GetEstados();
});

$("#CadastrarUsuario").on("click", function(){
    if(ValidarUsuario()){
        $.post(
            "../Controllers/Base/Gerenciar.php?Controller=UsuarioController&Funcao=InserirUsuario",{
                Dados : JSON.stringify(Usuario)
            }, function(data){
                Info = JSON.parse(data);
                if(!Info.Erro){
                   window.location = 'Login.php';
                }
                else{
                    $("#labelErrorResponse").html(Info.Mensagem);
                    $("#ErrorResponseCadastro").fadeIn();
                }
            }
        );
    }else{
        $("#labelErrorResponse").html(Usuario.MensagemError);
        $("#ErrorResponseCadastro").fadeIn();
    }
});


