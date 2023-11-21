<?php
session_start();

// Check if the user is not logged in, then redirect to login page
if (!isset($_SESSION['is_logged_in'])) {
    header("Location: login.php");

    exit();
}

?>