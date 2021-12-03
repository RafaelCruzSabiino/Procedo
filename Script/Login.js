$("#CadastrarUser").on("click", function(){
    $("#Login").fadeOut();
    $("#Cadastro").fadeIn();

    if($("#Estado").val() == null){
        GetEstados();
    }
});

$("#LoginUser").on("click", function(){
    $("#Login").fadeIn();
    $("#Cadastro").fadeOut();
});