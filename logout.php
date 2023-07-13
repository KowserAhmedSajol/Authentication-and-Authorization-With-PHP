<?php

session_start();

session_unset();
session_destroy();
header("location: login_simple.php");
if(isset($_COOKIE['email'])){
    setcookie("email", $email, time() - 10);
}
exit;
?>