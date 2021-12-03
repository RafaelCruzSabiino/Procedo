<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-bt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>XD-Eventos | Login</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container" style="padding-top: 55px;" id="Login">
            <h1 class="text-center">Login</h1>
            <br>
            <form method="POST" action="../Controllers/Base/Gerenciar.php?Controller=AutentificarController&Funcao=ValidarLogin">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <label>E-mail:</label>                        
                        <input type="email" name="Email" id="EmailAutentificacao" class="form-control" required="required" placeholder="xxxx@xxxx.com">                        
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <label>Senha:</label>                        
                        <input type="password" name="Senha" id="SenhaAutentificacao" class="form-control" required="required" placeholder="*********">                        
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <?php if(!empty($_SESSION["ErrorResponse"])) { ?>
                <br>
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <label style="color: red;"><?= $_SESSION["ErrorResponse"] ?></label>                                         
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <?php } $_SESSION["ErrorResponse"] = "" ?>
                <br>
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-2">               
                        <button type="button" class="btn btn-danger" onclick="window.location = 'Cadastro.php'">Cadastrar-se</button>    
                    </div>
                    <div class="col-sm-2" style="text-align: right;">               
                        <button type="submit" class="btn btn-primary">Entrar</button>            
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </form>
        </div>        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>      
    </body>
</html>
