<?php

class Session {

    public function __construct(){
        session_start();
    }

    public function session_set($name, $value){
        $_SESSION[$name] = $value;
    }

    public function session_get($name){
        return $_SESSION[$name];
    }

    
    public function session_exit($name = null)
    {
        if(empty($name)){            
            session_unset();
            session_destroy();
        }
        else{
            unset($_SESSION[$name]);
        }
    }




    
}