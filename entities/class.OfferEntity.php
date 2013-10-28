<?php

class OfferEntity extends BaseEntity
{
    var $hotelId;
    var $travelOpId;
    var $offerName;
    var $offerDesc;
    var $offerCost;
    
    function __construct() 
    {
        parent::__construct();
    }
    
    public function createOffer()
    {
        if(getUserType()==="hotel")
        {
            //echo $this->offerDesc;
           $sth = $this->db->prepare("INSERT INTO hoteloffers 
                     VALUES ('',:offerName,:offerDesc,:offerCost,:hotelId)");
            $sth->execute(array(':offerName'=>$this->offerName,
                ':offerDesc'=>$this->offerDesc,
                 ':offerCost'=>$this->offerCost,
                 ':hotelId'=>$this->hotelId));
        }
        else if(getUserType()==="travelOperator")
        {
            $sth = $this->db->prepare("INSERT INTO traveloffers 
                     VALUES ('',:offerName,:offerDesc,:offerCost,:travelOpId)");
            $sth->execute(array(
                ':offerName'=>$this->offerName,
                ':offerDesc'=>$this->offerDesc,
                 ':offerCost'=>$this->offerCost,
                 ':travelOpId'=>$this->travelOpId));
        }
        return 1;
    }
    
    public function searchOffersWithId()
    {
        if(getUserType()==="hotel")
        {
           // echo $this->offerDesc;
           $sth = $this->db->prepare("SELECT * FROM hoteloffers 
                     WHERE hotelId = :hotelId");
            $sth->execute(array(':hotelId'=>getUserLoginId()));
             
            return $sth;
        }
        else if(getUserType()==="travelOperator")
        {
           // echo $this->offerDesc;
           $sth = $this->db->prepare("SELECT * FROM traveloffers 
                     WHERE travelOpId = :travelOpId");
            $sth->execute(array(':travelOpId'=>getUserLoginId()));
            $offers = $sth;
            return $offers;
        }
    }
    
    public function getAllOffers()
    {
        $sth1 = $this->db->prepare("SELECT * FROM hoteloffers");
            $sth1->execute(array());
           $sth2 = $this->db->prepare("SELECT * FROM traveloffers");
            $sth2->execute(array());  
            return array('hotelOffers'=>$sth1,'travelOffers'=>$sth2);
    }
}
?>
