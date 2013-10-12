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
        $sth = $this->prepare("SELECT * 
                                FROM users
                                WHERE loginId = :loginId AND pass = :pass");
        
        $sth->execute(array(':username'=>$this->loginId,':pass'=>$this->encrypt($this->password)));
        
        //$this->userData = $sth->fetch();
        
        if($sth->rowCount()==1)
        {
            $this->userLoginData = $sth->fetch();
            $sth2 = $this->prepare("SELECT * 
                                FROM :table
                                WHERE loginId = :loginId");
            $sth2->execute(array(':table'=>$this->userLoginData['uesrTable'],':loginId'=>$this->loginId));
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
