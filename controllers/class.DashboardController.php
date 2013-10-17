<?php

class DashboardController extends BaseController
{
    function __construct() 
    {
        parent::__construct("dashboard");
    }
    
    function getTravellersDashboard()
    {
       // echo "veevevev";
        $this->pageName = 'dashboard/traveller';
        $this->loadEntity();
        $this->loadInterface();
    }
    
    function getHotelsDashboard()
    {
        $this->pageName = 'dashboard/hotel';
        $this->loadEntity();
        $this->loadInterface();
    }
    
    function getTravelOperatorsDashboard()
    {
        $this->pageName = 'dashboard/travelOperator';
        $this->loadEntity();
        $this->loadInterface();
    }
}
?>
