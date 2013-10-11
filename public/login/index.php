

<h2>Login</h2>

<form action ="<?php echo BASE_URL;?>login/getValidation" method ="post">
    <label>Username :</label><input type ="text" name ="username"><br>
    <label>Password :</label><input type="password" name="pass"><br>
    <input type="submit" class="btn btn-primary" value ="Sign in">
                                   
</form>

<a href ="<?php echo BASE_URL;?>register">Register Here</a>
