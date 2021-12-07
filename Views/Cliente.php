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
    <br>
    <div class="table-responsive">
        <table class="table table-hover" id="table-cliente">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                    <th>Situação</th>
                    <th>Opção</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>  
</div>

<div class="modal fade" id="modal-excluir-cliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Excluir Cliente</h4>
            </div>
            <div class="modal-body">
                <h4>Deseja Realmente Excluir o Cliente: </h4><p id="returnExcluir"></p>
                <br>
                <div class="row" style="display: none;" id="ErrorResponseExcluir">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <label style="color: red;" id="labelErrorResponseExcluir"></label>                                         
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="ExcluirCliente()">Excluir</button>
            </div>
        </div>
    </div>
</div>

<?php
    include 'Footer.php';
?>

<script src="../Script/Cliente.js"></script>
<script src="../Script/Modelos/Cliente.js"></script>