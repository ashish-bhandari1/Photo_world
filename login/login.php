<!DOCTYPE html>
<html>
    <title>Login</title>
<head>
<link href="../fontawesome/css/all.css" rel="stylesheet"> 


    <link rel = "stylesheet" type ="text/css" href="../css/login.css">
</head>
<body>

    <div class = "form-wrapper">
        <form method = "post" action= "obj.php">
        <?php 
        session_start();
        if(!isset($_SESSION["customer"]) ) { 
            ?>
            <h1>sign in</h1>
            <div class = "input">
                <input name = "username" id = "username" required = "required" type = "text" placeholder = "Username">
                <input name = "password" id = "pw" required = "required" type = "password" placeholder = "Password">
                <button type = "submit" name="login" class = "login">Login </button>
                <div class="button-wrapper">
                <a href = "../" style = "margin-top:-4vh; font-size: 13px" >Back to Home</a>
                <a href = "register.php" style = " color: rgb(126, 81, 231);">Register now</a>
                </div>
            </div>
        <?php } 
        else{ ?>
            <h1>Account Setting <i  class="fas fa-user-cog"></i></h1>
            <div class = "input">
                <a href="javascript:login_popUP()"  class = "setting">Change password </a>
                <div class="account-wrapper">
                <a href = "logout.php" onclick="return confirm('Are you sure you want to Logout?');" >Logout</a>
                <a href = "../" >Back to Home</a>
                </div>
            </div>
            <?php }  ?>

        </form>
         <div class="change-wrapper" id="changepw_click">
        <form method = "post" class="password" action= "obj.php">
        <h1>Change Password <i onclick="login_popUP()" class="fas fa-window-close"></i></h1>   
        <div class = "input">
                <input name = "current_pw" id = "password" required = "required" type = "password" placeholder = "Current Password">
                <input name = "new_pw" id = "pw" required = "required" type = "password" placeholder = "New Password">
                <input name = "retype_new_pw"  required = "required" type = "password" placeholder = "Retype New Password">
                <button type = "submit" name="change_pw" class = "login">Change Password </button>
                <div class="button-wrapper">
                </div>
            </div>
        </form>
    </div>
    </div>

    <script src="../js/script.js"></script>

</body>

</html>