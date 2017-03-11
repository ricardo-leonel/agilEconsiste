<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once '../controllers/Session.php';
/**
 * Created by PhpStorm.
 * User: rleonel
 * Date: 28/01/17
 * Time: 10:02
 */

abstract class Conexao {

    var $pdo;
    var $query;
    var $link;
    var $resultado;
    private $sessao;


    public function __construct() {
        $this->sessao = new Session();
        try{
            $host = "localhost";
            $user = "root"; # Usuário no Host/Servidor
            $senha = "r32381836"; # Senha no Host/Servidor
            $dbase = "agileeconsiste"; # Nome do seu Banco de Dados
            $this->pdo = new PDO ("mysql:host=$host;dbname=$dbase","$user","$senha");
        } catch (PDOException $e) {
            echo "Erro de Conexão " . $e->getMessage() . "\n";
            exit;
        }

    }

    abstract public function desconnecta();

    abstract public function sql_query( $param = null);


    /**
     * @return mixed
     */
    public function getSession($key)
    {

        return $this->sessao->get($key);
    }

    /**
     * @param mixed $session
     */
    public function setSession($key,$session)
    {
        $this->sessao->set($key,$session);
    }

    public function destroySession()
    {
        $this->sessao->destroy();
    }
}
?>
