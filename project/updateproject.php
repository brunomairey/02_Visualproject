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
if (isset($_POST['updateproject'])) {

    $id_project = $_POST['id_project'];

    $project_name = addslashes($_POST["project_name"]);
    $starting_week = (int)$_POST['starting_week'];
    $project_duration = (int)$_POST['project_duration'];
    $nb_ressource = (int)$_POST['nb_ressource'];
    $project_color = $_POST['project_color'];


    $query = "UPDATE `project` SET `project_name` = '$project_name', `starting_week` = '$starting_week', `project_duration` = '$project_duration', `nb_ressource` = '$nb_ressource', `project_color` = '$project_color' WHERE id_project = '$id_project' ";


    $query_run = mysqli_query($connect, $query);
    // if($connect->query($sql) === TRUE)
    if ($query_run) {
        $_SESSION['status'] = "Your project has been successfully updated!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_button'] = "Good job !";
        // echo "<p class=\"text-success mx-5 my-3\">New Record Successfully Created</p>" ;

        // this one is right with timer in second : header("Refresh:1; url=index.php");
        header("Location: project.php");

    } else {
        $_SESSION['status'] = "Well, things do not always work: issue by updating the project";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_button'] = "Exit !";

    }

    $connect->close();
}

?>
