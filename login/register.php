<!DOCTYPE html>
<html>
    <title>Registration</title>
<head>

    <!-- local links -->
    <link href="../fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->

    <link rel = "stylesheet" type ="text/css" href="../css/register.css">
</head>
<body>
    <div class = "form-wrapper">
        <form method = "post" action= "obj.php">
        <h1>Register Here</h1>
            <div class = "row">
                <div class = "input">
                <i class="fas fa-user"></i><input name = "Fname" id = "firstName" required = "required" type = "text" placeholder = "First Name">
                </div>
                <div class = "input">
                <i class="fas fa-user"></i><input name = "Lname" id = "lastName" required = "required" type = "text" placeholder = "Last Name">
                </div>  
            </div>   
            <div class = "row">
                <div class = "input">
                <i class="fas fa-phone-alt"></i><input name = "phone" id = "Phone"  type = "number" placeholder = "Phone">
                </div>
                <div class = "input">
                <i class="fas fa-envelope"></i> <input name = "email" id = "Email" required = "required" type = "email" placeholder = "Email (as username)">
                </div>
            </div>   
            
            <div class = "row">
                <div class = "input">
                <i class="fas fa-city"></i></i><input name = "city" id = "City" required = "required" type = "text" placeholder = "City">
                </div>
                <div class = "input">
                <i class="fas fa-map-marker-alt"></i><input name = "country" id = "zip"  type = "text" placeholder = "Country Name">
                </div>
            </div>  
      
            <div class = "row">
                <div class = "input">
                <i class="fas fa-unlock-alt"></i><input name = "password" id = "pw" required = "required" type = "password" placeholder = "Password">
                </div> 
                <div class = "input">
                <i class="fas fa-lock"></i> <input name = "Cpassword" id = "Cpw" required = "required" type = "password" placeholder = "Confirm Password">
                </div> 
            </div>   
            <button type = "submit" name="register" class = "login">Get started </button>
            <br>    

<a href = "login.php"  style = "    margin: 10px auto;"> Already have an account?</a>

        </form>
    </div>
    <script src="../js/script.js"></script>

</body>

</html>