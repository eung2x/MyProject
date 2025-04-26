<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP PAGE</title>
</head>
<style>
    body {
        margin: 0px;
        padding: 5px;
    }
</style>
<form action = "SignUp.php" method = "POST">
<body>
<h1>
    Hi Welcome to my Sign Up page
</h1>
<div id = "divLeftPanel">
        &nbsp;
</div>

<div>
    <p>Username:
        <input type = "text" name = "txtUserName">
    </p>
    <p>Password :
        <input type = "password" name = "txtPassword">
    </p>
    <p>
        <input type = "submit" name = "btnSignUp" value ="SIGN UP"> 
    </p>

    <p>
        <p>Do you have already an Account?  <a href="index.php">Please Log in here!</a></p>
    </p>

    
</div>
<div id = "divRightPanel">  
        &nbsp;
</div>

</body>
</form>
</html>
<?php

#dbs connection
include("dbConnection.php");

if(isset($_POST["btnSignUp"])){

$txtUserName = addslashes($_POST["txtUserName"]);
$txtPassword = addslashes($_POST["txtPassword"]);

if (empty($txtUserName) || empty($txtPassword)) {
    echo "* Username and Password cannot be empty <br>";
} else {

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Check and display results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $username[] = $row["UserName"];
        // echo $username ."<br>";

    }

// validation if there is a same username exists {}
$y = 0;
for($x = 0; $x < count($username); $x++){
    if($username[$x] == $txtUserName){
        $y++;
    }
}
if($y > 0){
    echo "* The username you're trying to use is already taken by another user or account on the system <br>";
}
else{

    // Prepared insert
    $hashedPassword = password_hash($txtPassword , PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (UserName, Password) VALUES (?, ?)");
    $stmt->bind_param("ss", $txtUserName, $hashedPassword);

    // Try to execute and handle duplicate
    if ($stmt->execute()) {
        $remarks = "User successfully added!";
    } else {
        if ($stmt->errno == 1062) {
            // 1062 = duplicate entry
            $remarks = "* The username you're trying to use is already taken by another user or account on the system <br>";
        } else {
            $remarks = "Error: " . $stmt->error;
        }
    }

    echo $remarks;

    $stmt->close();



}
} else {
    // Prepared insert
    $hashedPassword = password_hash($txtPassword , PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (UserName, Password) VALUES (?, ?)");
    $stmt->bind_param("ss", $txtUserName, $hashedPassword);

    // Try to execute and handle duplicate
    if ($stmt->execute()) {
        $remarks = "User successfully added!";
    } else {
        if ($stmt->errno == 1062) {
            // 1062 = duplicate entry
            $remarks = "* The username you're trying to use is already taken by another user or account on the system <br>";
        } else {
            $remarks = "Error: " . $stmt->error;
        }
    }

    echo $remarks;

    $stmt->close();
}
}
}else{
    echo "<br>PLEASE SIGN UP";
}
$conn->close();

?>