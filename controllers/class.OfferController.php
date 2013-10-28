<?php

class OfferController extends BaseController
{
    function __construct() 
    {
        parent::__construct("offer");
        $this->loadInterface();
    }
    
    function loadInterface()
    {
        $filename = 'interface/class.Create'.ucfirst($this->pageName).'Interface.php';
        if(file_exists($filename))
        {
            require_once $filename;
            $interfacename = 'Create'.ucfirst($this->pageName).'Interface';
            
            $this->interface = new $interfacename();
            //$this->interface->render($this->pageName);
        }
    }
    
    public function acceptHotelId()
    {
        $this->entity->hotelId = getUserLoginId();
    }
    
    public function acceptTravelOperatorId()
    {
        $this->entity->travelOpId = getUserLoginId();
    }
    
    public function acceptOfferDesc()
    {
        $this->entity->offerDesc = $this->interface->getOfferDesc();
    }
    public function acceptOfferName()
    {
        $this->entity->offerName = $this->interface->getOfferName();
    }
    public function acceptOfferCost()
    {
        $this->entity->offerCost = $this->interface->getOfferCost();
    }
    public function getOfferCreationValidation()
    {
        if(getUserType()==="hotel")
        {
            $this->acceptHotelId();
        }
        else if(getUserType()==="travelOperator")
        {
            $this->acceptTravelOperatorId();
        }
        $this->acceptOfferCost();
        $this->acceptOfferDesc();
        $this->acceptOfferName();
        $validate = $this->entity->createOffer();
        if($validate==1)
        {
            header('Location:'.BASE_URL);
        }
        else
        {
            header('Location:'.BASE_URL.'error');
        }
    }
    
    public function getSearchWithIdResult()
    {
        $offers = $this->entity->searchOffersWithId();
        Session::set(OFFERS, $offers);        
    }
    
  
    
    
    
}
?>
