<?php
//Database connection

include '../common/database_connection.php';

// check connection
if ($connect->connect_error) {
    die("connection failed: " . $connect->connect_error);
} else {
    //echo "Successfully Connected";
}
// I have to add addslashes because there is 
if (isset($_POST['insertproject'])) {
    $project_name = addslashes($_POST["project_name"]);
    $starting_week = (int)$_POST['starting_week'];
    $project_duration = (int)$_POST['project_duration'];
    $nb_ressource = (int)$_POST['nb_ressource'];
    $project_color = $_POST['project_color'];
    $fk_user = (int)$_SESSION['user'];
    // echo $name_resProject0 = $_POST['name_resProject0'];
    //echo $quantity_resProject0 = (int)$_POST['quantity_resProject0'];


    $query = "INSERT INTO `project` (`project_name`, `starting_week`, `project_duration`, `nb_ressource`, `project_color`, `fk_user`) 
  VALUES ('$project_name', $starting_week, $project_duration, $nb_ressource, '$project_color', $fk_user)";
    $query_run = mysqli_query($connect, $query);


    if ($query_run) {
        $_SESSION['status'] = "Your project has been created!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_button'] = "Good job !";
        // echo "<p class=\"text-success mx-5 my-3\">New Record Successfully Created</p>" ;

        // this one is right with timer in second : header("Refresh:1; url=index.php");
        header("Location: project.php");

    } else {
        $_SESSION['status'] = "Well, things do not always work: issue with the creation of the project";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_button'] = "Exit !";
        header("Location: project.php");
    }

    $connect->close();
}

?>

