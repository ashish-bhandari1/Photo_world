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
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Profile</title>
      <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
      <link type="text/css" rel = "stylesheet" href= "profile.css">
      <link href="../fontawesome/css/all.css" rel="stylesheet">
   </head>
   <body>

        <div class="top">
            <h2>Profile / <span> <?php echo $row['name']; ?> </span></h2>
            <div class="change-wrapper" id="changepw_click">
                <form method = "post" class="password" action= "php/obj.php">
                <h1>Change Password <i onclick="login_popUP()" class="fas fa-window-close"></i></h1>
                <div class = "input">
                    <input name = "current_pw" id = "password" required = "required" type = "password" placeholder = "Current Password">
                    <input name = "new_pw" id = "pw" required = "required" type = "password" placeholder = "New Password">
                    <input name = "retype_new_pw"  required = "required" type = "password" placeholder = "Retype New Password">
                    <button type = "submit" name="change_pw" class = "login">Change Password </button>
                </div>
                </form>
            </div>
        </div>

    <div class = "row ">
            <div class="button-wrapper">
                <a href="php/logout.php" onclick="return confirm('Are you sure you want to Logout?');">Logout</a>
                <a href="p_edit.php">Edit Profile</a>
                <a href="javascript:login_popUP()"  class = "login">Change password </a>
            </div>
    <div class= "top-wrapper container-fluid">
            <div class = "img-wrapper">
               <img src = "../userimg/<?php echo $row['profile']; ?>" alt ="profile">
            </div>
        <div class = "intro-wrapper">
               <p> Name: <span><?php echo $row['name']; ?></span> </P>
               <p> City: <span> <?php echo $row['city']; ?></span> </P>
               <p> Zip Code: <span> <?php echo $row['zipcode']; ?></span> </P>
               <p> Country: <span> <?php echo $row['country']; ?></span> </P>
               <p> Phone: <span> <?php echo $row['phone']; ?></span> </P>
               <p> email: <span> <?php echo $row['email']; ?></span> </P>
               <p> Rate per day: <span> <?php echo $row['daily_rate']; ?></span> </P>
        </div>
    </div>
    
    <div class= "down-wrapper container-fluid">
            <div class="intro-wrapper">
               <P>Bio: <i> <?php echo $row['bio']; ?> </i> </p>
            </div>
            <h2> gallery</h2>
        <div class = "gallery-wrapper">
               <?php 
                  while($Prow = mysqli_fetch_assoc($photoResult)){ ?>
                <div class = "gallery">
                  <img src = "../userimg/<?php echo $Prow['photo']; ?>" alt ="profile">
                  <form method="post" action="php/obj.php">
                     <input type="text" name = "g_id" value = "<?php echo $Prow['id']; ?>" >
                     <button name="delete" type="submit"> Delete</button>
                  </form>
                </div>
               <?php
                  }
                  ?>
        </div>
    </div>
 </div>
   </body>
   <footer>
   </footer>
   <script>
      var result = document.getElementById("changepw_click");
      
      function login_popUP(){
          if(result.style.display == "none"){
          result.style.display = "block";
          }else{
              result.style.display = "none";
          }
      
      
      }
      
      window.addEventListener("dblclick", function(event) {
          if (event.target == result) {
              result.style.display = "none"; 
          }
      });
      
   </script>
</html>