<?php
session_start();

// Destroy the session and all session data
session_destroy();

header("Location: prijava.php");
exit();
?>