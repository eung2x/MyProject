<?php session_start();
#dbs connection
include("dbConnection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary Report</title>
</head>
<style>
    body {
        margin: 0px;
        padding: 5px;
    }
</style>
<form action = "summaryreport.php" method = "POST">
<body>
<h1>
   HELLO <?php echo $_SESSION["username"]; ?> ! Welcome to your Summary Report
</h1>
<div id = "divLeftPanel">
        &nbsp;
</div>

<div>

    <p>
        <p><a style = "color:gray; font-weight:bold;" href="employeedata.php">EMPLOYEE Data Maintenance</a></p>
    </p>
    <p>
        <p><a style = "color:gray; font-weight:bold;" href="summaryreport.php">EMPLOYEE Summary Report</a></p>
    </p>

    <p>
        <p><a style = "color:gray; font-weight:bold;" href="main.php">Main Page</a></p>
    </p>
    <p>
        <p><a style = "color:red; font-weight:bold;" href="logout.php">LOGOUT</a></p>
    </p>

    
</div>


<div>

    <h1>Summary Report</h1>
    
</div>

<div id = "divRightPanel">  
        &nbsp;
</div>

</body>
</form>
</html>
<?php

$sql = "SELECT AVG(TIMESTAMPDIFF(YEAR, STR_TO_DATE(Birthday, '%Y-%m-%d'), CURDATE())) AS AverageAge FROM employee";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc()) {
    $averageAge = round($row['AverageAge'], 2);

}

$header = "<table border = '1' >";
    $header .= "<tr>";    
        $header .= "<th>Employee Nmumber";
        $header .= "</th>";  
        $header .= "<th>First Name";
        $header .= "</th>";  
        $header .= "<th>Last Name";
        $header .= "</th>";  
        $header .= "<th>Gender";
        $header .= "</th>";  
        $header .= "<th>BirthDay";
        $header .= "</th>";  
        $header .= "<th>Monthly Salary";
        $header .= "</th>";  
        $header .= "</tr>";

        echo  "$header";
        $tableData = " ";
    $sql = "SELECT * FROM employee ";
    $result = $conn->query($sql);
    // Check and display results
    $countMale = 0;
    $countFemale = 0;
    $totalSumofMonthlySalary = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $employeeNo = $row["EmpNo"];
            $FirstName = $row["FirstName"];
            $LastName = $row["LastName"];
            $Gender = $row["Gender"];
            $Birthday = $row["Birthday"];
            $MonthlySalary = $row["MonthlySalary"];
            $Autokey = $row["Autokey"];

              $tableData .= "<tr>";
                $tableData .= "<td>".$employeeNo;
                $tableData .= "</td>";
                $tableData .= "<td>".$FirstName;
                $tableData .= "</td>";
                $tableData .= "<td>".$LastName;
                $tableData .= "</td>";
                $tableData .= "<td>".$Gender;
                $tableData .= "</td>";
                $tableData .= "<td>".$Birthday;
                $tableData .= "</td>";
                $tableData .= "<td>".number_format($MonthlySalary,2);
                $tableData .= "</td>";
                $tableData .= "</tr>";
                if($Gender == "Male"){
                    $countMale++;
                }
                if($Gender == "Female"){
                    $countFemale++;
                }
                $totalSumofMonthlySalary =$totalSumofMonthlySalary + $MonthlySalary;
        }
        echo "<h3>Average Age: " .$averageAge ."<br>";
        echo "Count of Male : ".$countMale. "<br>";
        echo "Count of Female : ".$countFemale. "<br>";
        echo "Overall Total Monthly Salary : ".number_format($totalSumofMonthlySalary,2)." </h3><br>";
    }
    else{
        echo "<br> * No Records";
    }

    $tableData .= "</table>";
    

    echo  "$tableData";


?>