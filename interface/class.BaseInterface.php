<?php

class BaseInterface 
{
    function __construct() 
    {
    }
    
    public function render($name)
    {
        require '/public/header.php';
        require '/public/'.$name.'/index.php';
        require '/public/footer.php';
    }
}
?>