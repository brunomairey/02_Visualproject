

<?php

include 'common/database_connection.php'; ?>
  <link rel="stylesheet" href="common/loginbox.css">


<div class="container-fluid hero-image">
  <div class="hero-text">
    <h1 style="font-size:8vh">Visual Project Experience</h1>
    <p style="font-size:3vh">Make your life easy - choose our solution</p>
  </div>


   <div id="login-column" class="justify-content-center align-items-center col-md-6">
       
                    <div class='card border-light rounded'>



          <div class='card-body rounded'>
                       
   <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off" class="mt-2">
 
   
            <h2>Sign In.</h2 >
            <hr />
           
            <?php
  if ( isset($errMSG) ) {
echo  $errMSG; ?>
             
               <?php
  }
  ?>
           
         
 
        
            <div class="form-group">
               <label for="exampleInputEmail1">Email address</label>
            <input  type="email" name="email"  class="form-control col-md-12 mb-3" placeholder= "Your Email" value="<?php echo $email; ?>"  maxlength="40" class="form-control" id="exampleInputEmail1">
       
            <span class="text-danger"><?php  echo $emailError; ?></span>
 
         </div>
         <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
            <input  type="password" name="pass"  class="form-control col-md-12 mb-3" placeholder ="Your Password" maxlength="15">
       
           <span  class="text-danger"><?php  echo $passError; ?></span>
            
          </div>
          <div style="display: flex; justify-content: space-between;">
            <button class="col-md-4 btn btn-dark" type="submit" name= "btn-login">Sign In</button>
         
         
          
 
             <button type="button" class="col-md-4 btn btn-secondary" ><a style="text-decoration: none; color: white;" href="user/register.php">Sign Up Here...</a></button>
     </div>
         
   </form>
                    </div>
                </div>
</div>
</div>
<?php 
// include 'common/nav.php';  
if ( isset($_SESSION['user'])!="" ) {
 header("Location: project/project.php");
 exit;
}

if ( isset($_SESSION['admin'])!="" || isset($_SESSION['superadmin'])!="" ) {
 header("Location: project/project.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST[ 'pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if (empty($pass)){
  $error = true;
  $passError = "Please enter your password." ;
 }

 // if there's no error, continue to login
 if (!$error) {
 
  $password = hash( 'sha256', $pass); // password hashing
  $sql="SELECT * FROM `users` WHERE userEmail='$email'";
  $res=mysqli_query($connect, $sql);

  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row
    if( $count == 1 && $row['userPass' ]==$password ) {
    if($row['status'] == 'admin') {
      $_SESSION['admin'] = $row['userId'];
      header("Location: project/project.php");
    }

 else {
      $_SESSION['user'] = $row['userId'];
      header("Location: project/project.php");
    }

    } else {
    $errMSG = "Incorrect Credentials, Try again later..." ;
      }}
 else {
  echo "something went wrong";
}
 
 }


?>

<?php ob_end_flush(); ?>


<!-- <div class="row">




        <div class='card border-light rounded'>



          <div class='card-body rounded'>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">


              <h2 >Log In.</h2>
              <hr />

              <?php
              if (isset($errMSG)) {
                echo  $errMSG; ?>

              <?php
              }
              ?>



              <input type="email" name="email" class="form-control mb-2" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />

              <span class="text-danger"><?php echo $emailError; ?></span>


              <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />

              <span class="text-danger"><?php echo $passError; ?></span>
              <hr />
              <button class="btn btn-info btn-lg  mr-5 my-2 button" type="submit" name="btn-login">Log In</button>


              <hr />

              <a href="register.php">Sign Up Here...</a>


            </form>

          </div>
      


        </div>
       



      </div> -->


