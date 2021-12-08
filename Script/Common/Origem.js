function GetOrigem(idOrigem){
    idOrigem = idOrigem == null ? "Origem" : idOrigem;
    $.post(
            "../Controllers/Base/Gerenciar.php?Controller=OrigemController&Funcao=SelecionarOrigem",{
                
            },function(data){
                debugger;
                Info = JSON.parse(data);
                if(!Info.Erro){
                    $("#" + idOrigem).html("");
                    for(var i=0; i<Info.Itens.length; i++){
                        $("#" + idOrigem).append("<option value='" + Info.Itens[i].Codigo + "'>"+ Info.Itens[i].Descricao +"</option>").trigger("change");
                    } 
                    
                    $("#" + idOrigem).select2({multiple: true});

                    if(idOrigem != "Origem"){
                        $("#" + idOrigem).val(null).trigger("change");
                    }
                }else{
                    alert("Error!");
                }
            }
        );            
}
