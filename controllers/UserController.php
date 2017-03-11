<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);   

include_once '../model/UserModel.php';
include_once '../dao/UserDao.php';
include_once '../model/LogModel.php';
include_once '../dao/LogDao.php';
include_once '../controllers/Session.php';

/**
 * Created by PhpStorm.
 * User: rleonel
 * Date: 28/01/17
 * Time: 09:25
 */

class UserController
{
    private $loginModel;
    private $loginDao;


    /**
     * UserController constructor.
     */
    public function __construct()
    {
        if(!isset($_POST['acao'])){
            $_POST['acao'] = "";
        }
        if($_POST['acao'] == "incluir") {
            $this->incluirAction();
        }else if($_POST['acao'] == "alterar"){
            $this->alterarAction();
        }else if($_POST['acao'] == "remover"){
            $this->removerAction();
        }else if($_POST['acao'] == "updateStatus"){
            $this->updateStatus();
        }else{
            $this->listarAction();
        }
    }

    public function incluirAction(){

    }

    public function alterarAction(){

    }

    public function removerAction(){

    }

    public function listarAction(){

        $userDao = new UserDao();
        $data = $userDao->listarAction();

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData"=>$data);


        echo json_encode($results);
    }

   /* public function listarClientAction(){

        $clientDao = new ClienteDao();
        return $clientDao->listarAction();
    }
*/
    public function updateStatus(){
        $userDao = new UserDao();
        echo $userDao->updateStatus($_POST['id'],$_POST['status']);
    }



}
new UserController();