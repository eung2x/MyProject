<?php session_start();
#dbs connection
include("dbConnection.php");
$Employeekey = $_GET["Autokey"];
    $sql = "SELECT * FROM employee where Autokey = '$Employeekey' ";
    $result = $conn->query($sql);
    // Check and display results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $employeeNo = $row["EmpNo"];
            $FirstName = $row["FirstName"];
            $LastName = $row["LastName"];
            $Gender = $row["Gender"];
            $Birthday = $row["Birthday"];
            $MonthlySalary = $row["MonthlySalary"];
            $Autokey = $row["Autokey"];


        }

    }
    else{
        echo "<br> * No Records";
    }





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
<form action = "ViewEmployeeData.php" method = "POST">
<body>
<h1>
   HELLO <?php echo $_SESSION["username"]; ?> ! Welcome to Employee Data Maintenance
</h1>
<div id = "divLeftPanel">
        &nbsp;
</div>

<div>
    <p>
        <p><a style = "color:gray; font-weight:bold;" href="EditEmployeeData.php">SEARCH EMPLOYEE DATA</a></p>
    </p>
    <p>
        <p><a style = "color:gray; font-weight:bold;" href="main.php">Main Page</a></p>
    </p>


    
</div>
<div>

    <h1>Employee Data </h1>
    <p>
    <h3> Employee No. <?php echo $employeeNo;?></h3>
    </p>
    <p>
        First Name: <Input type = "text" name = "txtFirstName" value = "<?php echo $FirstName;?>">
    </p>
    <p>
        Last Name: <Input type = "text" name = "txtLastName" value = "<?php echo $LastName;?>">
    </p>
    <p>
        Gender:
        <br>
        <label>
        <input type="radio" name="opngender" value="Male" <?php if($Gender == 'Male') echo 'checked';?> > Male
        </label><br>

        <label>
            <input type="radio" name="opngender" value="Female" <?php if($Gender == 'Female') echo 'checked';?> > Female
        </label><br>
    </p>
    <p>
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="txtbirthday"  value = "<?php echo $Birthday;?>" >
    </p>
    <p>
        Monthly Salary: <Input type = "text" name = "txtMonthlySalary"  value = "<?php echo $MonthlySalary;?>">
    </p>
    
    <p>
        <input type = "submit" name = "btnUpdateEmployee" value = "Update Employee">
    </p>
    <p>
    <a style = "color:red;" href="DeleteEmployeeData.php?Autokey=<?php echo $Employeekey; ?>" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</a>
    </p>

</div>

<div id = "divRightPanel">  
        &nbsp;
</div>

</body>
<input type = "hidden" name = "txtEmployeekey" value = "<?php echo $Employeekey;?>">
</form>
</html>
<?php
    include("ViewEmployeeDataFunction.php");
?>