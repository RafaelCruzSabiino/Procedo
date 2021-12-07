<?php
    include 'Header.php';
?>

<div class="container">
    <h1 class="text-center">Clientes</h1>
    <br>
    <div class="row" style="text-align: center;">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <button type="button" class="btn btn-default" onclick="window.location = 'CadastroCliente.php'" style="width: 80%">Cadastrar</button>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table table-hover" id="table-usuario">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Situação</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>    
</div>

<?php
    include 'Footer.php';
?>