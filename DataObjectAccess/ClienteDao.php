<?php
    /*<sumary>
        Essa Pagina é responsável pela conexao com o banco para o Cliente
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"

    require_once("Base/BaseDao.php");

    #endregion

    class ClienteDao extends BaseDao
    {
        #region "Metodo Construtor"

        public function __construct()
        {
            parent::__construct();
        }

        #endregion

        #region "Metodo Para Inserir Cliente"

        public function InserirCliente($modelo)
        {
            $sql = "CALL PROCEDO_CLIENTE_0001(?,?,?,?,?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $modelo->getNome());
                $this->Qry->bindValue(2, $modelo->getEmail());
                $this->Qry->bindValue(3, $modelo->getDocumento());
                $this->Qry->bindValue(4, $modelo->getTelefone());
                $this->Qry->bindValue(5, $modelo->getCidade());
                $this->Qry->bindValue(6, $modelo->getObservacao());
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

        #region "Metodo Para Alterar Cliente"

        public function AlterarCliente($modelo)
        {
            $sql = "CALL PROCEDO_CLIENTE_0002(?,?,?,?,?,?,?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $modelo->getCodigo());
                $this->Qry->bindValue(2, $modelo->getNome());
                $this->Qry->bindValue(3, $modelo->getEmail());
                $this->Qry->bindValue(4, $modelo->getDocumento());
                $this->Qry->bindValue(5, $modelo->getTelefone());
                $this->Qry->bindValue(6, $modelo->getCidade());
                $this->Qry->bindValue(7, $modelo->getSituacao());
                $this->Qry->bindValue(8, $modelo->getObservacao());
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

        #region "Metodo Para Excluir Cliente"

        public function ExcluirCliente($codigo)
        {
            $sql = "CALL PROCEDO_CLIENTE_0003(?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $codigo);
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

        #region "Metodo Para Listar os Clientes"

        public function ListarCliente($modelo)
        {
            $sql = "CALL PROCEDO_CLIENTE_0005()";

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
        
        #region "Buscar Cliente Expecifico"

        public function GetCliente($modelo)
        {
            $sql = "CALL PROCEDO_CLIENTE_0004(?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $modelo->getCodigo());
                $this->Qry->execute();

                $ret = $this->BaseToModel($modelo);
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