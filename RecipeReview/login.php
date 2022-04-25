<?php
$validate = true;
$uname = "";
$pswd = "";
$error = "";

if(isset($_SESSION["uname"]))
	{           
    header("Location: recipelist.php");
    exit(); //exit the script as soon as you redirect the page.
}


if (isset($_POST["submitted"]) && $_POST["submitted"]) {
    $uname = trim($_POST["user"]);
    $password = trim($_POST["pswd"]);
    
    $db = new mysqli("localhost", "gds412", "Iamgreg5", "gds412");
    if ($db->connect_error) {
        die ("Connection failed: " . $db->connect_error);
    }

    $q = "SELECT * FROM user WHERE user_name = '$uname' AND user_password = '$pswd'";
       
    $r = $db->query($q);

    $row = $r->fetch_assoc();
    if($uname != $row["user_name"] && $pswd != $row["user_password"]) {
        $validate = false;
        echo "dont match?";

    } 
    
    if($validate == true) {
        session_start();
        $_SESSION["uname"] = $uname;
        header("Location: recipelist.php");
        $db->close();
        exit();

    } else {
        $error = "The email/password combination was incorrect. Login failed.";
        $db->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="recipestyle.css">
    <!-- <script type="text/javascript" src="login.js"> </script> -->
</head>
<body id="altback">
    
    <br>
    <form id="fr" action="login.php" method="post">
        <input type="hidden" name="submitted" value="1">
        <h1 id="ct">Log In </h1>

        <label for="user" id="msg_user"></label><br>
        <label for="user">Username:</label><br>
        <input id="user" type="text" name="user"><br><br>
        
        <label for="pswd" id="msg_pswd"></label><br>
        <label for="pswd">Password:</label><br>
        <input id="pswd" type="password" name="pswd"><br><br><br>

        <button type="submit" class="button">Log In</button>
        <a href="http://www2.cs.uregina.ca/~gds412/as1/signup.php" style="color: #FDD4C9;">Sign Up</a>
    </form>
    <!-- <script type="text/javascript" src="login-r.js"></script> -->
</body>
</html>