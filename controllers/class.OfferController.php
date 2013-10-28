<?php

class OfferController extends BaseController
{
    function __construct() 
    {
        parent::__construct("offer");
        $this->loadCreateOfferInterface();
    }
    
    function loadSearchOfferInterface()
    {
        $filename = 'interface/class.'.ucfirst($this->pageName).'Interface.php';
        if(file_exists($filename))
        {
            require_once $filename;
            $interfacename = ucfirst($this->pageName).'Interface';
            
            $this->interface = new $interfacename();
            //$this->interface->render($this->pageName);
        }
    }
    
    function loadCreateOfferInterface()
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
    
    public function searchAllOffers()
    {
        $this->loadSearchOfferInterface();
        $offers = $this->entity->getAllOffers();
        require_once '/class.HotelController.php';
        $hotels = new HotelController();
        require_once '/class.TravelOperatorController.php';
        $top = new TravelOperatorController();
        Session::set(OFFERS, $offers);
        Session::set(HOTELS, $hotels);
        Session::set(TOPS, $top);
    }
    
    
    
}
?>
