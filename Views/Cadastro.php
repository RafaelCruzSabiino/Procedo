<!DOCTYPE html>
<html lang="pt-bt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>XD-Eventos | Cadastro</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container" style="padding-top: 55px;">
            <h1 class="text-center">Cadastro</h1>
            <br>
            <div class="row" style="display: none;" id="ErrorResponseCadastro">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <label style="color: red;" id="labelErrorResponse"></label>                                         
                </div>
                <div class="col-sm-4"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">               
                    <label>Nome:</label>                        
                    <input type="text" name="Nome" id="Nome" class="form-control" placeholder="Informe o Nome">                            
                </div>
                <div class="col-sm-4"></div>
            </div>               
            <br>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">               
                    <label>Email:</label>                        
                    <input type="email" name="Email" id="Email" class="form-control" placeholder="xxxx@xxxx.com">                            
                </div>
                <div class="col-sm-4"></div>
            </div>               
            <br>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">               
                    <label>Senha:</label>                        
                    <input type="password" name="Senha" id="Senha" class="form-control" placeholder="*********">      
                    <span>No Mínimo: 8 Caracteres, 1 Letra Maiúsculas, 1 Letra Minúscula</span>                      
                </div>
                <div class="col-sm-4"></div>
            </div>               
            <br>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">               
                    <label>Confirmar Senha:</label>                        
                    <input type="password" name="ConfirmarSenha" id="ConfirmarSenha" class="form-control" placeholder="*********">                            
                </div>
                <div class="col-sm-4"></div>
            </div>               
            <br>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">               
                    <label>Sexo: </label>
                    <select name="Sexo" id="Sexo" class="form-control" required="required">
                        <option value="#">Selecione</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>                         
                </div>
                <div class="col-sm-4"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">               
                    <label>Tefone:</label>                     
                    <input type="Telefone" name="Telefone" id="Telefone" class="form-control" placeholder="(99) 99999-9999" onkeyup="MascaraTelefone(this, event)" onkeypress="return SomenteNumero(event)" maxlength="15">                    
                </div>
                <div class="col-sm-4"></div>
            </div>              
            <br>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-1">               
                    <label>Estado:</label>                   
                    <select name="Estado" id="Estado" class="form-control" required="required">
                    </select>                                       
                </div>
                <div class="col-sm-3">               
                    <label>Cidade:</label>                   
                    <select name="Cidade" id="Cidade" class="form-control" required="required">
                    </select>                                        
                </div>
                <div class="col-sm-4"></div>
            </div>              
            <br>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-2">               
                    <button type="button" class="btn btn-dafault" id="LoginUser">Voltar Login</button>    
                </div>
                <div class="col-sm-2" style="text-align: right;">               
                    <button type="button" class="btn btn-primary" id="CadastrarUsuario">Cadastrar</button>            
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="http://xregexp.com/v/3.0.0/xregexp-all-min.js"></script>      
        <script src="../Script/Common/EstadoCidade.js"></script>
        <script src="../Script/Common/Mascara.js"></script>
        <script src="../Script/Common/Validacao.js"></script>
        <script src="../Script/Cadastro.js"></script>
        <script src="../Script/Modelos/Usuario.js"></script>
    </body>
</html>