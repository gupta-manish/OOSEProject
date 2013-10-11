<?php

class Login extends BaseEntity
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
        $sth = $this->prepare("SELECT * 
                                FROM users
                                WHERE loginId = :loginId AND pass = :pass");
        
        $sth->execute(array(':username'=>$this->loginId,':pass'=>$this->encrypt($this->password)));
        
        $this->userData = $sth->fetch();
        
        if($sth->rowCount()==1)
        {
            return 1;
        }
        else 
        {
            return 0;
        }
    }
}
?>
