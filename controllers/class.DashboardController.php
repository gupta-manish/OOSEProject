<?php

class DashboardController extends BaseController
{
    function __construct() 
    {
        parent::__construct("dashboard");
    }
    
    function getTravellerDashboard()
    {
       // echo "veevevev";
        $this->pageName = 'dashboard/traveller';
        $this->loadEntity();
        $this->loadInterface();
    }
    
    function getHotelDashboard()
    {
        $this->pageName = 'dashboard/hotel';
        $this->loadEntity();
        $this->loadInterface();
        require_once '/class.OfferController.php';
        $offer = new OfferController;
        $offer->getSearchWithIdResult();
    }
    
    function getTravelOperatorDashboard()
    {
        $this->pageName = 'dashboard/travelOperator';
        $this->loadEntity();
        $this->loadInterface();
        require_once '/class.OfferController.php';
        $offer = new OfferController;
        $offer->getSearchWithIdResult();
    }
}
?>
