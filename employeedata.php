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

<body>
<h1>
   HELLO <?php echo $_SESSION["username"]; ?> ! Welcome to Employee Data Maintenance
</h1>
<form action = "employeedata.php" method = "POST">
<div id = "divLeftPanel">
        &nbsp;
</div>

<div>
    <p>
        <p><a style = "color:gray; font-weight:bold;"  href="employeedata.php">EMPLOYEE Data Maintenance</a></p>
    </p>
    <p>
        <p><a style = "color:gray; font-weight:bold;"  href="summaryreport.php">EMPLOYEE Summary Report</a></p>
    </p>

    <p>
        <p><a style = "color:gray; font-weight:bold;"  href="main.php">Main Page</a></p>
    </p>
    <p>
        <p><a style = "color:red; font-weight:bold;" href="logout.php">LOGOUT</a></p>
    </p>

    
</div>
<div>

    <h1>Search Employee </h1>

    <p>
        <Input type = "submit" name = "btnSearchEmployee" value = "SEARCH EMPLOYEE">
    </p>

</div>
<div>

    <h1>Insert Employee </h1>


    <p>
        Employee No: <Input type = "text" name = "txtEmpNo">
    </p>
    <p>
        First Name: <Input type = "text" name = "txtFirstName">
    </p>
    <p>
        Last Name: <Input type = "text" name = "txtLastName">
    </p>
    <p>
        Gender:
        <br>
        <label>
        <input type="radio" name="opngender" value="Male" checked > Male
        </label><br>

        <label>
            <input type="radio" name="opngender" value="Female" > Female
        </label><br>
    </p>
    <p>
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="txtbirthday" >
    </p>
    <p>
        Monthly Salary: <Input type = "text" name = "txtMonthlySalary">
    </p>
    
    <p>
        <input type = "submit" name = "btnInsertEmployee" value = "Insert Employee">
    </p>

</div>

<div id = "divRightPanel">  
        &nbsp;
</div>

</body>
</form>
</html>
<?php
    include("employeedataFunction.php");
?>