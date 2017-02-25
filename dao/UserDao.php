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
class UserDao extends Conexao
{

    private  $stmt;
    private $logModelParam;
    /**
     * UserDao constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->logModelParam = new LogModel();
    }

    public function listarAction(){
        $this->stmt = $this->pdo->prepare("SELECT * FROM agil_usuario");
        $count = 0;
        $lista = array();
        try {
            $this->sql_query();
            $result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
            foreach ($result as $key => $value){
                $this->setSession("user",$result[$key]['usuario']);
                $usuario = array();
                array_push($usuario,array("id"=>$result[$key]["id"],"nome"=>$result[$key]["nome"],"usuario"=>$result[$key]["usuario"],"email"=>$result[$key]["email"],"status"=>$result[$key]["status"]));
                array_push($lista,$usuario);
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
        return $this->stmt->execute($param);
    }
}