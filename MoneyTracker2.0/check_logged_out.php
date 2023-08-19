<?php
session_start();

// Check if the user is not logged in
if (isset($_SESSION['user'])) {
    // Redirect to index
    header("Location: index");
}
?>