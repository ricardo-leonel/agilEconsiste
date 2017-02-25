<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/**
 * Created by PhpStorm.
 * User: rleonel
 * Date: 29/01/17
 * Time: 22:19
 */
class Session
{
    private $sessionName;

    /**
     * Session constructor.
     */
    public function __construct($sessionName=null, $regenerateId=false, $sessionId=null)
    {
        if (!is_null($sessionId)) {
            session_id($sessionId);
        }
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if ($regenerateId) {
            session_regenerate_id(true);
        }

        if (!is_null($sessionName)) {
            $this->sessionName = session_name($sessionName);
        }
    }

    public function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    /*
        to set something like $_SESSION['key1']['key2']['key3']:
        $session->setMd(array('key1', 'key2', 'key3'), 'value')
    */
    public function setMd($keyArray, $val)
    {
        $arrStr = "['".implode("']['", $keyArray)."']";
        $_SESSION{$arrStr} = $val;
    }


    public function get($key)
    {
        return (isset($_SESSION[$key])) ? $_SESSION[$key] : false;
    }

    /*
        to get something like $_SESSION['key1']['key2']['key3']:
        $session->getMd(array('key1', 'key2', 'key3'))
    */
    public function getMd($keyArray)
    {
        $arrStr = "['".implode("']['", $keyArray)."']";
        return (isset($_SESSION{$arrStr})) ? $_SESSION{$arrStr} : false;
    }


    public function delete($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }


    public function deleteMd($keyArray)
    {
        $arrStr = "['".implode("']['", $keyArray)."']";
        if (isset($_SESSION{$arrStr})) {
            unset($_SESSION{$arrStr});
            return true;
        }
        return false;
    }


    public function regenerateId($destroyOldSession=false)
    {
        session_regenerate_id(false);

        if ($destroyOldSession) {
            //  hang on to the new session id and name
            $sid = session_id();
            //  close the old and new sessions
            session_write_close();
            //  re-open the new session
            session_id($sid);
            session_start();
        }
    }


    public function destroy()
    {
        return session_destroy();
    }


    public function getName()
    {
        return $this->sessionName;
    }
}


?>