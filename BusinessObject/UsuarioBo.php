<?php
    /*<sumary>
        Essa Pagina é responsável pela controle do objeto Usuario
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"

    require_once("../../Entities/Base/ResultInfo.php");
    require_once("../../DataObjectAccess/UsuarioDao.php");

    #endregion

    class UsuarioBo
    {
        public $Dao;
        public $ResultInfo;

        #region "Metodo Construtor"

        function __construct()
        {            
            $this->Dao        = new UsuarioDao();
            $this->ResultInfo = new ResultInfo();
        }

        #endregion
        
        #region "Metodo Para Validar o Login"

        public function ValidarLogin($modelo)
        {
            try
            {    
                $this->ResultInfo->setItem($this->Dao->ValidarLogin($modelo));

                if(empty($this->ResultInfo->getItem()))
                {
                    $this->ResultInfo->setErro(true);   
                    $this->ResultInfo->setMensagem("Usuário Não Encontrado!");                   
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

        #region "Metodo Para Validar o Login"

        public function InserirUsuario($modelo)
        {
            try
            {     
                $this->ResultInfo->setReturnInfo($this->Dao->InserirUsuario($modelo));

                if(empty($this->ResultInfo->getReturnInfo()))
                {
                    $this->ResultInfo->setErro(true);   
                    $this->ResultInfo->setMensagem("Ops Ocorreu um erro na Gravação!"); 

                    return $this->ResultInfo;                  
                }
                else if($this->ResultInfo->getReturnInfo() == -1)
                {
                    $this->ResultInfo->setErro(true);   
                    $this->ResultInfo->setMensagem("Já tem um Usuario Cadastrado com esse E-mail!");  

                    return $this->ResultInfo;
                }
                else if($this->ResultInfo->getReturnInfo() == -2)
                {
                    $this->ResultInfo->setErro(true);   
                    $this->ResultInfo->setMensagem("Já tem um Usuario Cadastrado com essa Senha!");  

                    return $this->ResultInfo;
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

        #region "Metodo Para Listar Usuario conforme filtros"

        public function ListarUsuarios($modelo)
        {
            try
            {    
                $this->ResultInfo->setItens($this->Dao->ListarUsuarios($modelo));

                if(empty($this->ResultInfo->getItens()))
                {
                    $this->ResultInfo->setErro(true);   
                    $this->ResultInfo->setMensagem("Usuário Não Encontrado!");                   
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