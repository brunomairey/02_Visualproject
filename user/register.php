<?php
   
// start a new session or continues the previous
// if( isset($_SESSION['user'])!="" ){
//  header("Location: home.php" ); // redirects to home.php
// }
include_once '../common/database_connection.php';
  ob_start();
session_start(); 

$error = false;
if ( isset($_POST['btn-signup']) ) {
 
 // sanitize user input to prevent sql injection
 $name = trim($_POST['name']);

  //trim - strips whitespace (or other characters) from the beginning and end of a string
  $name = strip_tags($name);

  // strip_tags — strips HTML and PHP tags from a string

  $name = htmlspecialchars($name);
 // htmlspecialchars converts special characters to HTML entities
 $email = trim($_POST[ 'email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

 $repass = trim($_POST['repass']);
 $repass = strip_tags($repass);
 $repass = htmlspecialchars($repass);

  $lastname = trim($_POST['lastname']);
  $lastname = strip_tags($lastname);
  $lastname = htmlspecialchars($lastname);

  // basic name validation
 if (empty($name)) {
  $error = true ;
  $nameError = "Please enter your full name.";
 } else if (strlen($name) < 3) {
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  $error = true ;
  $nameError = "Name must contain alphabets and space.";
 }

// basic lastname validation

  if (empty($lastname)) {
  $error = true ;
  $lastnameError = "Please enter your full lastname.";
 } else if (strlen($lastname) < 3) {
  $error = true;
  $lastnameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$lastname)) {
  $error = true ;
  $lastnameError = "Name must contain alphabets and space.";
 }


 //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address." ;
 } else {
  // checks whether the email exists or not
  $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
  $result = mysqli_query($connect, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
  if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have at least 6 characters." ;
 }

 // password validation : reenter
  if (empty($repass)){
  $error = true;
  $repassError = "Please reenter password.";
 } else if(strlen($repass) < 6) {
  $error = true;
  $repassError = "Password must have at least 6 characters." ;
 }

else if($repass !== $pass) {
  $error = true;
  $repassError = "Repassword must match password" ;
 }


 // password hashing for security
$password = hash('sha256' , $pass);


 // if there's no error, continue to signup
 if(!$error ) {
 
  $query = "INSERT INTO `users`(`userName`,`userLastname`,`userEmail`,`UserPass`) VALUES('$name','$lastname','$email','$password')";
  $res = mysqli_query($connect, $query);
 
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
    unset($lastname);
    unset($email);
   unset($pass);
  } else  {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..." ;
  }
 
 }


}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>
</head>
<body>
   <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="on" style="width:80%; position: relative; left: 10%">
 
     
            <h2>Sign Up.</h2>
           <hr>
         
            <?php
   if ( isset($errMSG) ) {
 
   ?>
           <div  class="alert alert-<?php echo $errTyp ?>" >
                         <?php echo  $errMSG; ?>
       </div>

<?php
  }
  ?>
         
       <div class="form-group">
         
          <label>Name</label>
            <input type ="text"  name="name"  class ="form-control col-md-6 mb-3"  placeholder ="Enter Name"  maxlength ="50"   value = "<?php echo $name ?>">
     
               <span   class = "text-danger" > <?php   echo  $nameError; ?> </span>
         </div>
           <div class="form-group">
          <label>Last Name</label>
          <input type ="text"  name="lastname"  class ="form-control col-md-6 mb-3"  placeholder ="Enter Lastname"  maxlength ="50"   value = "<?php echo $lastname ?>">
     
               <span   class = "text-danger" > <?php   echo  $lastnameError; ?> </span>
            </div> 
             <div class="form-group">
             <label>Email address</label>
            <input type = "email"   name = "email"   class = "form-control col-md-6 mb-3"   placeholder = "Enter Your Email"   maxlength = "40"   value = "<?php echo $email ?>" >
   
               <span class = "text-danger" > <?php   echo  $emailError; ?> </span>
     
         </div>
       <div class="form-group">
            <label>Password</label>
       
            <input   type = "password"   name = "pass"   class = "form-control col-md-6 mb-3"   placeholder = "Enter Password"   maxlength = "15">
           
               <span class = "text-danger"> <?php   echo  $passError; ?> </span>
        </div>
              <div class="form-group">
            <label>Retype Password</label>
            <input   type = "password"   name = "repass"   class = "form-control col-md-6 mb-3"   placeholder = "reenter Password"   maxlength = "15">
           
               <span class = "text-danger"> <?php   echo  $repassError; ?> </span>
     </div>
           
         
            <button type = "submit"   class = "mb-3 btn btn-dark"   name = "btn-signup" >Sign Up</button>
            <hr>
         
            <a href = "../index.php" ><button type="button" class=" btn btn-secondary">Sign in Here...</button></a>
   
 
   </form >
</body >
</html >
<?php  ob_end_flush(); ?>
<?php echo $footer; ?>