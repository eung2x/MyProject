<?php
include("dbConnection.php");

if (isset($_GET['Autokey'])) {
    $autokey = $_GET['Autokey'];

    $sql = "DELETE FROM employee WHERE Autokey = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $autokey);

    if ($stmt->execute()) {
        echo "<script>
            alert('Record deleted successfully!');
            window.location.href = 'EditEmployeeData.php';
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>