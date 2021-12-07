<?php
    /*<sumary>
        Essa Pagina é responsável pelo o usuario.
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"

    require_once("Base/BaseController.php");
    require_once("../../Entities/Usuario.php");
    require_once("../../BusinessObject/UsuarioBo.php");

    #endregion

    class UsuarioController extends BaseController
    {
        public $Entity;
        public $Bo;

        #region "Metodo Construtor"

        function __construct()
        {
            parent::__construct(); 
            $this->Bo     = new UsuarioBo();
            $this->Entity = new Usuario();
        }

        #endregion

        #region "Metodo para inserir o usuario"

        public function InserirUsuario()
        {
            $dados = json_decode($_POST["Dados"]);               
            $dados->Criptografia = md5($dados->Senha); 

            $modelo = $this->Entity->MapToClass($this->Entity, $dados, 1);
                       
            echo json_encode($this->Bo->InserirUsuario($modelo));
        }

        #endregion

        #region "Metodo para alterar o usuario"

        public function AlterarUsuario()
        {
            $dados = json_decode($_POST["Dados"]);               
            $dados->Criptografia = md5($dados->Senha); 

            $modelo = $this->Entity->MapToClass($this->Entity, $dados, 1);
                       
            echo json_encode($this->Bo->AlterarUsuario($modelo));
        }

        #endregion

        #region "Metodo para Excluir o usuario"

        public function ExcluirUsuario()
        {
            $codigo = $_POST["Codigo"];               
                        
            echo json_encode($this->Bo->ExcluirUsuario($codigo));
        }

        #endregion

        #region "Listar Usuarios Conforme filtros"

        public function ListarUsuarios()
        {
            $dados     = json_decode($_POST["Dados"]);            
            $modelo    = $this->Entity->MapToClass($this->Entity, $dados, 1);
            $ret       = $this->Bo->ListarUsuarios($modelo);
            $dataTable = [];

            if(!$ret->getErro())
            {                
                for($i=0; $i < Count($ret->getItens()); $i++)
                {
                    $dataRow = [];
                    array_push($dataRow, $ret->getItens()[$i]->Nome);
                    array_push($dataRow, $ret->getItens()[$i]->Email);
                    array_push($dataRow, $ret->getItens()[$i]->Telefone);
                    array_push($dataRow, ($ret->getItens()[$i]->Situacao == 1 ? "Ativo" : "Inativo"));
                    array_push($dataRow, "<button type='button' class='btn btn-primary' onclick='SelecionarModalAlterar(". $ret->getItens()[$i]->Codigo .")'><i class='fa fa-pencil-square-o'></i></button> <button type='button' class='btn btn-danger'  onclick='SelecionarModalExcluir(". $ret->getItens()[$i]->Codigo .",\"". $ret->getItens()[$i]->Nome ."\")'><i class='fa fa-times'></i></button>");

                    array_push($dataTable, $dataRow);
                }
            }

            echo json_encode($dataTable);
        }

        #endregion

        #region "Listar Usuario Expecifico"

        public function GetUsuario()
        {          
            $modelo = $this->Entity->MapToClass($this->Entity, $_POST);

            echo json_encode($this->Bo->GetUsuario($modelo));
        }

        #endregion

    }

?>