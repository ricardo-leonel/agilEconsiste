<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Conexao.php';
include_once '../model/LogModel.php';
include_once '../dao/LogDao.php';

/**
 * Created by PhpStorm.
 * User: rleonel
 * Date: 29/01/17
 * Time: 22:47
 */
class ClienteDao extends Conexao
{

    private  $stmt;
    private $logDao;
    private $logModel;

    /**
     * ClienteDao constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->clienteArray = new ClienteModel();
        $this->logModel = new LogModel();
        $this->logDao= new LogDao();
    }

    public function updateStatus($id,$status){
     /*   $this->clienteArray = $this->getByIdAction($id);
        $this->logModel->setUsuario($this->getSession("userID"));
        $this->logModel->setAcao('Cliente '.$this->clienteArray->getNome().' alterado por '.$this->getSession("user"));
        $this->logDao->insertLog($this->logModel);*/
        $this->stmt = $this->pdo->prepare("UPDATE agil_cliente 
                                            SET  status = :status
                                            WHERE id = :id");
        $param = array( ':id' => $id,':status' => $status);
        //print_r($param);
        try {
            $this->sql_query($param);
        }catch (PDOException $e) {
            echo "Erro de Conexão " . $e->getMessage() . "\n";
            exit;
        }finally{
            try {
                $this->desconnecta();
            }catch (PDOException $e) {
                echo "Erro de Conexão " . $e->getMessage() . "\n";
                return false;
            }
            return true;
        }
    }


    public function updateCliente($clientModel){

        $this->clienteArray = $clientModel;
        $this->logModel->setUsuario($this->getSession("userID"));
        $this->logModel->setAcao('Cliente '.$this->clienteArray->getNome().' alterado por '.$this->getSession("user"));
        $this->logDao->insertLog($this->logModel);
        $this->stmt = $this->pdo->prepare("UPDATE agil_cliente 
                                            SET  nome = :nome, cnpj = :cnpj, inscricao_estadual = :inscricao_estadual, endereco = :endereco, cidade = :cidade,
                                                bairro = :bairro, uf = :uf, cep = :cep, telefone = :telefone, email = :email, status = :status
                                            WHERE id = :id");
        $param = array( ':id' => $this->clienteArray->getId(), ':nome' => $this->clienteArray->getNome(), ':cnpj' => $this->clienteArray->getCnpj()
        , ':inscricao_estadual' => $this->clienteArray->getInsEstadual(), ':endereco' => $this->clienteArray->getEndereco()
        , ':cidade' => $this->clienteArray->getCidade(), ':bairro' => $this->clienteArray->getBairro(), ':uf' => $this->clienteArray->getEstado()
        , ':cep' => $this->clienteArray->getCep(), ':telefone' => $this->clienteArray->getTelefone(), ':email' => $this->clienteArray->getEmail()
        , ':status' => $this->clienteArray->getStatus());
        //print_r($param);
        try {
            $this->sql_query($param);
        }catch (PDOException $e) {
            echo "Erro de Conexão " . $e->getMessage() . "\n";
            exit;
        }finally{
            try {
                $this->desconnecta();
            }catch (PDOException $e) {
                echo "Erro de Conexão " . $e->getMessage() . "\n";
                return false;
            }
            $lista = new ClienteDao();
            return $lista->listarAction();
        }
    }


    public function insertCliente($clientModel){

        $this->clienteArray = $clientModel;
        $this->logModel->setUsuario($this->getSession("userID"));
        $this->logModel->setAcao('Cliente '.$this->clienteArray->getNome().' inserido por '.$this->getSession("user"));
        $this->logDao->insertLog($this->logModel);
        $this->stmt = $this->pdo->prepare("INSERT INTO agil_cliente (nome, cnpj, inscricao_estadual, endereco, cidade, bairro, uf, cep, telefone, email, status,deletado)
                                            VALUES(:nome,:cnpj,:inscricao_estadual,:endereco,:cidade,
                                                :bairro,:uf,:cep,:telefone,:email,:status,'')");
        $param = array( ':nome' => $this->clienteArray->getNome(), ':cnpj' => $this->clienteArray->getCnpj()
        , ':inscricao_estadual' => $this->clienteArray->getInsEstadual(), ':endereco' => $this->clienteArray->getEndereco()
        , ':cidade' => $this->clienteArray->getCidade(), ':bairro' => $this->clienteArray->getBairro(), ':uf' => $this->clienteArray->getEstado()
        , ':cep' => $this->clienteArray->getCep(), ':telefone' => $this->clienteArray->getTelefone(), ':email' => $this->clienteArray->getEmail()
        , ':status' => $this->clienteArray->getStatus());
        //print_r($param);
        try {
            $this->sql_query($param);
        }catch (PDOException $e) {
            echo "Erro de Conexão " . $e->getMessage() . "\n";
            exit;
        }finally{
            try {
                $this->desconnecta();
            }catch (PDOException $e) {
                echo "Erro de Conexão " . $e->getMessage() . "\n";
                return false;
            }
            $lista = new ClienteDao();
            return $lista->listarAction();
        }
    }

    public function removeCliente($clientModel){

        $this->clienteArray = $clientModel;
        $this->logModel->setUsuario($this->getSession("userID"));
        $this->logModel->setAcao('Cliente '.$this->clienteArray->getId().' removido por '.$this->getSession("user"));
        $this->logDao->insertLog($this->logModel);
        $this->stmt = $this->pdo->prepare("UPDATE agil_cliente SET deletado = '*' WHERE id = :id");
        $param = array( ':id' => $this->clienteArray->getId());
        //print_r($param);
        try {
            $this->sql_query($param);
        }catch (PDOException $e) {
            echo "Erro de Conexão " . $e->getMessage() . "\n";
            return false;
        }finally{
            try {
                $this->desconnecta();
            }catch (PDOException $e) {
                echo "Erro de Conexão " . $e->getMessage() . "\n";
                return false;
            }
            return true;
        }
    }

    public function listarAction(){
        $this->stmt = $this->pdo->prepare("SELECT * FROM agil_cliente WHERE deletado != '*'");
        $count = 0;
        $cliente = array();
        try {
            $this->sql_query();
            $result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
            foreach ($result as $key => $value){
                if($result[$key]["status"] == 2)
                {
                    $status = "<a class=\"icomoon-icon-checkmark status\" id=\"".$result[$key]['id']."\" >";
                }else{
                    $status = "<a class=\"icomoon-icon-close status\" id=\"".$result[$key]['id']."\" >";
                }
                $acao = "<a class=\"icomoon-icon-eye cliente \"  data-toggle=\"modal\" id=\"".$result[$key]['id']."\" data-target=\"#detailClient\"></a> 
															<a class=\"icomoon-icon-pencil-4 alterCliente \" data-toggle=\"modal\" id=\"".$result[$key]['id']."\" data-target=\"#alterClient\"></a> 
															<a class=\"brocco-icon-trashcan removeClientId \" data-toggle=\"modal\" id=\"".$result[$key]['id']."\" data-target=\"#removeClient\"></a>";
                array_push($cliente,array("Nome"=>$result[$key]["nome"],"CNPJ"=>$result[$key]["cnpj"],"Email"=>$result[$key]["email"],"Cidade"=>$result[$key]["cidade"],"UF"=>$result[$key]["uf"],"Telefone"=>$result[$key]["telefone"],"Ativo"=>$status,"Ação"=>$acao));
            }
        }catch (PDOException $e) {
            echo "Erro de Conexão " . $e->getMessage() . "\n";
            exit;
        }finally{
            try {
                $this->desconnecta();
            }catch (PDOException $e) {
                echo "Erro de Conexão " . $e->getMessage() . "\n";
                return false;
            }finally {
                return $cliente;
            }
        }
    }

    public function getByIdAction($id){
        $this->stmt = $this->pdo->prepare("SELECT * FROM agil_cliente WHERE id = :id");
        $lista = array();
        $param = array();
        $param[":id"] = $id;
        try {
            $this->sql_query($param);
            $result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
            foreach ($result as $key => $value){
                $cliente = array();
                array_push($cliente,array("id" =>$result[$key]["id"],"nome"=>$result[$key]["nome"],"cnpj"=>$result[$key]["cnpj"],"inscEstadual"=>$result[$key]["inscricao_estadual"],"endereco"=>$result[$key]["endereco"],"cidade"=>$result[$key]["cidade"],"bairro"=>$result[$key]["bairro"],"uf"=>$result[$key]["uf"],"cep"=>$result[$key]["cep"],"telefone"=>$result[$key]["telefone"],"email"=>$result[$key]["email"],"status"=>$result[$key]["status"]));
                array_push($lista,$cliente);
            }
        }catch (PDOException $e) {
            echo "Erro de Conexão " . $e->getMessage() . "\n";
            exit;
        }finally{
            try {
                $this->desconnecta();
            }catch (PDOException $e) {
                echo "Erro de Conexão " . $e->getMessage() . "\n";
                return false;
            }finally {
                return $lista;
            }
        }
    }


    public function desconnecta()
    {
        unset($this->pdo);
    }

    public function sql_query($param = null)
    {
        try {
            $this->stmt->execute($param) or die($this->stmt->debugDumpParams());
           //;
        }catch (PDOException $e) {
            echo "Erro de Conexão " . $e->getMessage() . "\n";
            exit;
        }
        return true;
    }

}