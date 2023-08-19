<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    // Redirect to the login page
    header("Location: prijava");
    exit(); // Stop further execution of the current page
}
?>