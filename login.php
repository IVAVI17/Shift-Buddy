<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="stylenew.css"/>
</head>
<body>
    <form action="login.php" method="post">
    <form action="auth_session.php" method="post">
    <form action="form-handler.php" method="post">
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['name'])) {
        $name = stripslashes($_REQUEST['name']);    // removes backslashes
        $name = mysqli_real_escape_string($con, $name);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `userdata` WHERE name='$name'
                     AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['name'] = $name;
            // Redirect to user dashboard page
            header("Location: check2.php");
        } else {
            echo
            header("Location: logout.html");
            
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="name" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link">Don't have an account? <a href="index.html">Registration Now</a></p>
  </form>
<?php
    }
?>
</body>
</html>
