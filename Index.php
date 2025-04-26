<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME TO MY WEBSITE</title>
</head>
<style>
    body {
        margin: 0px;
        padding: 5px;
    }
</style>
<form action = "index.php" method = "POST">
<body>
<h1>
   HELLO WORLD!  Hi Welcome to my website
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
        <input type = "submit" name = "btnLogin" value = "LOGIN"> 
    </p>

    <p>

        <p>You dont have an Account?  <a href="SignUp.php">Sign-up</a></p>
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


    if(isset($_POST["btnLogin"] )){
        $txtUserName = addslashes($_POST["txtUserName"]);
        $txtPassword = addslashes($_POST["txtPassword"]);

        //checking Username and password
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        // Check and display results
        $username = array();
        $password = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $username[] = $row["UserName"];
                $password[] = $row["Password"];
                // echo $username ."<br>";

            }

        //check and validation for login
        $y = 0;
            for($x = 0; $x<count($username); $x++){
                if($username[$x] == $txtUserName){
                    if (password_verify($txtPassword, $password[$x])) {
                        include("login.php");
                    } else {
                        echo "Invalid password. <br>";
                    }
                    $y++;
                }
        
            }
            if($y==0){
                echo "* UserName and Password are incorrect <br>";
            }
        }
        else{
            echo " ";
        }

    }

?>