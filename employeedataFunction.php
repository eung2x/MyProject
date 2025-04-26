<?php
//SEARCH EMPLOYEE
if(isset($_POST["btnSearchEmployee"])){
    header("location: EditEmployeeData.php");


}
//INSERT EMPLOYEE
if(isset($_POST["btnInsertEmployee"])){
    $txtEmpNo = addslashes($_POST["txtEmpNo"]);
    $txtFirstName  = addslashes($_POST["txtFirstName"]);
    $txtLastName = addslashes($_POST["txtLastName"]);
    $opngender = addslashes($_POST["opngender"]);
    $txtbirthday = addslashes($_POST["txtbirthday"]);
    $txtMonthlySalary = addslashes($_POST["txtMonthlySalary"]);


    $remarks = "";
    if(empty($txtEmpNo)){
        $remarks .= "* Employee Number is Empty <br>";
    }
    if(empty($txtFirstName)){
        $remarks .= "* First Name is Empty <br>";
    }
    if(empty($txtLastName)){
        $remarks .= "* Last Name is Empty <br>";
    }
    if(empty($opngender)){
        $remarks .= "* Gender is not selected <br>";
    }
    if(empty($txtbirthday)){
        $remarks .= "* Birth Day is not yet set <br>";
    }
    if(empty($txtMonthlySalary)){
        $remarks .= "* Monthly Salary is Empty <br>";
    }

    if(empty($remarks)){
        // Prepared insert
        $stmt = $conn->prepare("INSERT INTO `employee` (EmpNo, FirstName, LastName, Gender, Birthday, MonthlySalary) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $txtEmpNo, $txtFirstName,$txtLastName,$opngender,$txtbirthday,$txtMonthlySalary);

        // Try to execute and handle duplicate
        if ($stmt->execute()) {
            $stateremarks = "User successfully added!";
        } else {
            if ($stmt->errno == 1062) {
                // 1062 = duplicate entry
                $stateremarks = "* The EmpNo you're trying to use is already taken by another Employee on the system <br>";
            } else {
                $stateremarks = "Error: " . $stmt->error;
            }
        }

        echo $stateremarks;

        $stmt->close();
    }else{
        echo $remarks;
    }

    
}


?>