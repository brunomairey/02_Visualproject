<?php 
//Database connection

include '../common/database_connection.php';

// check connection
if($connect->connect_error) {
    die("connection failed: " . $connect->connect_error);
} else {
    //echo "Successfully Connected";
}
// I have to add addslashes because there is 
if (isset($_POST['insertressource'])) {
   $ressource_name = addslashes($_POST["ressource_name"]);
   $ressource_type = addslashes($_POST['ressource_type']);
   $ressource_status = $_POST['ressource_status'];
     $fk_user = (int)$_SESSION['user'];
  // echo $name_resProject0 = $_POST['name_resProject0'];
   //echo $quantity_resProject0 = (int)$_POST['quantity_resProject0'];


  
$query = "INSERT INTO `ressource` (`ressource_name`, `ressource_type`, `ressource_status`, `fk_user`) 
  VALUES ('$ressource_name', '$ressource_type', '$ressource_status', $fk_user)";
  $query_run = mysqli_query($connect, $query);


 
    if($query_run) {
      $_SESSION['status'] = "Your ressource has been created!";
      $_SESSION['status_code'] = "success";
      $_SESSION['status_button'] = "Good job !";
       // echo "<p class=\"text-success mx-5 my-3\">New Record Successfully Created</p>" ;

      // this one is right with timer in second : header("Refresh:1; url=index.php");
    header("Location: ressource.php");

    } else  {
          $_SESSION['status'] = "Well, things do not always work: issue with the creation of the ressource";
      $_SESSION['status_code'] = "error";
      $_SESSION['status_button'] = "Exit !";
          header("Location: ressource.php");
   }

   $connect->close();
}

?>

