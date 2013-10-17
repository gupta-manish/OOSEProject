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
    var $userData;
    var $userLoginData;
    
    function __construct() 
    {
        parent::__construct();
    }
    
    public function registerTraveller()
    {
        $sth = $this->db->prepare("SELECT * 
                                    FROM users
                                    WHERE loginId = :loginId");
        
        $sth->execute(array(':loginId'=>$this->loginId));
        
        if($sth->rowCount()==1)
        {
            return 0;
        }
        else 
        {
            $sth = $this->db->prepare("INSERT INTO users
                     VALUES (:loginId,:emailId,:pass,'travellers')");
            $sth->execute(array(':loginId'=>$this->loginId,
                ':emailId'=>$this->email,
                 ':pass'=>$this->encrypt($this->password)));
            
            
            $sth = $this->db->prepare("INSERT INTO travellers
                     VALUES (:loginId,:firstName,:lastName)");
            $sth->execute(array(':loginId'=>$this->loginId,
                 ':firstName'=>$this->firstName,
                 ':lastName'=>$this->lastName));
            
            
            $sth = $this->db->prepare("SELECT * 
                                FROM users
                                WHERE loginId = :loginId AND password = :pass");
        
        $sth->execute(array(':loginId'=>$this->loginId,':pass'=>$this->encrypt($this->password)));
        $this->userLoginData = $sth->fetch();
            
            $sth2 = $this->db->prepare("SELECT * 
                                FROM travellers
                                WHERE loginId = :loginId");
            $sth2->execute(array(':loginId'=>$this->loginId));
            $this->userData = $sth2->fetch();
            return 1;
        }
    }
    
    public function registerHotel()
    {
        $sth = $this->db->prepare("SELECT * 
                                    FROM users
                                    WHERE loginId = :loginId");
        
        $sth->execute(array(':loginId'=>$this->loginId));
        
        if($sth->rowCount()==1)
        {
            return 0;
        }
        else 
        {
            $sth = $this->db->prepare("INSERT INTO users
                     VALUES (:loginId,:emailId,:pass,'hotels')");
            $sth->execute(array(':loginId'=>$this->loginId,
                ':emailId'=>$this->email,
                 ':pass'=>$this->encrypt($this->password)));
            
            
            $sth = $this->db->prepare("INSERT INTO hotels
                     VALUES (:loginId,:hotelName,:hotelAddress)");
            $sth->execute(array(':loginId'=>$this->loginId,
                 ':hotelName'=>$this->hotelName,
                 ':hotelAddress'=>$this->hotelAddress));
            
            
            $sth = $this->db->prepare("SELECT * 
                                FROM users
                                WHERE loginId = :loginId AND password = :pass");
        
        $sth->execute(array(':loginId'=>$this->loginId,':pass'=>$this->encrypt($this->password)));
        $this->userLoginData = $sth->fetch();
            
            $sth2 = $this->db->prepare("SELECT * 
                                FROM hotels
                                WHERE loginId = :loginId");
            $sth2->execute(array(':loginId'=>$this->loginId));
            $this->userData = $sth2->fetch();
            return 1;
        }
    }
    
    public function registerTravelOperator()
    {
         $sth = $this->db->prepare("SELECT * 
                                    FROM users
                                    WHERE loginId = :loginId");
        
        $sth->execute(array(':loginId'=>$this->loginId));
        
        if($sth->rowCount()==1)
        {
            return 0;
        }
        else 
        {
            $sth = $this->db->prepare("INSERT INTO users
                     VALUES (:loginId,:emailId,:pass,'travelOperators')");
            $sth->execute(array(':loginId'=>$this->loginId,
                ':emailId'=>$this->email,
                 ':pass'=>$this->encrypt($this->password)));
            
            
            $sth = $this->db->prepare("INSERT INTO travelOperators
                     VALUES (:loginId,:travelOperatorName,:travelOperatorAddress)");
            $sth->execute(array(':loginId'=>$this->loginId,
                 ':travelOperatorName'=>$this->travelOperatorName,
                 ':travelOperatorAddress'=>$this->travelOperatorAddress));
            
            
            $sth = $this->db->prepare("SELECT * 
                                FROM users
                                WHERE loginId = :loginId AND password = :pass");
        
        $sth->execute(array(':loginId'=>$this->loginId,':pass'=>$this->encrypt($this->password)));
        $this->userLoginData = $sth->fetch();
            
            $sth2 = $this->db->prepare("SELECT * 
                                FROM travelOperators
                                WHERE loginId = :loginId");
            $sth2->execute(array(':loginId'=>$this->loginId));
            $this->userData = $sth2->fetch();
            return 1;
        }
    }
    
}
?>
