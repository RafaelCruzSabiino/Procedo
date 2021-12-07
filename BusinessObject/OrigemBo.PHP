<?php
    /*<sumary>
        Essa Pagina é responsável pela controle do objeto Usuario
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"

    require_once("../../Entities/Base/ResultInfo.php");
    require_once("../../DataObjectAccess/OrigemDao.php");

    #endregion

    class OrigemBo
    {
        public $Dao;
        public $ResultInfo;

        #region "Metodo Construtor"

        function __construct()
        {            
            $this->Dao        = new OrigemDao();
            $this->ResultInfo = new ResultInfo();
        }

        #endregion

        #region "Metodo Para Inserir a relação de Origem"

        public function InserirRelacaoOrigem($modelo)
        {
            try
            {    
                $this->ResultInfo->setReturnInfo($this->Dao->InserirRelacaoOrigem($modelo));

                if(empty($this->ResultInfo->getReturnInfo()) || $this->ResultInfo->getReturnInfo() <= 0)
                {
                    $this->ResultInfo->setErro(true);  
                    $this->ResultInfo->setMensagem("Erro ao Gravar a Origem!");                
                }
            }
            catch (Exception $e)
            {
                $this->ResultInfo->setErro(true);
                $this->ResultInfo->setMensagem($e->getMessage());
            }

            return $this->ResultInfo;
        }

        #endregion

        #region "Metodo Para Inserir a relação de Origem"

        public function ExcluirRelacaoOrigem($cliente)
        {
            try
            {    
                $this->ResultInfo->setReturnInfo($this->Dao->ExcluirRelacaoOrigem($cliente));

                if(empty($this->ResultInfo->getReturnInfo()) || $this->ResultInfo->getReturnInfo() <= 0)
                {
                    $this->ResultInfo->setErro(true);  
                    $this->ResultInfo->setMensagem("Erro ao Excluir a Origem!");                
                }
            }
            catch (Exception $e)
            {
                $this->ResultInfo->setErro(true);
                $this->ResultInfo->setMensagem($e->getMessage());
            }

            return $this->ResultInfo;
        }

        #endregion

        #region "Metodo Para Selecionar as origens conforme cliente"

        public function SelecionarOrigemCliente($modelo)
        {
            try
            {    
                $this->ResultInfo->setItens($this->Dao->SelecionarOrigemCliente($modelo));

                if(empty($this->ResultInfo->getItens()))
                {
                    $this->ResultInfo->setErro(true);   
                    $this->ResultInfo->setMensagem("Origens Não Encontradas!");                   
                }
            }
            catch (Exception $e)
            {
                $this->ResultInfo->setErro(true);
                $this->ResultInfo->setMensagem($e->getMessage());
            }

            return $this->ResultInfo;
        }

        #endregion

        #region "Metodo Para Selecionar as origens"

        public function SelecionarOrigem($modelo)
        {
            try
            {    
                $this->ResultInfo->setItens($this->Dao->SelecionarOrigem($modelo));

                if(empty($this->ResultInfo->getItens()))
                {
                    $this->ResultInfo->setErro(true);   
                    $this->ResultInfo->setMensagem("Origens Não Encontradas!");                   
                }
            }
            catch (Exception $e)
            {
                $this->ResultInfo->setErro(true);
                $this->ResultInfo->setMensagem($e->getMessage());
            }

            return $this->ResultInfo;
        }

        #endregion
    }

?>