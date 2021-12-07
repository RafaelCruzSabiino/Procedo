<?php
    include 'Header.php';
?>

<div class="container">
    <h1 class="text-center">Cadastro de Cliente</h1> 
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
            <label>Cpf:</label>                        
            <input type="text" name="Documento" id="Documento" class="form-control" placeholder="111.111.111-11" onkeyup="MascaraCpf(this, event)" onkeypress="return SomenteNumero(event)" maxlength="14">      
        </div>
        <div class="col-sm-4"></div>
    </div>                             
    <br>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">               
            <label>Tefone:</label>                     
            <input type="text" name="Telefone" id="Telefone" class="form-control" placeholder="(99) 99999-9999" onkeyup="MascaraTelefone(this, event)" onkeypress="return SomenteNumero(event)" maxlength="15">                    
        </div>
        <div class="col-sm-4"></div>
    </div>              
    <br>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1">               
            <label>Estado:</label>                   
            <select name="Estado" id="Estado" class="form-control" required="required" onchange="FiltrarCidade()">
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
        <div class="col-sm-4">               
            <label>Origem:</label>                   
            <select name="Origem" id="Origem" class="form-control" required="required">
            </select>                                      
        </div>
        <div class="col-sm-4"></div>
    </div> 
    <br>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">               
            <label>Observação:</label>                     
            <input type="text" name="Observacao" id="Observacao" class="form-control" placeholder="Sem Obs">                    
        </div>
        <div class="col-sm-4"></div>
    </div>              
    <br>
    <div class="row" style="display: none;" id="ErrorResponse">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <label style="color: red;" id="labelErrorResponse"></label>                                         
        </div>
        <div class="col-sm-4"></div>
    </div>   
    <br>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-2">            
            <button type="button" class="btn btn-dafault" onclick="window.location = 'Cliente.php'">Cancelar</button> 
        </div>
        <div class="col-sm-2" style="text-align: right;">               
            <button type="button" class="btn btn-primary" id="CadastrarCliente">Cadastrar</button>            
        </div>
        <div class="col-sm-4"></div>
    </div>            
    <br>
</div>

<?php
    include 'Footer.php';
?>

<script src="../Script/CadastroCliente.js"></script>
<script src="../Script/Modelos/Cliente.js"></script>
<script src="../Script/Common/EstadoCidade.js"></script>
<script src="../Script/Common/Validacao.js"></script>
<script src="../Script/Common/Mascara.js"></script>
<script src="../Script/Common/Origem.js"></script>