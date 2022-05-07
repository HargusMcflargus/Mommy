<?php
    include_once 'database.php';
    $connection = new DataConnector();

    if ( mysqli_num_rows($connection->select("user", "Username = '" . $_POST['username'] . "'")) || isset($_POIST['username'])){
        session_start();
        $_SESSION['username'] = $_POST['username'];
        header('LOCATION: welcome.php');
    }
    else{
        header("LOCATION: /Mommy/index.php");
    }
?>