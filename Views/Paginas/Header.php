<?php
    session_start();

    if(!isset($_SESSION["UserCodigo"]))
    {
      session_reset();
      session_destroy();
      header("Location: ../../Controllers/Base/Gerenciar.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-bt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>XD-EVENTOS</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>        
        <nav class="navbar navbar-default" role="navigation">
            <div class="col-sm-5">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">XD EVENTOS</a>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="Cliente.php">Cliente</a></li>
                        <li><a href="Usuario">Usuario</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-7">
                <h5 style="padding-top: 8px;">Bem Vindo <?= $_SESSION["UserName"] ?></h5>
            </div>
        </nav>


        
    
        
        


