// region "Usuarios"

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

// endregion