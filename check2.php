<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=*UTF-8*>
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>LINK BUDDY</title>
    <link rel="stylesheet" href="stylenew.css">
</head>
<body>
    <div class="banner">
    <img  class="layer-1" src="img/bg.png">
    <img class="layer-2" src="img/meteor.png">

<div class="layer-3">
    <h1>Hello &amp; Welcome</h1>
    <p>YOUR TIME TO SHIFT !  </p>
    <a href="#teks">SEARCH</a>
</div>



    <img class="layer-4" src="img/4.png">
    <img  class="layer-5" src="img/5.png">
    <img  src="img/6.png">
    </div>
<div class="content">
    <h1>SHIFT BUDDY</h1>
    <p>   <br>Welcome to ShiftBuddy ultimate solution for all your hostel room shifting woes! Are you tired of the hassle and uncertainty that comes with shifting to a new hostel room? Look no further than ShiftBuddy
        Here, you can easily check when the older occupants of your new room will be moving out, giving you the peace of mind and certainty you need when making such an important decision of when to shift from your room. Say goodbye to the stress of moving and hello to ShiftBuddy, your new best friend in the world of room shifting!</p>
        <p> <br>At ShiftBuddy, you'll get instant access to all the information you need about when the older occupants of your new room will be vacating it.</p>
           
           <div class="content1" id="teks">
            <h1>SEARCH</h1>
           
            <form action="check2.php" method="post">
                <form action="form-handler.php" method="post">
            <input type="text" name="search"><br>
            <input type ="submit" class="login-button">
            </form>
            <div style="overflow-x:auto;">
            <table border="1" bordercolor="#7ff5ff" bgcolor="#514c9c" >
                <thead>
                    <tr>
                        <th>SR.NO</th>
                        <th>NAME</th>
                        <th>REG NO.</th>
                        <th>TIME OF VACATING</th>
                        <th>PHONE NO.</th>
                        <th>ROOM NO.</th>
                        
                    </tr>
                </thead>
           </div>
          
        </form>
        </div>
        <?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
        <?php
        if(isset($_POST['search'])){
        $search = $_POST['search'];
        
            $connection = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($connection,"shiftbuddy");

            $query = mysqli_query($connection,"SELECT * FROM  userdata where roomno like '%$search%'");

            if (mysqli_num_rows($query)==0)
            {
                echo "<tr>
                        <td colspan='4'> No rows returned </td> 
                    </tr>";
            }
            else
            {
                while($row=mysqli_fetch_row($query))
                {
                    echo "<tr>
                            <td> $row[0] </td> 
                            <td> $row[1] </td>
                            <td> $row[3] </td> 
                            <td> $row[4] </td> 
                            <td> $row[5] </td> 
                            <td> $row[6] </td> 
                        </tr> ";
                }
            }
        }
        ?>
       

<script type="text/javascript">
    let layer_1 = document.querySelector('.layer-1');
    let layer_2 = document.querySelector('.layer-2');
    let layer_3 = document.querySelector('.layer-3');
    let layer_4 = document.querySelector('.layer-4');
    let layer_5 = document.querySelector('.layer-5');

  window.onscroll = function(){
    let Y = window.scrollY;

    layer_1.style.transform = 'translateY('+ Y/1.5 +'px)';
    layer_2.style.transform = 'translateY('+ Y/2 +'px)';
    layer_3.style.transform = 'translateY('+ Y/1.5 +'px)';
    layer_4.style.transform = 'translateY('+ Y/2 +'px)';
    layer_5.style.transform = 'translateY('+ Y/3 +'px)';
  }
</script>
</table>
</div>
<br>
<div class="form">
           <a href="logout.php" class="hero-btn red-btn">LOG OUT</a>
    </div>
</div>
</div>
</body>
</html>