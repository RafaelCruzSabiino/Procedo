// region "Usuarios"

Usuario = {
    Codigo:   "",
    Nome:     "",
    Email:    "",
    Senha:    "",
    Confirm:  "",
    Sexo:     "",
    Telefone: "",
    Estado:   "",
    Cidade:   "",
    Situacao: ""
};

$("#Nome, #Email, #Senha, #ConfirmarSenha, #Sexo, #Telefone, #Estado, #Cidade, #Situacao").on("blur", function(dados){
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
        case "Situacao"       : Usuario.Situacao = value; break;
    }
});

function ValidarUsuario(){
    if(Usuario.Nome == ""){
        Usuario.MensagemError = "Por favor Inserir seu Nome";
        return false
    }

    if(!ValidarEmailFormato(Usuario.Email)){ 
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

// endregion