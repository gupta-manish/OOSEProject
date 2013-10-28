<?php

class HotelEntity extends BaseEntity
{
    
    function __construct() 
    {
        parent::__construct();
    }
    
    public function searchHotelWithId($id)
    {
        $sth = $this->db->prepare("SELECT * FROM hotels
                     WHERE hotelId = :hotelId");
            $sth->execute(array(':hotelId'=>$id));
           // echo $sth->fetch()['hotelName'];
            return $sth;
    }
}

?>
