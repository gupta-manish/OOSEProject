

<ul id="myTabs" class="nav nav-tabs">
    <li class="active"><a href="#hotels" data-toggle="tab">Offers From Hotel</a>
    </li>
    <li><a href="#travelOperators" data-toggle="tab">Offers From Travel Operators</a>
    </li>
</ul>
<div id="myTabContent" class="tab-content">

<div class="tab-pane active" id="hotels">
    <?php
$h = Session::get(HOTELS);
while($o = Session::get(OFFERS)['hotelOffers']->fetch(PDO::FETCH_ASSOC)):?>
<div class="hero-unit">
<h4>Offer Name:<?php echo $o['offerName'];?> </h4>
  Description:<?php echo $o['offerDesc'];?> <br>
    Cost: Rs. <?php echo $o['offerCost'];?> <br>
    Hotel Name: <?php echo ($h->getHotelNameWithId($o['hotelId']));?> <br>
    <a href ="<?php  echo BASE_URL.'purchase/purchaseHotelOffer/'.$o['offerId']?>"><button class="btn-primary" >Purchase</button></a>
    <a href ="mailto:<?php echo $h->getHotelEmailWithId($o['hotelId'])?>"><button class="btn-primary" >Contact Hotel</button></a>
    </div>
<?php endwhile; ?>
</div>
<div class="tab-pane fade" id="travelOperators">
    <?php
$t = Session::get(TOPS);
while($o = Session::get(OFFERS)['travelOffers']->fetch(PDO::FETCH_ASSOC)):?>
<div class="hero-unit">
<h4>Offer Name:<?php echo $o['offerName'];?> </h4>
  Description:<?php echo $o['offerDesc'];?> <br>
    Cost: Rs. <?php echo $o['offerCost'];?> <br>
    Travel Operator Name: <?php echo ($t->getTravelOperatorNameWithId($o['travelOpId']));?> <br>
    <a href ="<?php  echo BASE_URL.'purchase/purchaseTravelOffer/'.$o['offerId']?>"><button class="btn-primary" >Purchase</button></a>
    <a href ="mailto:<?php echo $t->getTravelOperatorEmailWithId($o['travelOpId'])?>"><button class="btn-primary" >Contact Travel Operator</button></a>
    </div>
<?php endwhile; ?>
</div>
</div>

</div>