<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include_once '../model/ClienteModel.php';
include_once '../dao/ClienteDao.php';
include_once '../model/LogModel.php';
include_once '../dao/LogDao.php';
include_once '../controllers/Session.php';

/**
 * Created by PhpStorm.
 * User: rleonel
 * Date: 28/01/17
 * Time: 09:25
 */

class ClienteController
{
    private $loginModel;
    private $loginDao;


    /**
     * ClienteController constructor.
     */
    public function __construct()
    {
        if(!isset($_POST['acao'])){
            $_POST['acao'] = "";
        }
        if($_POST['acao'] == "inserir") {
            $clientModel = new ClienteModel();
            $clientModel->setStatus($_POST['acao']);
            $clientModel->setEmail($_POST['email']);
            $clientModel->setBairro($_POST['bairro']);
            $clientModel->setCep($_POST['cep']);
            $clientModel->setCidade($_POST['cidade']);
            $clientModel->setCnpj($_POST['cnpj']);
            $clientModel->setEndereco($_POST['endereco']);
            $clientModel->setEstado($_POST['estado']);
            $clientModel->setInsEstadual($_POST['inscEst']);
            $clientModel->setNome($_POST['nome']);
            $clientModel->setTelefone($_POST['telefone']);
            if($_POST['statusRadio'] == 'SIM'){
                $clientModel->setStatus(2);
            }else{
                $clientModel->setStatus(1);
            }
            $this->incluirAction($clientModel);
        }else if($_POST['acao'] == "alterar"){
            $clientModel = new ClienteModel();
            $clientModel->setStatus($_POST['acao']);
            $clientModel->setID($_POST['id']);
            $clientModel->setEmail($_POST['emailModal2']);
            $clientModel->setBairro($_POST['bairroModal2']);
            $clientModel->setCep($_POST['cepModal2']);
            $clientModel->setCidade($_POST['cidadeModal2']);
            $clientModel->setCnpj($_POST['cnpjModal2']);
            $clientModel->setEndereco($_POST['enderecoModal2']);
            $clientModel->setEstado($_POST['estadoModal2']);
            $clientModel->setInsEstadual($_POST['inscEstModal2']);
            $clientModel->setNome($_POST['nomeModal2']);
            $clientModel->setTelefone($_POST['telefoneModal2']);
            $clientModel->setStatus($_POST['statusRadio']);
            $this->alterarAction($clientModel);
        }else if($_POST['acao'] == "remover"){
            $clientModel = new ClienteModel();
            $clientModel->setID($_POST['id']);
            $this->removerAction($clientModel);
        }else if($_POST['acao'] == "getById"){
            $this->getByIdAction();
        }else if($_POST['acao'] == "updateStatus"){
            $this->updateStatus();
        }else{
            $this->listarAction();
        }
    }

    public function incluirAction($clienteModel){
        $clienteDao = new ClienteDao();
        $return = json_encode($clienteDao->insertCliente($clienteModel));
        echo $return;
    }

    public function alterarAction($clienteModel){
        $clienteDao = new ClienteDao();
        $return = json_encode($clienteDao->updateCliente($clienteModel));
        echo $return;
    }

    public function removerAction($clienteModel){
        $clienteDao = new ClienteDao();
        $return = $clienteDao->removeCliente($clienteModel);
        echo $return;
    }

    public function listarAction(){

        $clienteDao = new ClienteDao();
        $data = $clienteDao->listarAction();

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData"=>$data);


        echo json_encode($results);
    }

    /*
     * Call By Javascript
     */
    public function getByIdAction(){
        $clienteDao = new ClienteDao();
        echo json_encode($clienteDao->getByIDAction($_POST['id']));
    }

    public function updateStatus(){
        $clienteDao = new ClienteDao();
        echo $clienteDao->updateStatus($_POST['id'],$_POST['status']);
    }



}
new ClienteController();