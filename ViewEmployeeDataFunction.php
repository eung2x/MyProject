<?php 

if(isset($_POST["btnUpdateEmployee"])){
    $txtEmployeekey = $_POST["txtEmployeekey"];
    $txtFirstName  = addslashes($_POST["txtFirstName"]);
    $txtLastName = addslashes($_POST["txtLastName"]);
    $opngender = addslashes($_POST["opngender"]);
    $txtbirthday = addslashes($_POST["txtbirthday"]);
    $txtMonthlySalary = addslashes($_POST["txtMonthlySalary"]);
    echo $txtEmployeekey;
    // exit;
    $sql = "UPDATE employee SET FirstName = ?, LastName = ? ,Gender = ?, Birthday = ?, MonthlySalary = ? WHERE Autokey = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $txtFirstName, $txtLastName, $opngender, $txtbirthday,$txtMonthlySalary,$txtEmployeekey);
    if ($stmt->execute()) {
    echo "<script>
    alert('Update successful!');
    window.location.href = '".$_SERVER['PHP_SELF']."?Autokey=$txtEmployeekey';
</script>";
    } else {
      echo "Error: " . $stmt->error;
    }


}


?>