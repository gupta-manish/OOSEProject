

<h2>Login</h2>

<form action ="<?php echo BASE_URL;?>login/validation" method ="post">
    <label>Username :</label><input type ="text" name ="loginId"><br>
    <label>Password :</label><input type="password" name="password"><br>
    <input type="submit" class="btn btn-primary" value ="Sign in">
                                   
</form>

<a href ="<?php echo BASE_URL;?>register">Register Here</a>
