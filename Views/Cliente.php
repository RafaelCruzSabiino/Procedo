<?php
    include 'Header.php';
?>

<div class="container">
    <h1 class="text-center">Clientes</h1>
    <br>
    <div class="container" id="filtrosCliente" style="display:none;">
        <div class="row">
            <div class="col-sm-3">
                <label>Nome:</label>                        
                <input type="text" name="NomeFiltro" id="NomeFiltro" class="form-control" placeholder="Informe o Nome">                            
            </div>
            <div class="col-sm-2">
                <label>Estado:</label>                        
                <select name="EstadoFiltro" id="EstadoFiltro" class="form-control" required="required" onchange="FiltrarCidade('EstadoFiltro', 'CidadeFiltro')">
                </select>                          
            </div>
            <div class="col-sm-3">
                <label>Cidade:</label>                       
                <select name="CidadeFiltro" id="CidadeFiltro" class="form-control" required="required">
                </select>                           
            </div>
            <div class="col-sm-2">
                <label>Situação:</label>                       
                <select name="SituacaoFiltro" id="SituacaoFiltro" class="form-control" required="required">
                    <option value="">Selecione</option>
                    <option value="0">Inativo</option>
                    <option value="1">Ativo</option>
                </select>                           
            </div>
            <div class="col-sm-2">
                <label>Origem:</label>                   
                <select name="OrigemFiltro" id="OrigemFiltro" class="form-control" required="required">
                </select>  
            </div>
        </div>    
        <br>
    </div>
    <div class="row" style="text-align: center;">
        <div class="col-sm-3"></div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-primary" id="filtrarCliente" onclick="ListarCliente()" style="width: 80%; display: none;">Filtrar <i class="fa fa-check"></i></button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-default" onclick="window.location = 'CadastroCliente.php'" style="width: 80%">Cadastrar</button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-primary" onclick="AplicarFiltro('block')" id="btnFiltrar" style="width: 80%">Filtros</button>   
        </div>
        <div class="col-sm-3"></div>
    </div>
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
    <br>  
</div>

<div class="modal fade" id="modal-alterar-cliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Alterar Cliente</h4>
            </div>
            <div class="modal-body"> 
                <br>                              
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">               
                        <label>Nome:</label>                        
                        <input type="text" name="Nome" id="Nome" class="form-control" placeholder="Informe o Nome">                            
                    </div>
                    <div class="col-sm-2"></div>
                </div>               
                <br>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">               
                        <label>Email:</label>                        
                        <input type="email" name="Email" id="Email" class="form-control" placeholder="xxxx@xxxx.com">                            
                    </div>
                    <div class="col-sm-2"></div>
                </div>               
                <br>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">               
                        <label>Cpf:</label>                        
                        <input type="text" name="Documento" id="Documento" class="form-control" placeholder="111.111.111-11" onkeyup="MascaraCpf(this, event)" onkeypress="return SomenteNumero(event)" maxlength="14">                            
                    </div>
                    <div class="col-sm-2"></div>
                </div>               
                <br>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">               
                        <label>Tefone:</label>                     
                        <input type="Telefone" name="Telefone" id="Telefone" class="form-control" placeholder="(99) 99999-9999" onkeyup="MascaraTelefone(this, event)" onkeypress="return SomenteNumero(event)" maxlength="15">                    
                    </div>
                    <div class="col-sm-2"></div>
                </div>              
                <br>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2">               
                        <label>Estado:</label>                   
                        <select name="Estado" id="Estado" class="form-control" required="required" onchange="FiltrarCidade()">
                        </select>                                       
                    </div>
                    <div class="col-sm-6">               
                        <label>Cidade:</label>                   
                        <select name="Cidade" id="Cidade" class="form-control" required="required">
                        </select>                                        
                    </div>
                    <div class="col-sm-2"></div>
                </div>              
                <br>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">               
                        <label>Situação:</label>                   
                        <select name="Situacao" id="Situacao" class="form-control" required="required">
                            <option value="0">Inativo</option>
                            <option value="1">Ativo</option>
                        </select>                                       
                    </div>
                    <div class="col-sm-2"></div>
                </div>  
                <br>  
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">               
                        <label>Origem:</label>                   
                        <select name="Origem" id="Origem" class="form-control" required="required">
                        </select>                                      
                    </div>
                    <div class="col-sm-2"></div>
                </div> 
                <br>          
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">               
                        <label>Observação: </label>
                        <input type="text" name="Observacao" id="Observacao" class="form-control" placeholder="Sem Obs.">         
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <br>
                <div class="row" style="display: none;" id="ErrorResponse">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <label style="color: red;" id="labelErrorResponse"></label>                                         
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                <button type="button" class="btn btn-primary" onclick="AlterarCliente()">Confirmar</button>
            </div>
        </div>
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
<script src="../Script/Common/EstadoCidade.js"></script>
<script src="../Script/Common/Validacao.js"></script>
<script src="../Script/Common/Mascara.js"></script>
<script src="../Script/Common/Origem.js"></script>