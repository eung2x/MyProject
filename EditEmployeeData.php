<?php session_start();
#dbs connection
include("dbConnection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data Maintenance </title>
</head>
<style>
    body {
        margin: 0px;
        padding: 5px;
    }
</style>
<form action = "EditEmployeeData.php" method = "POST">
<body>
<h1>
   HELLO <?php echo $_SESSION["username"]; ?> ! Welcome to Employee Data Maintenance
</h1>
<div id = "divLeftPanel">
        &nbsp;
</div>

<div>
    <p>
        <p><a style = "color:gray; font-weight:bold;" href="employeedata.php">EMPLOYEE Data Maintenance</a></p>
    </p>
    <p>
        <p><a style = "color:gray; font-weight:bold;" href="main.php">Main Page</a></p>
    </p>


    
</div>
<div>

    <h1>Search Employee </h1>
    <p style = "color:red;">* if you forgot your employee number , just click the button Search Employee to view all Employees</p>
    <p>
        Employee No: <Input type = "text" name = "txtEmpNoSearch">
    </p>
    <p>
        <Input type = "submit" name = "btnSearchEmployee" value = "Search Employee">
    </p>

</div>

<div id = "divRightPanel">  
        &nbsp;
</div>

</body>
</form>
</html>
<?php
    include("EditEmployeeDataFunction.php");
?>