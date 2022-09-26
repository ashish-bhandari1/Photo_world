<?php
class user
 {
    function __construct($username, $password)
    {
        $mysqli = mysqli_connect("localhost","root","","photo_world");
        if(mysqli_connect_errno()){
            die("Error 01: cannot connect to Database <a href='#'>Report this error</a>". mysqli_connect_error());
        }
        $encrypt = md5($password);
        $query = "SELECT id, email,password FROM customer WHERE email = '$username' AND password = '$encrypt'";
        $result = $mysqli->query($query);
        $count = mysqli_num_rows($result);
        if(!$result){
            die('
            <script>
            alert("Can not connect to table");
            window.location = ("login.php");
            </script>
            ');
        }
        session_start();

        if ( $count == 1 ){
            $row = mysqli_fetch_assoc($result);
            $_SESSION ["customer"] = $username;
            $_SESSION ["customerPW"] = $encrypt;
            $_SESSION["Cid"] = $row['id']; 
              
                echo '
                <script>
                alert("Logged in successfully");
                window.location = ("../");
                </script>
                ';               
        }
            
            else{
                echo '
                <script>
                alert("Username password does not match! Try again");
                window.location = ("login.php");
                </script>
                ';
                
            }
       
        mysqli_close($mysqli);

    }

}

class register{
    
    public function setPhone($phone){
        $this->phone = $phone;
    }
    public function getPhone(){
        return $this->phone;
    }  
    public function setUsername($email){
        $this->email = $email;
    }
    public function getUsername(){
        return $this->email;
    }

    public function setPassword($password){
        $this->password = md5($password);
    }
    public function getPassword(){
        return $this->password;
    }

    public function registerUser($name, $country, $city)
    {

        $conn = mysqli_connect("localhost","root","","photo_world");
        if(mysqli_connect_errno()){
            die("Error 01: cannot connect to Database <a href='#'>Report this error</a>". mysqli_connect_error());
        }
        $Userqry = "SELECT email FROM customer WHERE email = '$this->email'";//username validating query
        $UserResult = $conn->query($Userqry);
        $userCount = mysqli_num_rows($UserResult);

        if($userCount < 1){
                $qry = "INSERT INTO customer VALUES 
                    (NULL,'$name',  '$country',  '$city', '$this->phone', '$this->email', '$this->password')";
            

            $result = $conn->query($qry);
                if($result){//validaing username first    
                    echo '
                    <script>
                    alert("successfully  REGISTERED");
                    window.location = ("../");
                    </script>
                        ';
                }

            

                else{
                    echo 'Sorry error occured while inserting data!<br>
                        <a href = "../">Go back to home page! </a>
                        ';
                }
            }
            else{
                echo '
                <script>
                alert("Email Already Exists");
                window.location = ("register.php");
                </script>
                    ';
            }
    }

}
class customer{
    function change_pw($current, $new, $renew){
        session_start();
        $id = $_SESSION["Cid"]; 
        $password = $_SESSION ["customerPW"];

        if($password == $current){
        if($renew == $new){
            $mysqli =  new mysqli('localhost','root','','photo_world');
            if(!$mysqli){
                die('
                <script>
                alert("Can not connect to database");
                window.location = ("../login/login.php");
                </script>
                ');
            }
           
            $query = "UPDATE customer SET password = '$renew' WHERE id = '$id'";
            $result = $mysqli->query($query);
            if($result){
                echo '
                <script>
                alert("Password Successfully changed!");
                window.location = ("../login/login.php");
                </script>
                ';
                 }
            }
            else{
                die('
                <script>
                alert("Password doesnot match!");
                window.location = ("../login/login.php");
                </script>
                ');  
            }
        }
        else{
            die('
            <script>
            alert("Incorrect Current Password!");
            window.location = ("../login/login.php");
            </script>
            ');  
        }
    }

    function book($pid, $uid, $from, $to){
            $conn = mysqli_connect("localhost","root","","photo_world");
            if(mysqli_connect_errno()){
                die("Error 01: cannot connect to Database <a href='#'>Report this error</a>". mysqli_connect_error());
            }
           $qry = "INSERT INTO booking VALUES 
                        (NULL,'$uid',  '$pid',  '$from', '$to')";
                
    
                    $result = $conn->query($qry);
                    if($result == true){    
                        echo '
                        <script>
                        alert("successfully  Booked");
                        window.location = ("../book.php?id='.$pid.'");
                        </script>
                            ';
                    }  
                    else{
                        echo '
                        <script>
                        alert("Failed to Book! Try Again !");
                        window.location = ("../book.php?id='.$pid.'");
                        </script>
                            ';

                    }
               
        
    
    }
}

?>