<?php 
session_start();
if(!isset($_SESSION ["Puser"] )){
    header('location: index.php');
}

// echo $_SESSION ["Puser"] . $_SESSION["Ppw"] ;
// echo $_SESSION["Pid"];
$mysqli =  new mysqli('localhost','root','','photo_world');
if(!$mysqli){
    die('
    <script>
    alert("Can not connect to database");
    windows.location = ("../index.php");
    </script>
    ');
}

$id = $_SESSION["Pid"];

$query = "SELECT * FROM photographer WHERE id = '$id'";
$photoQry = "SELECT * FROM photographer_gallery WHERE p_id = '$id'";

$result = $mysqli->query($query);
$photoResult = $mysqli->query($photoQry);

if(!$result || !$photoResult){
    die('
    <script>
    alert("Can not connect to table");
    windows.location = ("../index.php");
    </script>
    ');
}
$row = mysqli_fetch_assoc($result);


if(isset($_POST["edit"])){
    $profile = $_POST["profile"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $city = $_POST["city"];
    $country = $_POST["country"];
    $zip = $_POST["zip"];

    $obj = new profile_edit($id, $profile, $phone, $email, $city, $country, $zip);
}
?>

<!DOCTYPE hmtl>
<html>
    <head>
        <title>Profile</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link type="text/css" rel = "stylesheet" href= "profile.css">
    </head>
    <body>

        <div class = "form">
            <form method="POST" enctype="multipart/form-data" action="php/obj.php">
            <h2> Edit Detail</h2>
                <div class="input">
                    <label>Profile</label>
                    <input type="file" name="profile" type="file"  accept=".jpg,.png" required = "required">
                </div>
                <div class="input">
                    <label>Phone</label>
                    <input type="number" name="phone"  required = "required" value = " <?php echo $row['phone']; ?>">
                </div>
                <div class="input">
                    <label>Email</label>
                    <input type="text" name="email"  required = "required"value = " <?php echo $row['email']; ?>">
                </div>                
                <div class="input">
                    <label>Rate Per Day</label>
                    <input type="text" name="rate"  required = "required"value = " <?php echo $row['daily_rate']; ?>">
                </div>
                <div class="input">
                    <label>City</label>
                    <input type="text" name="city"  required = "required" value = " <?php echo $row['city']; ?>">
                </div>
                <div class="input">
                    <label>Country</label>
                    <input type="text" name="country" required = "required" value = " <?php echo $row['country']; ?>">
                </div>
                <div class="input">
                    <label>ZIP code</label>
                    <input type="text" name="zip" value = " <?php echo $row['zipcode']; ?>">
                </div>
          
                <div class="input">
                    <label>BIO </label>
                    <input type="text" name="bio" value = " <?php echo $row['bio']; ?>">
                </div>
          
             
                
                <div class="input">
                <Button type="submit" name="p_update">Update</Button>  
                <a href="p_home.php">Back</a>
                </div>                
            </form>
        </div>
        
        <div class = "form">
        <form method="POST" enctype="multipart/form-data" action="php/obj.php">
            <h2> Upload Photos </h2>
                
                <div class="input">
                    <label>Select Photo</label>
                    <input type="file" name="profile"  required = "required" >
                </div>
                
                <div class="input">
                <Button type="submit" name="galleryUpdate">Upload</Button>  
                </div>                
            </form>
            
        </div>
        
    </body>
    <footer>

    </footer>
</html>