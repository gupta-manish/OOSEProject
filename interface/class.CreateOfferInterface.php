<?php

class CreateOfferInterface extends BaseInterface
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function getOfferName()
    {
        return $_POST['offerName'];
    }
    
    public function getOfferDesc()
    {
        return $_POST['offerDesc'];
    }
    
    public function getOfferCost()
    {
        return $_POST['offerCost'];
    }
    
    public function render($name)
    {
        require_once '/public/header.php';
        require_once '/public/create'.$name.'/index.php';
        require_once '/public/footer.php';
    }
};
?>
