<?php
require('MyRegister.php');
require('validateLogin.php');
?>
<div id="id01" class="login">
  
    <form class="login-content animate" method="post">
    
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Login">&times;</span>
        </div>

        <div class="log-container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username or email" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
                
            <button type="submit" name="CheckLogin" >Login</button>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
            <span class="reg">Register here <a href="#" onclick="document.getElementById('id02').style.display='block'; document.getElementById('id01').style.display='none'">register?</a></span>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</div>

<script>
// Get the login
var login = document.getElementById('id01');

// When the user clicks anywhere outside of the login, close it
window.onclick = function(event) {
    if (event.target == login) {
        login.style.display = "none";
    }
}
</script>

