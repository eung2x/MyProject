<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME <?php echo $_SESSION["username"]; ?> </title>
</head>
<style>
    body {
        margin: 0px;
        padding: 5px;
    }
</style>
<form action = "main.php" method = "POST">
<body>
<h1>
   HELLO <?php echo $_SESSION["username"]; ?> ! Welcome to your homepage
</h1>
<div id = "divLeftPanel">
        &nbsp;
</div>

<div>
    <!-- <p>Username:
        <input type = "text" name = "txtUserName">
    </p>
    <p>Password :
        <input type = "password" name = "txtPassword">
    </p>
    <p>
        <input type = "submit" name = "btnLogin" value = "LOGIN"> 
    </p> -->
    <p>
        <p><a style = "color:gray; font-weight:bold;" href="employeedata.php">EMPLOYEE Data Maintenance</a></p>
    </p>
    <p>
        <p><a style = "color:gray; font-weight:bold;" href="summaryreport.php">EMPLOYEE Summary Report</a></p>
    </p>

    <p>
        <p><a style = "color:red; font-weight:bold;" href="logout.php">LOGOUT</a></p>
    </p>

    
</div>
<div id = "divRightPanel">  
        &nbsp;
</div>

</body>
</form>
</html>
<?php

?>