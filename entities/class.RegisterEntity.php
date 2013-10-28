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
                                    FROM travellers
                                    WHERE travellerId = :loginId");
        
        $sth2 = $this->db->prepare("SELECT * 
                                    FROM hotels
                                    WHERE hotelId = :loginId");
        
        $sth3 = $this->db->prepare("SELECT * 
                                    FROM traveloperators
                                    WHERE travelOpId = :loginId");
        $sth->execute(array(':loginId'=>$this->loginId));
        $sth2->execute(array(':loginId'=>$this->loginId));
        $sth3->execute(array(':loginId'=>$this->loginId));
        
        if($sth->rowCount()==1 || $sth2->rowCount()==1 || $sth3->rowCount()==1)
        {
            return 0;
        }
        else 
        {
            $sth = $this->db->prepare("INSERT INTO travellers
                     VALUES (:loginId,:pass,:emailId,:firstName,:lastName,:userType)");
            $sth->execute(array(':loginId'=>$this->loginId,
                ':pass'=>$this->encrypt($this->password),
                ':emailId'=>$this->email,
                 ':firstName'=>$this->firstName,
                 ':lastName'=>$this->lastName,
                ':userType'=>'traveller'));
            
            
            $sth = $this->db->prepare("SELECT * 
                                FROM travellers
                                WHERE travellerId = :loginId AND password = :pass");
        
            $sth->execute(array(':loginId'=>$this->loginId,':pass'=>$this->encrypt($this->password)));
            
            
            $this->userData = $sth->fetch();
            return 1;
        }
    }
    
    public function registerHotel()
    {
        $sth = $this->db->prepare("SELECT * 
                                    FROM travellers
                                    WHERE travellerId = :loginId");
        
        $sth2 = $this->db->prepare("SELECT * 
                                    FROM hotels
                                    WHERE hotelId = :loginId");
        
        $sth3 = $this->db->prepare("SELECT * 
                                    FROM traveloperators
                                    WHERE travelOpId = :loginId");
        $sth->execute(array(':loginId'=>$this->loginId));
        $sth2->execute(array(':loginId'=>$this->loginId));
        $sth3->execute(array(':loginId'=>$this->loginId));
        
        if($sth->rowCount()==1 || $sth2->rowCount()==1 || $sth3->rowCount()==1)
        {
            return 0;
        }
        else 
        {
            $sth = $this->db->prepare("INSERT INTO hotels
                     VALUES (:loginId,:pass,:emailId,:hotelName,:hotelAddress,:userType)");
            $sth->execute(array(':loginId'=>$this->loginId,
                ':pass'=>$this->encrypt($this->password),
                ':emailId'=>$this->email,
                 ':hotelName'=>$this->hotelName,
                 ':hotelAddress'=>$this->hotelAddress,
                ':userType'=>'hotel'));
            
            
            $sth = $this->db->prepare("SELECT * 
                                FROM hotels
                                WHERE hotelId = :loginId AND password = :pass");
        
            $sth->execute(array(':loginId'=>$this->loginId,':pass'=>$this->encrypt($this->password)));
            
            
            $this->userData = $sth->fetch();
            return 1;
        }
    }
    
    public function registerTravelOperator()
    {
        $sth = $this->db->prepare("SELECT * 
                                    FROM travellers
                                    WHERE travellerId = :loginId");
        
        $sth2 = $this->db->prepare("SELECT * 
                                    FROM hotels
                                    WHERE hotelId = :loginId");
        
        $sth3 = $this->db->prepare("SELECT * 
                                    FROM traveloperators
                                    WHERE travelOpId = :loginId");
        $sth->execute(array(':loginId'=>$this->loginId));
        $sth2->execute(array(':loginId'=>$this->loginId));
        $sth3->execute(array(':loginId'=>$this->loginId));
        
        if($sth->rowCount()==1 || $sth2->rowCount()==1 || $sth3->rowCount()==1)
        {
            return 0;
        }
        else 
        {
            $sth = $this->db->prepare("INSERT INTO traveloperators
                     VALUES (:loginId,:pass,:emailId,:travelOpName,:travelOpAddress,:userType)");
            $sth->execute(array(':loginId'=>$this->loginId,
                ':pass'=>$this->encrypt($this->password),
                ':emailId'=>$this->email,
                 ':travelOpName'=>$this->travelOperatorName,
                 ':travelOpAddress'=>$this->travelOperatorAddress,
                ':userType'=>'travelOperator'));
            
            
            $sth = $this->db->prepare("SELECT * 
                                FROM traveloperators
                                WHERE travelOpId = :loginId AND password = :pass");
        
            $sth->execute(array(':loginId'=>$this->loginId,':pass'=>$this->encrypt($this->password)));
            
            
            $this->userData = $sth->fetch();
            return 1;
        }
    }
    
}
?>
