<?php

class RegisterEntity extends BaseEntity
{
    var $email;
    var $loginId;
    var $password;
    var $firstName;
    var $lastName;
    var $hotelName;
    var $hotelAddress;
    var $travelOperatorName;
    var $travelOperatorAddress;
    
    function __construct() 
    {
        parent::__construct();
    }
    
    
}
?>
