<?php

class BaseEntity 
{
    function __construct()
    {
        $this->db = new Database();
    }
    
     protected function encrypt($str)
    {
        /* 
         * change this function for
         * better encryption
         */ 
        
        return md5($str);
    }
}
?>
