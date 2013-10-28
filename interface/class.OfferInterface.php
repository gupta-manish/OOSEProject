<?php

class OfferInterface extends BaseInterface
{
    function __construct() 
    {
        parent::__construct();
    }
    
    public function render($name)
    {
        require_once '/public/header.php';
        require_once '/public/'.$name.'s/offers.php';
        require_once '/public/footer.php';
    }
}
?>
