<?php

class TravelOperatorEntity extends BaseEntity
{
    
    function __construct() 
    {
        parent::__construct();
    }
    
    public function searchTravelOperatorWithId($id)
    {
        $sth = $this->db->prepare("SELECT * FROM traveloperators
                     WHERE travelOpId = :travelOpId");
            $sth->execute(array(':travelOpId'=>$id));
           // echo $sth->fetch()['hotelName'];
            return $sth;
    }
}

?>
