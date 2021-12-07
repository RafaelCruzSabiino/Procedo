<?php
    /*<sumary>
        Essa Pagina é responsável pelo o usuario.
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"

    require_once("Base/BaseController.php");
    require_once("../../Entities/Cliente.php");
    require_once("../../Entities/Origem.php");
    require_once("../../BusinessObject/ClienteBo.php");
    require_once("../../BusinessObject/OrigemBo.php");

    #endregion

    class ClienteController extends BaseController
    {
        public $Entity;
        public $Bo;
        public $OrigemEntity;
        public $OrigemBo;

        #region "Metodo Construtor"

        function __construct()
        {
            parent::__construct(); 
            $this->Bo           = new ClienteBo();
            $this->Entity       = new Cliente();
            $this->OrigemEntity = new Origem();
            $this->OrigemBo     = new OrigemBo();
        }

        #endregion

        #region "Metodo para inserir o Cliente"

        public function InserirCliente()
        {
            $dados      = json_decode($_POST["Dados"]);            
            $modelo     = $this->Entity->MapToClass($this->Entity, $dados, 1);                       
            $retCliente = $this->Bo->InserirCliente($modelo);

            if(!$retCliente->getErro())
            {
                $this->OrigemEntity->setCliente($retCliente->getReturnInfo());

                for($i=0; $i < Count($dados->Origem); $i++)
                {
                    $this->OrigemEntity->setCodigo($dados->Origem[$i]);                   
                    $retOrigem = $this->OrigemBo->InserirRelacaoOrigem($this->OrigemEntity);

                    if($retOrigem->getErro()){
                        $this->Bo->ExcluirCliente($retCliente->getReturnInfo());

                        $retCliente->setErro(true);
                        $retCliente->setMensagem($retOrigem->getMensagem());
                        break;
                    }
                }
            }

            echo json_encode($retCliente);
        }

        #endregion

        #region "Metodo para Alterar o Cliente"

        public function AlterarCliente()
        {
            $dados      = json_decode($_POST["Dados"]);            
            $modelo     = $this->Entity->MapToClass($this->Entity, $dados, 1);                       
            $retCliente = $this->Bo->AlterarCliente($modelo);

            $this->OrigemBo->ExcluirRelacaoOrigem($modelo->getCodigo());

            $this->OrigemEntity->setCliente($modelo->getCodigo());

            for($i=0; $i < Count($dados->Origem); $i++)
            {
                $this->OrigemEntity->setCodigo($dados->Origem[$i]);                   
                $this->OrigemBo->InserirRelacaoOrigem($this->OrigemEntity);
            }

            echo json_encode($retCliente);
        }

        #endregion

        #region "Metodo para Excluir o Cliente"

        public function ExcluirCliente()
        {                                  
            echo json_encode($this->Bo->ExcluirCliente($_POST["Codigo"]));
        }

        #endregion

        #region "Metodo para Listar os Clientes"

        public function ListarCliente()
        {
            $ret = $this->Bo->ListarCliente($this->Entity);
            $dataTable = [];

            if(!$ret->getErro())
            {                
                for($i=0; $i < Count($ret->getItens()); $i++){
                    $dataRow = [];
                    array_push($dataRow, $ret->getItens()[$i]->Nome);
                    array_push($dataRow, $ret->getItens()[$i]->Email);
                    array_push($dataRow, $ret->getItens()[$i]->Telefone);
                    array_push($dataRow, $ret->getItens()[$i]->Documento);
                    array_push($dataRow, ($ret->getItens()[$i]->Situacao == 1 ? "Ativo" : "Inativo"));
                    array_push($dataRow, "<button type='button' class='btn btn-primary' onclick='SelecionarModalAlterar(". $ret->getItens()[$i]->Codigo .")'><i class='fa fa-edit'></i></button> <button type='button' class='btn btn-danger' onclick='SelecionarModalExcluir(". $ret->getItens()[$i]->Codigo .",\"". $ret->getItens()[$i]->Nome ."\")'><i class='fa fa-times'></i></button>");

                    array_push($dataTable, $dataRow);
                }
            }

            echo json_encode($dataTable);      
        }

        #endregion

        #region "Buscar Cliente Expecifico"

        public function GetCliente()
        {          
            $modelo = $this->Entity->MapToClass($this->Entity, $_POST);
            $ret    = $this->Bo->GetCliente($modelo);

            if(!$ret->getErro())
            {
                $this->OrigemEntity->setCodigo($ret->getItem()->Codigo);
                $retOrigem = $this->OrigemBo->SelecionarOrigemCliente($this->OrigemEntity);

                if($retOrigem->getErro())
                {
                    $ret->setErro(true);
                    $ret->setMensagem($retOrigem->getMensagem());
                }
                else
                {
                    $ret->getItem()->setOrigem($retOrigem->getItens());
                } 
            }

            echo json_encode($ret);
        }

        #endregion
    }

?>