<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Conexao.php';
include_once 'LogDao.php';
include_once '../model/LoginModel.php';

/**
 * Created by PhpStorm.
 * User: rleonel
 * Date: 28/01/17
 * Time: 09:26
 */
class LoginDao extends Conexao
{
    private $conexao;
    private  $stmt;
    private $loginModelParam;
    private $logModel;
    private $logDao;
    /**
     * LoginDao constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->loginModelParam = new LoginModel();
        $this->logModel = new LogModel();
        $this->logDao = new LogDao();
    }

    public function validate($loginModel){
        $this->loginModelParam = $loginModel;
        $user = $this->loginModelParam->getUsername();
        $pass = md5($this->loginModelParam->getPassword());
        $this->stmt = $this->pdo->prepare("SELECT * FROM agil_usuario WHERE usuario = :usuario  AND senha = :senha AND STATUS = 2");
        $param = array(':usuario' => $user, ':senha' => $pass);
        $count = 0;
        try {
            $this->sql_query($param);
            $result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
            foreach ($result as $key => $value){
                $this->setSession("user",$result[$key]['usuario']);
                $this->setSession("userID",$result[$key]['id']);
                $this->setSession("perfil",$result[$key]['perfil']);
                $this->setSession("Nome",$result[$key]['nome']);
                $this->logModel->setUsuario($result[$key]['id']);
                $this->logModel->setAcao('Usuario '.$result[$key]['usuario'].' logou no sistema.');
                $this->logDao->insertLog($this->logModel);
                $count++;
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
                if ($count > 0) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }


    /**
     * @Override
     */
    public function sql_query($param = null)
    {
       return $this->stmt->execute($param);
    }

    /**
     * @Override
     */
    public function desconnecta()
    {
        unset($this->pdo);
    }
}