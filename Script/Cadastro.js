$(document).ready(function(){
    GetEstados();
});

function ValidarUsuario(){
    if(Usuario.Nome == ""){
        Usuario.MensagemError = "Por favor Inserir seu Nome";
        return false
    }

    if(!ValidarEmail(Usuario.Email)){ 
        Usuario.MensagemError = "Por favor Informe um E-mail Válido";
        return false;
    }

    if(!ValidarSenha(Usuario.Senha, Usuario.Confirm)){
        Usuario.MensagemError = "Senha está Incorreta!";
        return false;
    }

    if(Usuario.Sexo == ""){
        Usuario.MensagemError = "Por favor Informe seu Sexo!";
        return false;
    }

    if(Usuario.Telefone == ""){
        Usuario.MensagemError = "Por favor Informe seu Telefone!";
        return false;
    }

    if(Usuario.Cidade == ""){
        Usuario.MensagemError = "Escolha a Cidade!";
        return false;
    }

    return true;
};

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


