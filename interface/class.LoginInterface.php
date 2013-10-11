<?php

class LoginInterface extends BaseInterface
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function getLoginId()
    {
        return $_POST['loginId'];
    }
    
    public function getPassword()
    {
        return $_POST['password'];
    }
}

?>
