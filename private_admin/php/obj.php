<?php
include 'function.php';

if(isset($_POST["admin"])){
    $user = $_POST["username"];
    $pw = $_POST["password"]; 
    $role = $_POST["role"];
    if($role == "Admin"){
        $obj = new admin($user, $pw );
    }
    else{
        $obj = new photographer($user, $pw );
    }
}

if(isset($_POST["p_update"])){

    $city = $_POST["city"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $profile = $_FILES['profile']['name'];
    $zip = $_POST["zip"];
    $rate = $_POST["rate"];
    $bio = $_POST["bio"];

    $obj = new p_edit();
    $obj->edit($profile, $rate, $phone, $email, $city, $country, $zip, $bio);
 
}


if(isset($_POST["galleryUpdate"])){

   
    $gallery = $_FILES['profile']['name'];
   
    $obj = new p_edit();
    $obj->gallery($gallery);
 
}


if(isset($_POST["delete"])){

    $id = $_POST['g_id'];
   
    $mysqli =  new mysqli('localhost','root','','photo_world');
    if(!$mysqli){
        die('
        <script>
        alert("Can not connect to database");
        window.location = ("../p_home.php");
        </script>
        ');
    }

    $query = "DELETE FROM photographer_gallery WHERE id = '$id' ";
    $result = $mysqli->query($query);
    
    if(!$result){
        die('
        <script>
        alert("Can not connect to table");
        window.location = ("../p_home.php");
        </script>
        ');
    }
       
        else{
            echo '
            <script>
            alert("Successfully deleted!");
            window.location = ("../p_home.php");
            </script>
            ';
            
        }
    
}

  

if(isset($_POST["change_pw"])){

   
    $current = md5($_POST['current_pw']);
    $new = md5($_POST['new_pw']);
    $renew = md5($_POST['retype_new_pw']);
   
    $obj = new p_edit();
    $obj->change_pw($current, $new, $renew);
 
}

if(isset($_POST["admin_pw"])){

   
    $current = md5($_POST['current_pw']);
    $new = md5($_POST['new_pw']);
    $renew = md5($_POST['retype_new_pw']);
   
    $obj = new admin_setting();
    $obj->change_pw($current, $new, $renew);
 
}

if(isset($_POST["p_verify"])){
    $mysqli =  new mysqli('localhost','root','','photo_world');

   $id = $_POST['id'];
   $query = "SELECT * from  photographer   WHERE id = '$id' ";
   $result = $mysqli->query($query);
    $row = mysqli_fetch_assoc($result);

   if($row['verify'] == 1){
    $query2 = "UPDATE  photographer SET verify = '0' WHERE id = '$id' ";
    $result2 = $mysqli->query($query2);
     if(!$result2){
         die('
         <script>
         alert("Can not connect to table");
         window.location = ("../photographer.php");
         </script>
         ');
         }else{echo '
             <script>
             alert("Verification Changed!");
             window.location = ("../photographer.php");
             </script> ';             
         }
 
   }
   else{
    $query3 = "UPDATE  photographer SET verify = '1' WHERE id = '$id' ";
    $result3 = $mysqli->query($query3);
     if(!$result3){
         die('
         <script>
         alert("Can not connect to table");
         window.location = ("../photographer.php");
         </script>
         ');
         }else{echo '
             <script>
             alert("Photographer verified");
             window.location = ("../photographer.php");

             </script> ';             
         }
   }
    
 
}

?>