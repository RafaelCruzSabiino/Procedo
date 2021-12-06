<?php
    /*<sumary>
        Essa Pagina é responsável pela conexao com o banco para as ORIGENS
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"

    require_once("Base/BaseDao.php");

    #endregion

    class OrigemDao extends BaseDao
    {
        #region "Metodo Construtor"

        public function __construct()
        {
            parent::__construct();
        }

        #endregion

        #region "Metodo para Inserir relação de origem"

        public function InserirRelacaoOrigem($modelo)
        {
            $sql = "CALL PROCEDO_ORIGEM_0001(?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $modelo->getCodigo());
                $this->Qry->bindValue(2, $modelo->getUsuario());
                $this->Qry->execute();

                $ret = $this->ReturnValue();
                $this->QryClose();
                $this->FecharConexao();
            }
            catch(PDOException $e)
            {
                throw new Exception($e);
            }

            return $ret;
        }

        #endregion

        #region "Metodo para Excluir Origens por Usuario"

        public function ExcluirRelacaoOrigem($cliente)
        {
            $sql = "CALL PROCEDO_ORIGEM_0002(?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $cliente);
                $this->Qry->execute();

                $ret = $this->ReturnValue();
                $this->QryClose();
                $this->FecharConexao();
            }
            catch(PDOException $e)
            {
                throw new Exception($e);
            }

            return $ret;
        }

        #endregion

        #region "Metodo para Selecionar todas as origens Origens"

        public function SelecionarOrigem($modelo)
        {
            $sql = "CALL PROCEDO_ORIGEM_0004()";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->execute();

                $ret = $this->BaseToModels($modelo);
                $this->QryClose();
                $this->FecharConexao();
            }
            catch(PDOException $e)
            {
                throw new Exception($e);
            }

            return $ret;
        }

        #endregion

        #region "Metodo para Selecionar Origens conforme Cliente"

        public function SelecionarClienteOrigem($modelo)
        {
            $sql = "CALL PROCEDO_ORIGEM_0003(?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $modelo->getCliente());
                $this->Qry->execute();

                $ret = $this->BaseToModels($modelo);
                $this->QryClose();
                $this->FecharConexao();
            }
            catch(PDOException $e)
            {
                throw new Exception($e);
            }

            return $ret;
        }

        #endregion
    }

?>