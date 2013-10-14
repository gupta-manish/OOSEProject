<?php

class LoginEntity extends BaseEntity
{
    var $loginId;
    var $password;
    var $userData;
    var $userLoginData;
    
    function __construct() 
    {
        parent::__construct();
    }
    
    public function validate()
    {
        $sth = $this->db->prepare("SELECT * 
                                FROM users
                                WHERE loginId = :loginId AND password = :pass");
        
        $sth->execute(array(':loginId'=>$this->loginId,':pass'=>$this->encrypt($this->password)));
        //echo "wv;wjegvwgv";
        //$this->userData = $sth->fetch();
        
        if($sth->rowCount()==1)
        {
            $this->userLoginData = $sth->fetch();
            $sth2 = $this->db->prepare("SELECT * 
                                FROM ".$this->userLoginData['userTable']."
                                WHERE loginId = :loginId");
            $sth2->execute(array(':loginId'=>$this->loginId));
            $this->userData = $sth2->fetch();
            return 1;
        }
        else 
        {
            return 0;
        }
    }
}
?>
