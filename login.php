<?php
session_start();
    $_SESSION["username"] = $username[$x];
    header("Location: main.php"); 
?>  