<?php
    session_start();
    $username = $_SESSION['registration_username'];
    $password = $_SESSION['registration_password'];
    $name = $_POST['registration_name'];
    $contact = $_POST['registration_contact'];
    $studID = $_POST['registration_Student_id'];
    $bday = $_POST['registration_day'];
    $year = $_POST['registration_year'];
    $course = $_POST['registration_course'];
    $section = $_POST['registration_section'];

    include_once 'database.php';

    $connector = new DataConnector();
    $sql = "INSERT INTO user (Username, Password, StudName, ContactNo, StudID, BDay, Year, Course, Section)VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $statement = $connector->connection->prepare($sql);
    $statement->bind_param(
        "sssssssss", 
        $username,
        $password,
        $name,
        $contact,
        $studID,
        $bday,
        $year,
        $course,
        $section    
    );
    $statement->execute();
    header("LOCATION: /Mommy/index.php");

    unset($username, $password, $name, $contact, $studID, $bday, $year, $course, $section);
?>