<?php

class LoginController extends BaseController
{
    function __construct()
    {
        parent::__construct("login");
    }
    
    public function acceptLoginId()
    {
        $this->entity->loginId = $this->interface->getLoginId();
    }
    
    public function acceptPassword()
    {
        $this->entity->password = $this->interface->getPassword();
    }
    
    public function validation()
    {
        $this->acceptLoginId();
        $this->acceptPassword();
        $validation = $this->entity->validate();
        if($validation == 1)
        {
            Session::start();
            Session::set(LOGGED_IN,TRUE);
            Session::set(USER_DATA,$this->entity->userData);
            header('Location:'.BASE_URL);
        }
        else
        {
            Session::destroy();
            header('Location:'.BASE_URL.'login');
        }
    }
}
?>