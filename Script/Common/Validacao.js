function SomenteNumero(e) {
    var tecla = new Number();
    
    if (window.event) {
        tecla = e.keyCode;
    }
    else if (e.which) {
        tecla = e.which;
    }
    else {
        return true;
    }

    if ((tecla > 47 && tecla < 58))
        return true;
    else {
        if (tecla == 8 || tecla == 0)
            return true;
        else
            return false;
    }
};

function ValidarEmail(email){
    if(email == "" || email.indexOf("@") == -1 || email.split('@')[1].indexOf(".") == -1){
        return false
    }

    return true;
};