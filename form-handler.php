<html>
    <body>
    <form action="form-handler.php" method="post">
                <form action="login.php" method="post">
                    <form action="auth_session" method="post">
                    
                
            <input type="text" name="name" placeholder="Enter your name" required>
                <input type="password" name="password" placeholder="Enter password" required>
                <input type="text" name="regno" placeholder="Enter your Registeration Number" required>
                <input type="text" name="time" placeholder="Enter time you are shifting in" required>
                <input type="phone" name="phone" placeholder="Enter your Phone Number" required>
                <input type="text" name="roomno" placeholder="Enter room number you want are shifting in" required>
                <button type="submit" class="hero-btn red-btn">Send Message</button>
            </form>

<?php
require('db.php');
$name = $_POST['name'];
$password = $_POST['password'];
$regno = $_POST['regno'];
$time = $_POST['time'];
$phone = $_POST['phone'];
$roomno = $_POST['roomno'];

if(!empty($name) || !empty($password) || !empty($regno) || !empty($roomno) || !empty($time)
|| !empty($phone)) {


$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "shiftbuddy";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if(mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_error().')'.mysqli_connect_error());
}else{
    $SELECT = "SELECT regno From userdata Where regno = ? Limit 1";
    $INSERT = "INSERT Into userdata (name, password,regno,time,phone,roomno) values(?, ?, ? ,? ,? ,?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $regno);
    $stmt -> execute();
    $stmt->bind_result($regno);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

        if($rnum==0){
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssssss", $name, $password, $regno, $time, $phone, $roomno);
        $stmt ->execute();
        echo "New record inserted";
        header('Location: login.php');
    } else{
        echo "someone has already regsitered using the same regno";
    }
    $stmt->close();
    $conn->close();

}

    }else{
    echo "All fields are required";
    die();
}
 

?>
</body>
</html>


   



