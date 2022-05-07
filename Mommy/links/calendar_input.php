<?php
    session_start();

    if(
        isset($_POST['calendar_input_date']) &&
        isset($_POST['calendar_input_desc'])
    ){
        $connector = new mysqli(
            "localhost",
            "root",
            "",
            "software_engineering"
        );
        $sql = "INSERT INTO calendar_entry (entryOwner, setDate, setDesc) VALUES (?, ?, ?);";
        $statement = $connector->prepare($sql);
        
        $statement->bind_param(
            "sss",
            $_SESSION['username'],
            $_POST['calendar_input_date'],
            $_POST['calendar_input_desc']
        );
        $statement->execute();
        header('LOCATION: calendar.php');
        die();
    }
?>