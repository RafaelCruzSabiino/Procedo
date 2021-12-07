$(document).ready(function(){
    GetEstados();
});

$("#CadastrarUsuario").on("click", function(){
    if(ValidarUsuario()){
        $.ajax({
                url: "https://api.hunter.io/v2/email-verifier?email=" + Usuario.Email + "&api_key=838f1852ed755b445253132ca98aaeb81fff1c6f",                
                type: 'GET',
                success:function(info){
                if(info != null && info.data.webmail){
                    CadastrarUsuario();
                }else{
                    $("#labelErrorResponse").html("E-mail Inválido!");
                    $("#ErrorResponseCadastro").fadeIn();
                }
            }
        });  
    }else{
        $("#labelErrorResponse").html(Usuario.MensagemError);
        $("#ErrorResponseCadastro").fadeIn();
    }
});

function CadastrarUsuario(){
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
};


