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
        $usuario = array();
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
                $this->setSession("user",$result[$key]['usuario']);
                $acao = " <a class=\"icomoon-icon-pencil-4 alterUser \" data-toggle=\"modal\" id=\"".$result[$key]['id']."\" data-target=\"#alterUser\"></a> 
                          <a class=\"brocco-icon-trashcan removeUserId \" data-toggle=\"modal\" id=\"".$result[$key]['id']."\" data-target=\"#removeUser\"></a>
                        ";

                array_push($usuario,array("Nome"=>$result[$key]["nome"],"Usuario"=>$result[$key]["usuario"],"Email"=>$result[$key]["email"],"Ativo"=>$status,"Ação"=>$acao));
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
                return $usuario;
            }
        }
    }

    public function updateStatus($id,$status){
        $this->stmt = $this->pdo->prepare("UPDATE agil_usuario 
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

    public function desconnecta()
    {
        unset($this->pdo);
    }

    public function sql_query($param = null)
    {
        return $this->stmt->execute($param);
    }
}