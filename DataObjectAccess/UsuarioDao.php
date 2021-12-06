<?php
    /*<sumary>
        Essa Pagina é responsável pela conexao com o banco para o Usuario
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"

    require_once("Base/BaseDao.php");

    #endregion

    class UsuarioDao extends BaseDao
    {
        #region "Metodo Construtor"

        public function __construct()
        {
            parent::__construct();
        }

        #endregion

        #region "Metodo Para Validar o Login"

        public function ValidarLogin($modelo)
        {
            $sql = "CALL PROCEDO_USUARIO_0006(?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $modelo->getEmail());
                $this->Qry->bindValue(2, $modelo->getCriptografia());
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

        #region "Metodo para Inserir Usuario"

        public function InserirUsuario($modelo)
        {
            $sql = "CALL PROCEDO_USUARIO_0001(?,?,?,?,?,?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $modelo->getNome());
                $this->Qry->bindValue(2, $modelo->getEmail());
                $this->Qry->bindValue(3, $modelo->getSenha());
                $this->Qry->bindValue(4, $modelo->getCriptografia());
                $this->Qry->bindValue(5, $modelo->getSexo());
                $this->Qry->bindValue(6, $modelo->getTelefone());
                $this->Qry->bindValue(7, $modelo->getCidade());
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

        #region "Metodo para Listar Usuarios conforme filtro"

        public function ListarUsuarios($modelo)
        {
            $sql = "CALL PROCEDO_USUARIO_0005(?,?,?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $modelo->getEstado()   == "" ? null : $modelo->getEstado());
                $this->Qry->bindValue(2, $modelo->getCidade()   == "" ? null : $modelo->getCidade());
                $this->Qry->bindValue(3, $modelo->getNome()     == "" ? null : $modelo->getNome());
                $this->Qry->bindValue(4, $modelo->getSituacao() == "" ? null : $modelo->getSituacao());
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