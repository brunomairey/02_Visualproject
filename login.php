<?php

include 'common/database_connection.php';

?>
<?php
$url7 = "../../index.html";
$urlimage = "../images/logo_entre.png";
$urlindex = "../index.php";
$urlsign = "../companies/create.php";
$urlcompanies = "../companies/index.php";
$urlevents = "../events/events.php";
$urlabout = "../aboutus.php";
$urlfriends = "../friends.php";
$urlcontact = "../contact.php";
$urlvideos = "../stories.php";


// it will never let you open index(login) page if session is set
if (isset($_SESSION['user']) != "") {
    header("Location: events.php");
    exit;
}

$error = false;

if (isset($_POST['btn-login'])) {

// prevent sql injections/ clear user invalid inputs
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
// prevent sql injections / clear user invalid inputs

    if (empty($email)) {
        $error = true;
        $emailError = "Please enter your email address.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    }

    if (empty($pass)) {
        $error = true;
        $passError = "Please enter your password.";
    }

// if there's no error, continue to login
    if (!$error) {

        $password = hash('sha256', $pass); // password hashing

//old
        $res = mysqli_query($conn, "SELECT * FROM users WHERE userEmail='$email'");
//$obj->read('users',array('useremail'=>$email));


        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row

        if ($count == 1 && $row['userPass'] == $password) {
            if ($row["status"] == 'admin') {
                $_SESSION["admin"] = $row["userID"];
                header("Location: ../Events/eventsAdmin.php");
            } elseif ($row["status"] == 'superadmin') {
                $_SESSION['superadmin'] = $row['userID'];
                header("Location: superadmin.php");
            } else {
                $_SESSION['user'] = $row['userID'];
                header("Location: ../Events/events.php");
            }
        } else {
            $errMSG = "Incorrect Credentials, Try again...";
        }
    }
}
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Login & Registration System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="../style_MANUELA.css"> -->

        <style>
            body {
                font-family: "Roboto", sans-serif;
            }

            /* STYLECODE FOR PARALLAX */
            /*    .parallax_section1 {
                  height: 300px;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                  background-position: center;
                  position: relative;
                }
            */
            .parallax_section2 {
                height: 100vh;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-position: center;
                position: relative;
            }

            .parallax_image {
                background-image: url(header.jpg);
            }

            .row {
                display: flex;
                /* flex-wrap: wrap;*/
                justify-content: center;
                /*      align-items: center;*/
            }

            .card_parallax:hover {
                transform: scale(1.05);
            }

            .card {
                /*      position: relative;*/
                margin: 20px 10px 20px 10px;
                padding: 20px 20px 20px 20px;
                transition: all 0.5s;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.8);
                background-color: #DCE1DB;


            }

            .card-body {
                background-color: #0D8FDA;
            }

            /* .button{
              background-color: #135887;
              border: #135887;
            } */


        </style>

    </head>

    <body>


    <div class="container-fluid">

        <?php

        ?>


        <!--     <div class="parallax_section1 parallax_image">

            </div> -->
        <!--END PARALLAX-->


        <div class="parallax_section2 parallax_image">

            <div class="row">


                <div class='card border-light rounded my-auto'>


                    <div class='card-body rounded'>

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                              autocomplete="off">


                            <h2>Log In.</h2>
                            <hr/>

                            <?php
                            if (isset($errMSG)) {
                                echo $errMSG; ?>

                                <?php
                            }
                            ?>


                            <input type="email" name="email" class="form-control mb-2" placeholder="Your Email"
                                   value="<?php echo $email; ?>" maxlength="40"/>

                            <span class="text-danger"><?php echo $emailError; ?></span>


                            <input type="password" name="pass" class="form-control" placeholder="Your Password"
                                   maxlength="15"/>

                            <span class="text-danger"><?php echo $passError; ?></span>
                            <hr/>
                            <button class="btn btn-light btn-lg  mr-5 my-2 button" type="submit" name="btn-login">Log
                                In
                            </button>


                            <hr/>

                            <!--  <a href="register.php">Sign Up Here...</a> -->
                            <a href="user/register.php">
                                <button class="btn btn-outline-light" type="button">Sign Up Here...</button>
                            </a>

                        </form>

                    </div>
                    <!--END BODY-->


                </div>
                <!--END books-->


                <!--END showmore-->


            </div>


        </div>
        <!--END PARALLAX -->

        <div class="parallax_section1 parallax_image">
        </div>
        <!--END PARALLAX-->


        <!-- <nav class="navbar navbar-light bg-dark">

          <div class="mx-auto">
            <h2 class="text-success">(c) TEAM 10: BEMM 2020 </h2>

          </div>
        </nav> -->
        <!--END FOOTER-->


    </div>
    <!--END CONTAINER-->

    <!--   <?php

    $facebookfooter = "../images/facebook.png";
    $instafooter = "../images/insta.png";
    $twitterfooter = "../images/twitter.png";
    $youtubefooter = "../images/youtube.png";
    $linkedinfooter = "../images/linkedin.png";
    $impressum = "../impressum.php";
    $datenschutz = "../datenschutz.php";
    $loginadmin = "../login/login.php";
    include('../footer.php');

    ?>
 -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>

    </body>


    </html>
<?php ob_end_flush(); ?>
