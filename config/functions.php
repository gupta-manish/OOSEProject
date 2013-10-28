<?php
Session::start();
    function getUserLoginId()
    {
        if(Session::get(LOGGED_IN) == TRUE)
        {   $userType = getUserType();
            //echo Session::get(USER_DATA)['hotelId'];
            if($userType === 'traveller')
            {
                return Session::get(USER_DATA)['travellerId'];
            }
            else if($userType === 'hotel')
            {
               // echo Session::get(USER_DATA)['hotelId'];
                return Session::get(USER_DATA)['hotelId'];
            }
            else if($userType === 'travelOperator')
            {
                return Session::get(USER_DATA)['travelOpId'];
            }    
        }
    }
    
    function getUserEmailId()
    {
        if(Session::get(LOGGED_IN) == TRUE)
            return Session::get(USER_DATA)['emailId'];    
    }
    
    function getUserName()
    {
        if(Session::get(LOGGED_IN) == TRUE)
        {
            //echo Session::get(USER_LOGIN_DATA)['userTable'];
            $userType = getUserType();
            if($userType === 'traveller')
            {
                return (Session::get(USER_DATA)['firstName']." ".Session::get(USER_DATA)['lastName']);
            }
            else if($userType === 'hotel')
            {
                return Session::get(USER_DATA)['hotelName'];
            }
            else if($userType === 'travelOperator')
            {
                return Session::get(USER_DATA)['travelOperatorName'];
            }       
        }
    }
    
    function getUserType()
    {
        if(Session::get(LOGGED_IN) == TRUE)
        return Session::get(USER_DATA)['userType'];
    }
?>
