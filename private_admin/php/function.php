<?php
class admin{
    function __construct($user, $pw){
        $mysqli =  new mysqli('localhost','root','','photo_world_admin');
        if(!$mysqli){
            die('
            <script>
            alert("Can not connect to database");
            window.location = ("../index.php");
            </script>
            ');
        }
        $query = "SELECT * FROM ADMIN";
        $result = $mysqli->query($query);
        if(!$result){
            die('
            <script>
            alert("Can not connect to table");
            window.location = ("../index.php");
            </script>
            ');
        }
        $row = mysqli_fetch_assoc($result);
        session_start();

        while($row){
         
            if($row['username'] == $user && $row['password'] == md5($pw)){
                $_SESSION ["user"] = $user;
                $_SESSION["pw"] = md5($pw);
                echo '<script>
                window.location = ("../body.php");
                </script>';

            }
            
            else{
                echo '
                <script>
                alert("Username password does not match! Try again");
                window.location = ("../index.php");
                </script>
                ';
                
            }
        }
    }
}
class admin_setting{
    function change_pw($current, $new, $renew){
        session_start();
        $password = $_SESSION ["pw"];
       


        if($password == $current){
        if($renew == $new){
            $mysqli =  new mysqli('localhost','root','','photo_world_admin');
            if(!$mysqli){
                die('
                <script>
                alert("Can not connect to database");
                window.location = ("../p_home.php");
                </script>
                ');
            }
           
            $query = "UPDATE admin SET password = '$renew' ";
            $result = $mysqli->query($query);
            if($result){
                $_SESSION["pw"] = $renew;

                echo '
                <script>
                alert("Password Successfully changed!");
                window.location = ("../setting.php");
                </script>
                ';
                 }
            }
            else{
                die('
                <script>
                alert("Password doesnot match!");
                window.location = ("../setting.php");
                </script>
                ');  
            }
        }
        else{
            echo $current."<br>";
            echo $password;
            die('
            <script>
            alert("Incorrect Current Password!");
            window.location = ("../setting.php");
            </script>
            ');  
        }
    }
}

class photographer{
    function __construct($user, $pw){
        $mysqli =  new mysqli('localhost','root','','photo_world');
        if(!$mysqli){
            die('
            <script>
            alert("Can not connect to database");
            window.location = ("../index.php");
            </script>
            ');
        }
        $encrypt = md5($pw);
        $query = "SELECT * FROM photographer WHERE email = '$user' AND password = '$encrypt'";
        $result = $mysqli->query($query);
        $count = mysqli_num_rows($result);
        if(!$result){
            die('
            <script>
            alert("Can not connect to table");
            window.location = ("../index.php");
            </script>
            ');
        }
        session_start();

        if ( $count == 1 ){
            $row = mysqli_fetch_assoc($result);
                $_SESSION ["Puser"] = $user;
                $_SESSION["Ppw"] = $encrypt;
                $_SESSION["Pid"] = $row['id']; 
              
                header('location: ../p_home.php');
               
        }
            
            else{
                echo '
                <script>
                alert("Username password does not match! Try again");
                window.location = ("../index.php");
                </script>
                ';
                
            }
        
    }
}



class p_edit{
    
    function edit($profile,$rate, $phone, $email, $city, $country, $zip, $bio){

        $mysqli = new mysqli("localhost","root","","photo_world");
        if(mysqli_connect_errno()){
            die("Error 01: cannot connect to Database <a href='#'>Report this error</a>".mysqli_connect_error());
        }
        // image file directory
        $target = "../../userimg/".basename($profile);
        
        //get image height and width
        
        $image_info = getimagesize($_FILES["profile"]["tmp_name"]);
     
        $allowed_image_extension = array(
            "png",
            "PNG",
            "jpg",
            "JPG",
            "jpeg",
            "JPEG"
        );

        $file_extension = pathinfo($_FILES["profile"]["name"], PATHINFO_EXTENSION);
    
       
        //validate extension
        if (! in_array($file_extension, $allowed_image_extension)) {
            echo '
            <script>
            alert("Error: Upload valid images. Only PNG and JPEG are allowed.");
            window.location = ("../p_edit.php");
            </script>
            '; 
        }
        //validate size
        else if($_FILES["profile"]["size"] > 2000000){
            echo '
            <script>
            alert("Error: Image size exceeds 2MB");
            window.location = ("../p_edit.php");
            </script>
            '; 
        }
        //
      
        else{   
            if(move_uploaded_file($_FILES["profile"]["tmp_name"], $target)){   
                session_start();
                $id =  $_SESSION["Pid"];          
                $qry = "UPDATE photographer SET profile ='$profile', daily_rate = '$rate', phone = '$phone', email ='$email', city = '$city', country = '$country' , zipcode = '$zip', bio = '$bio' WHERE id = '$id'";
                $result = $mysqli->query($qry);

                if(!$result){
                    echo("Data insertion error, : ".$mysqli -> error);
                    //header("Location: ../movies.php?msg =  <i class='errorMsg' id = 'ermsg' style='color:red'> Error while movie uploading<span  id = 'errorClose' onclick='errorfunction()'> close</span> </i>");
                }
                 echo '
                    <script>
                    alert("Successfully Updated");
                    window.location = ("../p_home.php");

                    </script>
                    ';            
            }
            else{
                echo '
                <script>
                alert("Unable to Updated! Please try again later");
                window.location = ("../p_edit.php");
                </script>
                ';  
            }
        }
    }


    function change_pw($current, $new, $renew){
        session_start();
        $id = $_SESSION["Pid"]; 
        $password = $_SESSION ["Ppw"];
       


        if($password == $current){
        if($renew == $new){
            $mysqli =  new mysqli('localhost','root','','photo_world');
            if(!$mysqli){
                die('
                <script>
                alert("Can not connect to database");
                window.location = ("../p_home.php");
                </script>
                ');
            }
           
            $query = "UPDATE photographer SET password = '$renew' WHERE id = '$id'";
            $result = $mysqli->query($query);
            if($result){
                $_SESSION["Ppw"] = $renew;

                echo '
                <script>
                alert("Password Successfully changed!");
                window.location = ("../p_home.php");
                </script>
                ';
                 }
            }
            else{
                die('
                <script>
                alert("Password doesnot match!");
                window.location = ("../p_home.php");
                </script>
                ');  
            }
        }
        else{
            echo $current."<br>";
            echo $password;
            die('
            <script>
            alert("Incorrect Current Password!");
            window.location = ("../p_home.php");
            </script>
            ');  
        }
    }

  


    function gallery($gallery){
    $mysqli = new mysqli("localhost","root","","photo_world");
        if(mysqli_connect_errno()){
            die("Error 01: cannot connect to Database <a href='#'>Report this error</a>".mysqli_connect_error());
        }
        $target = "../../userimg/".basename($gallery);
        
        
        $image_info = getimagesize($_FILES["profile"]["tmp_name"]);
     
        $allowed_image_extension = array(
            "png",
            "PNG",
            "jpg",
            "JPG",
            "jpeg",
            "JPEG"
        );
        $file_extension = pathinfo($_FILES["profile"]["name"], PATHINFO_EXTENSION);
    
       
        if (! in_array($file_extension, $allowed_image_extension)) {
            echo '
            <script>
            alert("Error: Upload valid images. Only PNG and JPEG are allowed.");
            window.location = ("../p_edit.php");
            </script>
            '; 
        }
        else if($_FILES["profile"]["size"] > 2000000){
            echo '
            <script>
            alert("Error: Image size exceeds 2MB");
            window.location = ("../p_edit.php");
            </script>
            '; 
        }
        //
      
        else{   
            if(move_uploaded_file($_FILES["profile"]["tmp_name"], $target)){ 
                session_start();
                $p_id = $_SESSION["Pid"];
                $qry = "INSERT INTO photographer_gallery VALUES ('','$p_id', '$gallery' )";
                $result = $mysqli->query($qry);

                if(!$result){
                    echo("Data insertion error, : ".$mysqli -> error);
                    //header("Location: ../movies.php?msg =  <i class='errorMsg' id = 'ermsg' style='color:red'> Error while movie uploading<span  id = 'errorClose' onclick='errorfunction()'> close</span> </i>");
                }
                 echo '
                    <script>
                    alert("Successfully Uploaded");
                    window.location = ("../p_home.php");

                    </script>
                    ';            
            }
            else{
                echo '
                <script>
                alert("Unable to Upload! Please try again later");
                </script>
                ';  
            }
        }
    }

}


?>