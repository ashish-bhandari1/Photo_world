<?php
class dashboard{
    function photographer ($name, $phone,$email, $city, $country, $zip, $verify)
    {
        $mysqli =  new mysqli('localhost','root','','photo_world');
        if(!$mysqli){
            die('
            <script>
            alert("Can not connect to database");
            window.location = ("../AddPhotographer.php");
            </script>
            ');
        }
        $pw = md5($email);
        $query = "INSERT INTO photographer VALUES('', '$name', '' ,'$city','$country','$zip', '$phone','$email','','', '$pw','$verify')";
        $Userqry = "SELECT email FROM photographer WHERE email = '$email'";//username validating query

        $UserResult = $mysqli->query($Userqry);
        
        $userCount = mysqli_num_rows($UserResult);
            
        if($userCount > 0){//validaing username first    
            echo '
            <script>
            alert("Error: Email already exist!");
            window.location = ("../AddPhotographer.php");
            </script>
                ';
            die();
        }
        else{
        
            $result = $mysqli->query($query);
            if(!$result){
                die('
                <script>
                alert("Can not connect to table");
                window.location = ("../AddPhotographer.php");
                </script>
                ');
            }
            else{
                echo '
                <script>
                alert("Successfully Added");
                window.location = ("../AddPhotographer.php");
                </script>
                ';
            }
        }
    
    }

    function menu($name, $link, $verify){
        $mysqli =  new mysqli('localhost','root','','photo_world_admin');
        if(!$mysqli){
            die('
            <script>
            alert("Can not connect to database");
            window.location = ("../menu.php");
            </script>
            ');
        }
        $query = "INSERT INTO menu VALUES('', '$name','$link','$verify')";
        $Userqry = "SELECT link_name FROM menu WHERE link_name = '$name'";//username validating query

        $UserResult = $mysqli->query($Userqry);
        
        $userCount = mysqli_num_rows($UserResult);
            
        if($userCount > 0){//validaing username first    
            echo '
            <script>
            alert("Error: Link already exist!");
            window.location = ("../menu.php");
            </script>
                ';
            die();
        }
        else{
        
            $result = $mysqli->query($query);
            if(!$result){
                die('
                <script>
                alert("Can not connect to table");
                window.location = ("../menu.php");
                </script>
                ');
            }
            else{
                echo '
                <script>
                alert("Successfully Added");
                window.location = ("../menu.php");
                </script>
                ';
            }
        }
    }

    
    function edit_menu($id, $name, $link, $verify){
        $mysqli =  new mysqli('localhost','root','','photo_world_admin');
        if(!$mysqli){
            die('
            <script>
            alert("Can not connect to database");
            window.location = ("menu.php");
            </script>
            ');
        }
        $query = "UPDATE menu SET link_name =  '$name', link = '$link', active = '$verify' WHERE id = '$id'";
        
            $result = $mysqli->query($query);
            if(!$result){
                die('
                <script>
                alert("Can not connect to table");
                window.location = ("menu.php");
                </script>
                ');
            }
            else{
                echo '
                <script>
                alert("Successfully Updated");
                window.location = ("../menu.php");
                </script>
                ';
            }
        
    }


}
?>