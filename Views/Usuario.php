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

<div class="modal fade" id="modal-alterar-usuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Alterar Usuário</h4>
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
                        <label>Senha:</label>                        
                        <input type="password" name="Senha" id="Senha" class="form-control" placeholder="*********">      
                        <span>No Mínimo: 8 Caracteres, 1 Letra Maiúsculas, 1 Letra Minúscula</span>                      
                    </div>
                    <div class="col-sm-2"></div>
                </div>               
                <br>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">               
                        <label>Confirmar Senha:</label>                        
                        <input type="password" name="ConfirmarSenha" id="ConfirmarSenha" class="form-control" placeholder="*********">                            
                    </div>
                    <div class="col-sm-2"></div>
                </div>               
                <br>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">               
                        <label>Sexo: </label>
                        <select name="Sexo" id="Sexo" class="form-control" required="required">
                            <option value="">Selecione</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>                         
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
                <button type="button" class="btn btn-primary" onclick="AlterarUsuario()">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-excluir-usuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Excluir Usuario</h4>
            </div>
            <div class="modal-body">
                <h4>Deseja Realmente Excluir o Usuário: </h4><p id="returnExcluir"></p>
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
                <button type="button" class="btn btn-primary" onclick="ExcluirUsuario()">Excluir</button>
            </div>
        </div>
    </div>
</div>

<?php
    include 'Footer.php';
?>
<script src="../Script/Usuario.js"></script>
<script src="../Script/Modelos/Usuario.js"></script>
<script src="../Script/Common/EstadoCidade.js"></script>
<script src="../Script/Common/Validacao.js"></script>
<script src="../Script/Common/Mascara.js"></script>
