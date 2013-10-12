<?php

class RegisterController extends BaseController
{
    function __construct()
    {
        //echo "kbjvirbvrhvj";
        parent::__construct("register");
    }
    
    public function acceptLoginId()
    {
        $this->entity->loginId = $this->interface->getLoginId();
    }
    
    public function acceptPassword()
    {
        $this->entity->password = $this->interface->getPassword();
    }
    
    public function acceptFirstName()
    {
        $this->entity->password = $this->interface->getPassword();
    }
    
    public function acceptLastName()
    {
        $this->entity->password = $this->interface->getPassword();
    }
    
    public function acceptHotelName()
    {
        
    }
    
    public function accept()
    {
        
    }
    
    
}
?>
