<!DOCTYPE html>
<html>
    <title>Login</title>
<head>
<link href="../fontawesome/css/all.css" rel="stylesheet"> 


    <link rel = "stylesheet" type ="text/css" href="../css/login.css">
</head>
<body>

    <div class = "form-wrapper">
        <form method = "post" action= "php/obj.php">
            <h1>Secure Login</h1>
            <div class = "input">
                <input name = "username" id = "username" required = "required" type = "text" placeholder = "Username">
                <input name = "password" id = "pw" required = "required" type = "password" placeholder = "Password">
                <label>Login in As</label>
                <select name="role">
                <option>Admin</option>
                <option>Photographer</option>                    
                </select>
                <button type = "submit" name="admin" class = "login">Login </button>
                <a href = "#" style = "margin-top:-4vh; font-size: 13px" >Forget password?</a>
                <a href = "../" style = "font-size: 13px; color=green;" >Go Home</a>
               
            </div>
         
        </form>
    </div>
    <script src="../js/script.js"></script>

</body>

</html>