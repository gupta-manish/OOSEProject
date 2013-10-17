<?php

class DashboardInterface extends BaseInterface
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function render($name)
    {
        require '/public/header.php';
        require '/public/'.$name.'.php';
        require '/public/footer.php';
    }
}
?>
