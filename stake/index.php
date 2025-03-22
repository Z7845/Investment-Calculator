<?php
    include("connection.php");
    include("login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stake-Data-Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login" id="login">
        <h1>Stake Login</h1>
        <form action="login.php" onsubmit="return isvalid()" method="post">
            <label>Username:</label>
            <input type="text" name="user" id="user"><br><br>
            <label>Password:</label>
            <input type="password" name="pass" id="pass"><br><br>
            <input type="submit" name="btn" id="btn" value="Login">
        </form>
    </div>
    <script>
        function isvalid(){
                var user = document.form.user.value;
                var pass = document.form.pass.value;
                if(user.length=="" && pass.length==""){
                    alert(" Username and password field is empty!!!");
                    return false;
                }
                else if(user.length==""){
                    alert(" Username field is empty!!!");
                    return false;
                }
                else if(pass.length==""){
                    alert(" Password field is empty!!!");
                    return false;
                }
                
            }
    </script>
</body>
</html>