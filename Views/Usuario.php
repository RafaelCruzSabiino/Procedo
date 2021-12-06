<?php
    include 'Header.php';
?>

<div class="container">
    <h1 class="text-center">Usuários</h1>
    <br>    
    <div class="container" id="filtrosUsuario" style="display:none;">
        <div class="row">
            <div class="col-sm-3">
                <label>Nome:</label>                        
                <input type="text" name="NomeFiltro" id="NomeFiltro" class="form-control" placeholder="Informe o Nome">                            
            </div>
            <div class="col-sm-3">
                <label>Estado:</label>                        
                <select name="EstadoFiltro" id="EstadoFiltro" class="form-control" required="required" onchange="FiltrarCidade('EstadoFiltro', 'CidadeFiltro')">
                </select>                          
            </div>
            <div class="col-sm-3">
                <label>Cidade:</label>                       
                <select name="CidadeFiltro" id="CidadeFiltro" class="form-control" required="required">
                </select>                           
            </div>
            <div class="col-sm-3">
                <label>Situação:</label>                       
                <select name="SituacaoFiltro" id="SituacaoFiltro" class="form-control" required="required">
                    <option value="">Selecione</option>
                    <option value="0">Inativo</option>
                    <option value="1">Ativo</option>
                </select>                           
            </div>
        </div>    
        <br>
    </div>
    <div class="row" style="text-align: center;">
        <div class="col-sm-3"></div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-primary" id="filtrarUsuario" onclick="ListarUsuario()" style="width: 80%; display: none;">Filtrar <i class="fa fa-check"></i></button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-default" onclick="window.location = 'Cadastro.php'" style="width: 80%">Cadastrar</button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-primary" onclick="AplicarFiltro('block')" id="btnFiltrar" style="width: 80%">Filtros</button>   
        </div>
        <div class="col-sm-3"></div>
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
<script src="../Script/Usuario.js"></script>
<script src="../Script/Modelos/Usuario.js"></script>
<script src="../Script/Common/EstadoCidade.js"></script>
