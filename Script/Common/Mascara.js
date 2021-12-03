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