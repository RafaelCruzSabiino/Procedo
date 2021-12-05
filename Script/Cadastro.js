Usuario = {
    Nome:     "",
    Email:    "",
    Senha:    "",
    Confirm:  "",
    Sexo:     "",
    Telefone: "",
    Estado:   "",
    Cidade:   ""
};

$(document).ready(function(){
    GetEstados();
});

$("#Nome, #Email, #Senha, #ConfirmarSenha, #Sexo, #Telefone, #Estado, #Cidade").on("blur", function(dados){
    var campo = dados.target.id;
    var value = dados.target.value;

    switch(campo){
        case "Nome"           : Usuario.Nome     = value; break;
        case "Email"          : Usuario.Email    = value; break;
        case "Senha"          : Usuario.Senha    = value; break;
        case "ConfirmarSenha" : Usuario.Confirm  = value; break;
        case "Sexo"           : Usuario.Sexo     = value; break;
        case "Telefone"       : Usuario.Telefone = value; break;
        case "Estado"         : Usuario.Estado   = value; break;
        case "Cidade"         : Usuario.Cidade   = value; break;
    }
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
        dados = JSON.stringify(Usuario);
        $.post(
            "../Controllers/Base/Gerenciar.php?Controller=UsuarioController&Funcao=InserirUsuario",{
                Dados : dados
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


