<?php
//Database connection
session_start();
include '../common/database_connection.php';

// check connection
if ($connect->connect_error) {
    die("connection failed: " . $connect->connect_error);
} else {
    //echo "Successfully Connected";
}
// I have to add addslashes because there is 
if (isset($_POST['updateressource'])) {

    $id_ressource = $_POST['id_ressource'];
    $ressource_name = addslashes($_POST["ressource_name"]);
    $ressource_type = $_POST['ressource_type'];
    $ressource_status = $_POST['ressource_status'];

    $query = "UPDATE `ressource` SET `ressource_name` = '$ressource_name', `ressource_type` = '$ressource_type', `ressource_status` = '$ressource_status' WHERE id_ressource = '$id_ressource' ";


    $query_run = mysqli_query($connect, $query);
    // if($connect->query($sql) === TRUE)
    if ($query_run) {
        $_SESSION['status'] = "Your ressource has been successfully updated!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_button'] = "Good job !";
        // echo "<p class=\"text-success mx-5 my-3\">New Record Successfully Created</p>" ;

        // this one is right with timer in second : header("Refresh:1; url=index.php");
        header("Location: ressource.php");

    } else {
        $_SESSION['status'] = "Well, things do not always work: issue by updating the ressource";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_button'] = "Exit !";

    }

    $connect->close();
}

?>
