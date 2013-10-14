<?php

class RegisterInterface extends BaseInterface
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
        return $_POST['pass'];
    }
    
    public function getFirstName()
    {
        return $_POST['firstName'];
    }
    
    public function getLastName()
    {
        return $_POST['lastName'];
    }
    
    public function getHotelName()
    {
        return $_POST['hotelName'];
    }
    
    public function getHotelAddress()
    {
        return $_POST['hotelAddress'];
    }
    
    public function getEmail()
    {
        return $_POST['email'];
    }
    
    public function getTravelOperatorName()
    {
        return $_POST['travelOperatorName'];
    }
    
    public function getTravelOperatorAddress()
    {
        return $_POST['travelOperatorAddress'];
    }
}
?>
