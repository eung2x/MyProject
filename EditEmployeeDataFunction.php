<?php
//SEARCH EMPLOYEE
if(isset($_POST["btnSearchEmployee"])){

    $txtEmpNoSearch = $_POST["txtEmpNoSearch"];
    if(!empty($txtEmpNoSearch)){
        $whereStatement = "WHERE EmpNo = '$txtEmpNoSearch' ";
    }
    else{
        $whereStatement = "";
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
        $header .= "<th>Status";
        $header .= "</th>";  
        $header .= "</tr>";

        echo  "$header";
        $tableData = " ";
    $sql = "SELECT * FROM employee $whereStatement";
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
                $tableData .= "<td>".$MonthlySalary;
                $tableData .= "</td>";
                $tableData .= "<td> <a href = 'ViewEmployeeData.php?Autokey=$Autokey'>Edit";
                $tableData .= "</td>";
                $tableData .= "</tr>";

        }

    }
    else{
        echo "<br> * No Records";
    }

    $tableData .= "</table>";
    

    echo  "$tableData";

    


}
//INSERT EMPLOYEE
// if(isset($_POST["btnInsertEmployee"])){
//     $txtEmpNo = addslashes($_POST["txtEmpNo"]);
//     $txtFirstName  = addslashes($_POST["txtFirstName"]);
//     $txtLastName = addslashes($_POST["txtLastName"]);
//     $opngender = addslashes($_POST["opngender"]);
//     $txtbirthday = addslashes($_POST["txtbirthday"]);
//     $txtMonthlySalary = addslashes($_POST["txtMonthlySalary"]);


//     $remarks = "";
//     if(empty($txtEmpNo)){
//         $remarks .= "* Employee Number is Empty <br>";
//     }
//     if(empty($txtFirstName)){
//         $remarks .= "* First Name is Empty <br>";
//     }
//     if(empty($txtLastName)){
//         $remarks .= "* Last Name is Empty <br>";
//     }
//     if(empty($opngender)){
//         $remarks .= "* Gender is not selected <br>";
//     }
//     if(empty($txtbirthday)){
//         $remarks .= "* Birth Day is not yet set <br>";
//     }
//     if(empty($txtMonthlySalary)){
//         $remarks .= "* Monthly Salary is Empty <br>";
//     }

//     if(empty($remarks)){
//         // Prepared insert
//         $stmt = $conn->prepare("INSERT INTO `employee` (EmpNo, FirstName, LastName, Gender, Birthday, MonthlySalary) VALUES (?, ?, ?, ?, ?, ?)");
//         $stmt->bind_param("isssss", $txtEmpNo, $txtFirstName,$txtLastName,$opngender,$txtbirthday,$txtMonthlySalary);

//         // Try to execute and handle duplicate
//         if ($stmt->execute()) {
//             $stateremarks = "User successfully added!";
//         } else {
//             if ($stmt->errno == 1062) {
//                 // 1062 = duplicate entry
//                 $stateremarks = "* The EmpNo you're trying to use is already taken by another Employee on the system <br>";
//             } else {
//                 $stateremarks = "Error: " . $stmt->error;
//             }
//         }

//         echo $stateremarks;

//         $stmt->close();
//     }else{
//         echo $remarks;
//     }

    
// }


?>