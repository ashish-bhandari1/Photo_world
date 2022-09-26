<?php
include 'function.php';
    if(isset($_POST['login'])){
    $conn = mysqli_connect("localhost","root","","photo_world");
    if(!$conn){
        die("Error 01: cannot connect to Database <a href='#'>Report this error</a>". mysqli_connect_error());
    }
    $username = mysqli_real_escape_string($conn,$_POST["username"]);//using mysqli realscape string to store important data more securely
    $pw =  mysqli_real_escape_string($conn, ($_POST["password"]));

    //calling another class

    $obj = new user($username,$pw);//passing variable to constructor
    }

    if(isset($_POST['register'])){
        $conn = mysqli_connect("localhost","root","","photo_world");
        if(!$conn){
            die("Error 01: cannot connect to Database <a href='#'>Report this error</a>". mysqli_connect_error());
        }
        //using mysqli realscape string to store important data more securely
        $password =  mysqli_real_escape_string($conn, ($_POST["password"]));
        $Cpassword =  mysqli_real_escape_string($conn, ($_POST["Cpassword"]));
        
        $Fname =  $_POST["Fname"];
        $Lname =  $_POST["Lname"];
        $phone =  mysqli_real_escape_string($conn, ($_POST["phone"]));
        $email =  mysqli_real_escape_string($conn, ($_POST["email"]));
        $country = $_POST["country"];
        $city =  $_POST["city"];
        
       if($password == $Cpassword){
        //calling another class
        $obj = new register();
        
        //calling functions
        $obj->setUsername($email);
        $obj->getUsername();
        
        $obj->setPassword($password);
        $obj->getPassword();
        
        $obj->setPhone($phone);
        $obj->getPhone();
        
        $obj->registerUser($Fname.$Lname, $country, $city);
       }  
         
       else{
        echo '
        <script>
        alert("password does not match! Try again");
        window.location = ("../index.php");
        </script>
        ';
        
    }
    }

    

if(isset($_POST["change_pw"])){

   
    $current = md5($_POST['current_pw']);
    $new = md5($_POST['new_pw']);
    $renew = md5($_POST['retype_new_pw']);
   
    $obj = new customer();
    $obj->change_pw($current, $new, $renew);
 
}

if(isset($_POST["book"])){
    $from = $_POST['fromDate'];
    $to = $_POST['toDate']; 
    $pid = $_POST['id']; 
    $uid = $_POST['user']; 
    $obj = new customer();
    $obj->book($pid, $uid, $from, $to);
 
}

?>