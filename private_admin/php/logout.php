<?php 

    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['pw']);

    unset($_SESSION['Puser']);
    unset($_SESSION['Ppw']);
    unset($_SESSION['Pid']);
    session_destroy();
    header('location: ../index.php');



?>