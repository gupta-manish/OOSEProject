<?php

class TravelOperatorController extends BaseController
{
    function __construct() 
    {
        parent::__construct('travelOperator');
    }

    public function getTravelOperatorNameWithId($id)
    {
        $h =  $this->entity->searchTravelOperatorWithId($id);
        $hotelName = $h->fetch()['travelOperatorName'];
        //print_r ($h->fetch()); 
        return $hotelName;
        
    }
    
    public function getTravelOperatorEmailWithId($id)
    {
        $h =  $this->entity->searchTravelOperatorWithId($id);
        $hotelName = $h->fetch()['emailId'];
        //print_r ($h->fetch()); 
        return $hotelName;
        
    }
}
?>
