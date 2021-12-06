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

        #region "Metodo Para Inserir o Usuario"

        public function InserirUsuario($modelo)
        {
            try
            {     
                $this->ResultInfo->setReturnInfo($this->Dao->InserirUsuario($modelo));

                if(empty($this->ResultInfo->getReturnInfo()) || $this->ResultInfo->getReturnInfo() <= 0)
                {
                    $this->ResultInfo->setErro(true);   
                    $this->ResultInfo->setMensagem("Ops Ocorreu um erro na Gravação!"); 

                    if($this->ResultInfo->getReturnInfo() == -1){
                        $this->ResultInfo->setMensagem("Já tem um Usuario Cadastrado com esse E-mail!");  
                    }

                    if($this->ResultInfo->getReturnInfo() == -2){
                        $this->ResultInfo->setMensagem("Já tem um Usuario Cadastrado com essa Senha!");  
                    }

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

        #region "Metodo Para Alterar o Usuario"

        public function AlterarUsuario($modelo)
        {
            try
            {     
                $this->ResultInfo->setReturnInfo($this->Dao->AlterarUsuario($modelo));

                if(empty($this->ResultInfo->getReturnInfo()) || $this->ResultInfo->getReturnInfo() <= 0)
                {
                    $this->ResultInfo->setErro(true);   
                    $this->ResultInfo->setMensagem("Ops Ocorreu um erro na Gravação!"); 

                    if($this->ResultInfo->getReturnInfo() == -1){
                        $this->ResultInfo->setMensagem("Já tem um Usuario Cadastrado com esse E-mail!");  
                    }

                    if($this->ResultInfo->getReturnInfo() == -2){
                        $this->ResultInfo->setMensagem("Já tem um Usuario Cadastrado com essa Senha!");  
                    }

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

        #region "Metodo Para Excluir o Usuario"

        public function ExcluirUsuario($codigo)
        {
            try
            {     
                $this->ResultInfo->setReturnInfo($this->Dao->ExcluirUsuario($codigo));

                if(empty($this->ResultInfo->getReturnInfo()) || $this->ResultInfo->getReturnInfo() <= 0)
                {
                    $this->ResultInfo->setErro(true);   
                    $this->ResultInfo->setMensagem("Ops Ocorreu um erro na Exclusão Desse Usuário!"); 

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

        #region "Metodo Para Buscar Usuario Expecifico"

        public function GetUsuario($modelo)
        {
            try
            {    
                $this->ResultInfo->setItem($this->Dao->GetUsuario($modelo));

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
    }
?>