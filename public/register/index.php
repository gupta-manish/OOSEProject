

<h2>Register</h2>

<form action ="<?php echo BASE_URL;?>register/enter" method ="post">
    <label>Username :</label><input type ="text" name ="username" required><br>
    <label  for="password">Password</label>
    <input type="password" name="pass" id="pass" class="password" required >
<br>
   <label class="control-label" for="pass2">Confirm&nbsp;Password</label>                    
    <input type="password" name="pass2" id="pass2" required 
    class="password" oninput="check(this)">
                            <br>
    <label>First Name :</label><input type ="text" name ="firstName" required><br>
    <label>Last Name :</label><input type ="text" name ="lastName" required><br>
    <button type="submit" class="btn btn-primary btn-large">Sign up</button>
                                   
</form>

<script>
function check(input) {
  if (input.value != document.getElementById('pass').value) {
    input.setCustomValidity('The two passwords must match.');
  } else {
    // input is valid -- reset the error message
    input.setCustomValidity('');
  }
}
</script>


