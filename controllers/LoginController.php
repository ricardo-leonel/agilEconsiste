<?php

include_once '../model/LoginModel.php';
include_once '../dao/LoginDao.php';
include_once '../model/LogModel.php';
include_once '../dao/LogDao.php';
include_once '../controllers/Session.php';

/**
 * Created by PhpStorm.
 * User: rleonel
 * Date: 28/01/17
 * Time: 09:25
 */

class LoginController
{
    private $loginModel;
    private $loginDao;


    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        if(!isset($_POST['acao'])){
            $_POST['acao'] = "";
        }
        if(!isset($_GET['acao'])){
            $_GET['acao'] = "";
        }
        if($_POST['acao'] == "logar") {
            $this->loginAction();
        }else if($_GET['acao'] == "logout"){
            $this->logoutAction();
        }else{
            echo "erro";
        }
    }

    function loginAction()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $encoded = "";
        $this->loginModel = new LoginModel($username,$password);
        $this->loginDao = new LoginDao();
        if ($this->loginDao->validate($this->loginModel))
        {
            $encoded = json_encode("ok");
        }
        else
        {
            $encoded  = json_encode("erro");

        }

        echo $encoded;
    }

    function logoutAction()
    {
        $logModel = new LogModel();
        $logdao = new LogDao();
        $session = new Session();
        $logModel->setAcao("Usuario ".$session->get('Nome')." saiu do sistema");
        $logModel->setUsuario($session->get('user'));
        $logdao->insertLog($logModel);
        $session->destroy();
        $encoded = "<script>document.location='../index.php'</script>";
        echo $encoded;
    }
}
new LoginController();