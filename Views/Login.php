
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
        <div class="container">
            <h1 class="text-center">Login</h1>
            <br>
            <form method="POST" action="../Controllers/Base/Gerenciar.php?Controller=AutentificarController&Funcao=ValidarLogin">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <label>E-mail:</label>                        
                        <input type="email" name="Email" id="Email" class="form-control" required="required">                        
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <label>Senha:</label>                        
                        <input type="password" name="Senha" id="Senha" class="form-control" required="required">                        
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </form>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
