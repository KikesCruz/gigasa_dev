<?php
namespace Lib;
class Session{

    public static function init(){
        session_id();
        session_start();
    }

    public static function add($key, $value){
        if(!empty($clave))
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function getAll(){
        return $_SESSION;
    }

    public static function remove($key){
        if(!empty($_SESSION[$key]))
        unset($_SESSION[$key]);
    }

    // close session
    public static function close(){
        session_unset();
        session_destroy();
    }

    public static function getStatus(){
        return session_status();
    }


}