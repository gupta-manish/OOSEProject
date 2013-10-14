
<h2>Register</h2>
<ul id="myTabs" class="nav nav-tabs">
    <li class="active"><a href="#travellers" data-toggle="tab">Travellers</a>
    </li>
    <li><a href="#hotels" data-toggle="tab">Hotels</a>
    </li>
    <li><a href="#travelOperators" data-toggle="tab">Travel Operators</a>
    </li>
</ul>
<div id="myTabContent" class="tab-content">
<div class="tab-pane fade active in" id="travellers">
    <form action="<?php echo BASE_URL;?>register/travellerRegistrationValidation" method="post">
        <label>Login Id :</label>
        <input type="text" name="loginId" required>
        <br>
        <label>Email Id :</label>
        <input type="text" name="email" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="pass" id="pass1" class="password" required>
        <br>
        <label class="control-label" for="pass2">Confirm&nbsp;Password</label>
        <input type="password" name="pass2" id="pass4" required class="password" oninput="check1(this)">
        <br>
        <label>First Name :</label>
        <input type="text" name="firstName" required>
        <br>
        <label>Last Name :</label>
        <input type="text" name="lastName" required>
        <br>
        <button type="submit" class="btn btn-primary btn-large">Sign up</button>

    </form>
</div>
<div class="tab-pane fade" id="hotels">
    <form action="<?php echo BASE_URL;?>register/hotelRegistrationValidation" method="post">
        <label>Login Id :</label>
        <input type="text" name="loginId" required>
        <br>
        <label>Email Id :</label>
        <input type="text" name="email" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="pass" id="pass2" class="password" required>
        <br>
        <label class="control-label" for="pass2">Confirm&nbsp;Password</label>
        <input type="password" name="pass2" id="pass5" required class="password" oninput="check2(this)">
        <br>
        <label>Hotel Name :</label>
        <input type="text" name="hotelName" required>
        <br>
        <label>Hotel Address :</label>
        <input type="text" name="hotelAddress" required>
        <br>
        <button type="submit" class="btn btn-primary btn-large">Sign up</button>

    </form>
</div>
<div class="tab-pane fade" id="travelOperators">
    <form action="<?php echo BASE_URL;?>register/travellerOperatorRegistrationValidation" method="post">
        <label>Login Id :</label>
        <input type="text" name="loginId" required>
        <br>
        <label>Email Id :</label>
        <input type="text" name="email" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="pass" id="pass"3 class="password" required>
        <br>
        <label class="control-label" for="pass2">Confirm&nbsp;Password</label>
        <input type="password" name="pass2" id="pass6" required class="password" oninput="check3(this)">
        <br>
        <label>Travel Operator Name :</label>
        <input type="text" name="travelOperatorName" required>
        <br>
        <label>Travel Operator Address :</label>
        <input type="text" name="travelOperatorAddress" required>
        <br>
        <button type="submit" class="btn btn-primary btn-large">Sign up</button>

    </form>
</div>
</div>

</div>

<script>
    function check1(input) {
        if (input.value != document.getElementById('pass1').value) {
            input.setCustomValidity('The two passwords must match.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>
<script>
    function check2(input) {
        if (input.value != document.getElementById('pass2').value) {
            input.setCustomValidity('The two passwords must match.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>
<script>
    function check3(input) {
        if (input.value != document.getElementById('pass3').value) {
            input.setCustomValidity('The two passwords must match.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>

