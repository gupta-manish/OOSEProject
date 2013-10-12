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
        $this->entity->firstName = $this->interface->getFirstName();
    }
    
    public function acceptLastName()
    {
        $this->entity->lastName = $this->interface->getLastName();
    }
    
    public function acceptHotelName()
    {
        $this->entity->hotelName = $this->interface->gethotelName();
    }
    
    public function acceptHotelAddress()
    {
        $this->entity->hotelAddress = $this->interface->getHotelAddress();
    }
    
    public function acceptEmailAddress()
    {
        $this->entity->email = $this->interface->getEmail();
    }
    
    public function acceptTravelOperatorName()
    {
        $this->entity->travelOperatorName = $this->interface->getTravelOperatorName();
    }
    
    public function acceptTravelOperatorAddress()
    {
        $this->entity->travelOperatorAddress = $this->interface->getTravelOperatorAddress();
    }
    
    public function register()
    {
        $this->acceptEmailAddress();
        $this->acceptLoginId();
        $this->acceptPassword();
    }
    
    public function travellerRegisterValidation()
    {
        $this->register();
        $this->acceptFirstName();
        $this->acceptLastName();
        $registration = $this->entity->registerTraveller();
        
    }
    
    public function hotelRegistrationValidation()
    {
        $this->register();
        $this->acceptHotelName();
        $this->acceptHotelAddress();
        $registration = $this->entity->registerHotel();
    }
    
    public function travelOperatorRegisterValidation()
    {
        $this->register();
        $this->acceptTravelOperatorName();
        $this->acceptTravelOperatorAddress();
        $registration = $this->entity->registeTravelOperator();
    }
}
?>
