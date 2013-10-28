<?php

class DashboardInterface extends BaseInterface
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function render($name)
    {
        require_once '/public/header.php';
        require_once '/public/'.$name.'.php';
        if(getUserType()==='traveller' || getUserType()==='hotel')
        {
            require_once '/public/offers/index.php';
        }
        require_once '/public/footer.php';
    }
}
?>
