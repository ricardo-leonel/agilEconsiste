<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Conexao.php';
include_once '../model/LogModel.php';

/**
 * Created by PhpStorm.
 * User: rleonel
 * Date: 29/01/17
 * Time: 22:47
 */
class LogDao extends Conexao
{

    private $conexao;
    private  $stmt;
    private $logModelParam;
    /**
     * LogDao constructor.
     * @param $conexao
     * @param $stmt
     */
    public function __construct()
    {
        parent::__construct();
        $this->logModelParam = new LogModel();
    }

    public function insertLog($logModel){
        $this->logModelParam = $logModel;

        $user = $this->logModelParam->getUsuario();
        $acao = $this->logModelParam->getAcao();
        $this->stmt = $this->pdo->prepare("INSERT INTO log_acesso(user,acao) VALUES(:usuario,:acao)");
        $param = array(':usuario' => $user, ':acao' => $acao);

        try {
           $this->sql_query($param);
        }catch (PDOException $e) {
            echo "Erro de Conexão " . $e->getMessage() . "\n";
            exit;
        }finally{
            try {
                $this->desconnecta();
                return true;
            }catch (PDOException $e) {
                echo "Erro de Conexão " . $e->getMessage() . "\n";
                return false;
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
            $this->stmt->execute($param) or die(print_r($this->stmt->errorInfo(), true));
         //  $this->stmt->debugDumpParams();
        }catch (PDOException $e) {
            echo "Erro de Conexão " . $e->getMessage() . "\n";
            exit;
        }
        return true;
    }
}