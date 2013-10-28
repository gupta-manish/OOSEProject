<?php while($o = Session::get(OFFERS)->fetch(PDO::FETCH_ASSOC)):?>
<div class="hero-unit">
<h4>Offer Name:<?php echo $o['offerName'];?> </h4>
  Description:<?php echo $o['offerDesc'];?> <br>
    Cost: Rs. <?php echo $o['offerCost'];?> <br>
    <a href='<?php echo BASE_URL."offer/edit/".($o['offerId']);?>'<button class="btn">Edit</button></a>
    <a href='<?php echo BASE_URL."offer/delete/".($o['offerId']);?>'<button class="btn">Delete</button></a>
    </div>
<?php endwhile; ?>

