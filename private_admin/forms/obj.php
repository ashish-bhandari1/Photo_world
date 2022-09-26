<?php
include 'function.php';

if(isset($_POST["photographer"])){
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $city = $_POST["city"];
    $country = $_POST["country"];
    $zip = $_POST["zip"];
    $verify = $_POST["verify"];
    

    $obj = new dashboard();
    $obj->photographer($name, $phone,$email, $city, $country, $zip, $verify);
}

if(isset($_POST["menu"])){
    $name = $_POST["name"];
    $link = $_POST["link"];
    $active = $_POST["active"];    

    $obj = new dashboard();
    $obj->menu($name, $link,$active);
}


if(isset($_POST["edit_menu"])){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $link = $_POST["link"];
    $active = $_POST["active"];    

    $obj = new dashboard();
    $obj->edit_menu($id, $name, $link,$active);
}
?>