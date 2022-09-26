<?php 
   $mysqli =  new mysqli('localhost','root','','photo_world');
   $conn =  new mysqli('localhost','root','','photo_world_admin');
   if(!$mysqli || !$conn){
       die('
       <script>
       alert("Can not connect to database");
       windows.location = ("../index.php");
       </script>
       ');
   }
   
   $query = "SELECT * FROM photographer WHERE verify = '1'";
   $menuQry = "SELECT * FROM menu WHERE active = '1'";
   
   $result = $mysqli->query($query);
   $menuResult = $conn->query($menuQry);
   
   if(!$result || !$menuResult ){
       die('
       <script>
       alert("Can not connect to table");
       windows.location = ("index.php");
       </script>
       ');
   }
   
   
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Photo World</title>
      <link type="text/css"  rel ="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <link href="fontawesome/css/all.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Montserrat|Cardo' rel='stylesheet' type='text/css'>
      <link href="https://fonts.googleapis.com/css?family=Lobster|Trade+Winds&display=swap" rel="stylesheet">
      <link href='style.css' rel='stylesheet' type='text/css'>
   </head>
   <body>
      <header class="main_h">
         <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#ADD8E6;">
            <a class="navbar-brand " href="#" style="margin-right:10%;">PHOTO WORLD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" class="text-align:center">
               <ul class="navbar-nav mr-auto">
                  <?php 
                     while($qryRow = mysqli_fetch_assoc($menuResult)){
                     ?>               
                  <li class="nav-item ">
                     <a class="nav-link" style="color:#000;" href="<?php echo $qryRow['link']; ?> "><?php echo $qryRow['link_name'] ?> <span class="sr-only">(current)</span></a>
                  </li>
                  <?php } ?>
                  <li class="nav-item ">
                     <?php 
                     session_start();
                     if(isset($_SESSION["Cid"] )){
                        echo'
                        <a class="nav-link" style=" color:#fff;   background-color: rgb(81, 148, 170);  border-radius: 2px;"
                        href="login/login.php"><i class="fas fa-user-cog"></i>Account</a>
                        ';
                     }
                     else{
                        echo'
                        <a class="nav-link" style=" color:#fff;   background-color: rgb(81, 148, 170);  border-radius: 2px;"
                        href="login/login.php"><i class="fas fa-user"></i>Login/Register</a>
                        ';
                     }
                     ?>
                    </li>
               </ul>
            </div>
         </nav>
         <!-- 
            <li><a href=".sec02">About Us</a></li>
            <li><a href=".sec03">How it Works</a></li>
            <li><a href=".sec04">Why Trust Us</a></li>  -->
         <!-- / row -->
      </header>
