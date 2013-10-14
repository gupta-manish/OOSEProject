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
    
    public function acceptEmail()
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
        $this->acceptEmail();
        $this->acceptLoginId();
        $this->acceptPassword();
    }
    
    public function travellerRegistrationValidation()
    {
        echo "vijeoivje";
        $this->register();
        $this->acceptFirstName();
        $this->acceptLastName();
        $registration = $this->entity->registerTraveller();
        $this->completeRegistration($registration);
    }
    
    public function hotelRegistrationValidation()
    {
        $this->register();
        $this->acceptHotelName();
        $this->acceptHotelAddress();
        $registration = $this->entity->registerHotel();
        $this->completeRegistration($registration);
    }
    
    public function travelOperatorRegistrationValidation()
    {
       // echo "wlevhoweveovhine";
        $this->register();
        $this->acceptTravelOperatorName();
        $this->acceptTravelOperatorAddress();
        $registration = $this->entity->registeTravelOperator();
        $this->completeRegistration($registration);
    }
    
    private function completeRegistration($registration)
    {
        if($registration == 1)
        {
            Session::start();
            Session::set(LOGGED_IN,TRUE);
            Session::set(USER_LOGIN_DATA,$this->entity->userLoginData);
            Session::set(USER_DATA,$this->entity->userData);
            header('Location:'.BASE_URL);
        }
        else
        {
           
            Session::destroy();
            header('Location:'.BASE_URL.'error');
          // echo "wvgrvrgr";
            
        }
    }
}
?>
