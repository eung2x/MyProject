<?php
// Destroy the session to log out
session_unset();  // Clear all session variables
session_destroy();  // Destroy the session
    header("Location: index.php"); 
?>  