<?php

class UserInterface extends BaseInterface
{
    function __construct() {
        parent::__construct();
        Session::start();
        $session = Session::get(LOGGED_IN);
        if($session == FALSE)
        {
            Session::destroy();
            header('Location:'.BASE_URL.'login');
            exit;
        }
    }
    
    public function getLoginId()
    {
        if(Session::get(LOGGED_IN) == TRUE)
            return Session::get(USER_LOGIN_DATA)['loginId'];    
    }
    
    public function getEmailId()
    {
        if(Session::get(LOGGED_IN) == TRUE)
            return Session::get(USER_LOGIN_DATA)['emailId'];    
    }
    
    public function getName()
    {
        if(Session::get(LOGGED_IN) == TRUE)
        {
            //echo Session::get(USER_LOGIN_DATA)['userTable'];
            $userType = $this->getUserType();
            if($userType === 'travellers')
            {
                return (Session::get(USER_DATA)['firstName']." ".Session::get(USER_DATA)['lastName']);
            }
            else if($userType === 'hotels')
            {
                return Session::get(USER_DATA)['hotelName'];
            }
            else if($userType === 'travelOperators')
            {
                return Session::get(USER_DATA)['travelOperatorName'];
            }       
        }
    }
    
    public function getUserType()
    {
        if(Session::get(LOGGED_IN) == TRUE)
        return Session::get(USER_LOGIN_DATA)['userTable'];
    }
    
}
?>
