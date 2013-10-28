<?php

class BaseInterface 
{
    function __construct() 
    {
    }
    
    public function render($name)
    {
        require_once '/public/header.php';
        require_once '/public/'.$name.'/index.php';
        require_once '/public/footer.php';
    }
}
?>
