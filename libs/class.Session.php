<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Session {

    public static function get($key){
        if(isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        }
        else
        {
            return FALSE;
        }
    }
    
    public static function set($key,$value)
    {
        $_SESSION[$key] = $value;
    }
    
    public static function start()
    {
        if(session_status() != PHP_SESSION_ACTIVE)
        session_start();
    }
    
    public static function destroy()
    {
        session_destroy();
    }
    
    public static function isAlreadySet($key)
    {
        return isset($_SESSION[$key]);
    }
}

?>
