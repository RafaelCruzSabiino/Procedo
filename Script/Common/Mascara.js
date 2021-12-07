function MascaraTelefone(obj, e){
    var result   = "";
    var telefone = $(obj).val();

    if(e.keyCode != 8){
        if(telefone.length == 1){
            result = "(" + telefone;
        }else if(telefone.length == 3){
            result = telefone + ") ";
        }else if(telefone.length == 10){
            result = telefone + "-";
        }else{
            result = telefone;
        }
            
        $(obj).val(result);
    }
}

function MascaraCpf(obj, e){
    var result   = "";
    var cpf = $(obj).val();

    if(e.keyCode != 8){
        if(cpf.length == 3){
            result = cpf + ".";
        }else if(cpf.length == 7){
            result = cpf + ".";
        }else if(cpf.length == 11){
            result = cpf + "-";
        }else{
            result = cpf;
        }

        $(obj).val(result);
    }
}