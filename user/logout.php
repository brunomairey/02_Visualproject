<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
} else if (isset($_SESSION['user']) != "") {
    header("Location: ../project/project.php");
}

if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
} else if (isset($_SESSION['admin']) != "") {
    header("Location: ../project/project.php");
}

if (!isset($_SESSION['superadmin'])) {
    header("Location: ../index.php");
} else if (isset($_SESSION['superadmin']) != "") {
    header("Location: ../project/project.php");
}

if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    unset($_SESSION['admin']);
    unset($_SESSION['superadmin']);
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit;
}
?>
<?php ob_end_flush(); ?>
