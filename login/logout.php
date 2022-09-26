<?php 

    session_start();
    unset($_SESSION['Cuser']);
    unset($_SESSION['Cid']);
    session_destroy();
    header('location: ../index.php');

?>
