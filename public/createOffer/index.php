<?php if(Session::get(LOGGED_IN) == TRUE): ?>
     <h2>Create Offer</h2>                 
<form action ="<?php echo BASE_URL;?>offer/getOfferCreationValidation" method ="post">
    <label>Offer Name :</label><input type ="text" name ="offerName"><br>
    <label>Offer Description :</label><input type="text" name="offerDesc"><br>
    <label>Offer Cost :</label><input type="text" name="offerCost"><br>
    <input type="submit" class="btn btn-primary" value ="Create">
                                   
</form>

<?php endif; ?>

