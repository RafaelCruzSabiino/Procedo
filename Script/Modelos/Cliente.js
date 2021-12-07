Cliente = {
    Codigo:     "",
    Nome:       "",
    Email:      "",
    Documento:  "",
    Telefone:   "",
    Estado:     "",
    Cidade:     "",
    Situacao:   "",
    Observacao: "",
    Origem:     ""
};

$("#Nome, #Email, #Documento, #Telefone, #Estado, #Cidade, #Situacao, #Observacao").on("blur", function(dados){
    var campo = dados.target.id;
    var value = dados.target.value;

    switch(campo){
        case "Nome"           : Cliente.Nome       = value; break;
        case "Email"          : Cliente.Email      = value; break;
        case "Documento"      : Cliente.Documento  = value; break;
        case "Telefone"       : Cliente.Telefone   = value; break;
        case "Estado"         : Cliente.Estado     = value; break;
        case "Cidade"         : Cliente.Cidade     = value; break;
        case "Situacao"       : Cliente.Situacao   = value; break;
        case "Observacao"     : Cliente.Observacao = value; break;
    }
});

function ValidarCliente(){
    if(Cliente.Nome == ""){
        Cliente.MensagemError = "Por favor Inserir o Nome do Cliente";
        return false
    }

    if(!ValidarEmailFormato(Cliente.Email)){ 
        Cliente.MensagemError = "Por favor Informe um E-mail Válido";
        return false;
    }

    if(Cliente.Documento == "" || Cliente.Documento.length < 11){
        Cliente.MensagemError = "CPF incorreto!";
        return false;
    }

    if(Cliente.Telefone == ""){
        Cliente.MensagemError = "Por favor Informe seu Telefone!";
        return false;
    }

    if(Cliente.Cidade == ""){
        Cliente.MensagemError = "Escolha a Cidade!";
        return false;
    }

    if(Cliente.Origem == "" || Cliente.Origem.length < 1){
        Cliente.MensagemError = "Escolha pelo menos uma Origem!";
        return false;
    }

    return true;
};