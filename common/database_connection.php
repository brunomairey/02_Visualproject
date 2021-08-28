<?php

//database_connection.php

ob_start();
session_start();
error_reporting( ~E_DEPRECATED & ~E_NOTICE );

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "02_visualproject";

$connect = new  mysqli($localhost, $username, $password, $dbname);
   $resultuser=mysqli_query($connect, "SELECT * FROM users WHERE userId=".$_SESSION['user']); 


  if ( isset($_SESSION['user'])!="" || isset($_SESSION['admin'])!="" || isset($_SESSION['superadmin'])!="") {
    // create connection
 $userRow=mysqli_fetch_array($resultuser, MYSQLI_ASSOC);
 // var_dump($resultuser);

 $logoutlink= "<form class=\"form-inline m-2 my-lg-0\">
              <span class=\"navbar-text\" style=\"color:#0D8FDA\">
     Welcome ". $userRow['userName' ] . " ". $userRow['UserLastname' ] . "
    </span>
        <a href=\"../user/logout.php?logout\"><button class=\"btn btn-outline-light m-2 my-sm-0\" type=\"button\">Logout</button></a>
    </form>";

}


else {$logoutlink="<form class=\"form-inline my-2 my-lg-0\">
      <a href=\"index.php\"><button class=\"btn btn-outline-light my-2 my-sm-0\" type=\"button\">Login</button></a>
          </form>";


} 



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="with-device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie-edge">

  <title> 👁 The Visual Project Experience</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<style type ="text/css">
       footer {
  position: sticky;
  left: 0;
  bottom: 100;
  width: 100%;
  background-color: #2262A9;
  color: white;
  text-align: center;
}
</style>