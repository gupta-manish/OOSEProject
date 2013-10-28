<?php

class LoginEntity extends BaseEntity
{
    var $loginId;
    var $password;
    var $userData;
    
    function __construct() 
    {
        parent::__construct();
    }
    
    public function validate()
    {
        $sth = $this->db->prepare("SELECT * 
                                    FROM travellers
                                    WHERE travellerId = :loginId AND password = :pass");
        
        $sth2 = $this->db->prepare("SELECT * 
                                    FROM hotels
                                    WHERE hotelId = :loginId AND password = :pass");
        
        $sth3 = $this->db->prepare("SELECT * 
                                    FROM traveloperators
                                    WHERE travelOpId = :loginId AND password = :pass");
        $sth->execute(array(':loginId'=>$this->loginId,':pass'=>$this->encrypt($this->password)));
        $sth2->execute(array(':loginId'=>$this->loginId,':pass'=>$this->encrypt($this->password)));
        $sth3->execute(array(':loginId'=>$this->loginId,':pass'=>$this->encrypt($this->password)));
        //echo "wv;wjegvwgv";
        //$this->userData = $sth->fetch();
        
        if($sth->rowCount()==1)
        {
            $this->userData = $sth->fetch();
            return 1;
        }
        else if($sth2->rowCount()==1)
        {
            $this->userData = $sth2->fetch();
            return 1;
        }
        else if($sth3->rowCount()==1)
        {
            $this->userData = $sth3->fetch();
            return 1;
        }
        else 
        {
            return 0;
        }
    }
}
?>
