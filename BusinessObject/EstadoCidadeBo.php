<?php
    /*<sumary>
        Essa Pagina é responsável pela controle do objeto Cidade e Estado
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"

    require_once("../../Entities/Base/ResultInfo.php");
    require_once("../../DataObjectAccess/EstadoCidadeDao.php");

    #endregion

    class EstadoCidadeBo 
    {
        public $Dao;
        public $ResultInfo;

        #region "Metodo Construtor"

        function __construct()
        {            
            $this->Dao        = new EstadoCidadeDao();
            $this->ResultInfo = new ResultInfo();
        }

        #endregion

        #region "Metodo para busca os estados"

        public function GetEstado($modelo)
        {
            try
            {     
                $this->ResultInfo->setItens($this->Dao->GetEstado($modelo));

                if(empty($this->ResultInfo->getItens()))
                {
                    $this->ResultInfo->setErro(true);   
                    $this->ResultInfo->setMensagem("Estados Não Encontrados!");                   
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

        #region "Metodo para busca as ciadades"

        public function GetCidade($modelo)
        {
            try
            {     
                $this->ResultInfo->setItens($this->Dao->GetCidade($modelo));

                if(empty($this->ResultInfo->getItens()))
                {
                    $this->ResultInfo->setErro(true);   
                    $this->ResultInfo->setMensagem("Estados Não Encontrados!");                   
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