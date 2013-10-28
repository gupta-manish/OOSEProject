<?php

class HotelController extends BaseController
{
    function __construct() 
    {
        parent::__construct('hotel');
    }

    public function getHotelNameWithId($id)
    {
        $h =  $this->entity->searchHotelWithId($id);
        $hotelName = $h->fetch()['hotelName'];
        //print_r ($h->fetch()); 
        return $hotelName;
        
    }
    
    public function getHotelEmailWithId($id)
    {
        $h =  $this->entity->searchHotelWithId($id);
        $hotelName = $h->fetch()['emailId'];
        //print_r ($h->fetch()); 
        return $hotelName;
        
    }
}
?>
