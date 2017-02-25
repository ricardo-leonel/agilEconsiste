<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * Created by PhpStorm.
 * User: rleonel
 * Date: 29/01/17
 * Time: 22:48
 */
class LogModel
{

    private $usuario;
    private $acao;

    /**
     * LogModel constructor.
     * @param $usuario
     * @param $acao
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getAcao()
    {
        return $this->acao;
    }

    /**
     * @param mixed $acao
     */
    public function setAcao($acao)
    {
        $this->acao = $acao;
    }

}