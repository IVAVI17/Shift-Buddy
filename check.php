<html>
<head>
    <title>PHP program to fetch data from database in & show in html table</title>
</head>
<body>

    <h3>Write a PHP program to fetch data from database and display in a HTML table in php</h3>
    <form action="check.php" method="post">
    <form action="form-handler.php" method="post">
Search <input type="text" name="search"><br>
<input type ="submit">
</form>
    <table border="2" bordercolor="blue" bgcolor="#00FF">
        <thead>
            <tr>
                <th>sr.no</th>
                <th>name</th>
                <th>regno</th>
                <th>time</th>
                <th>phone</th>
                <th>roomno</th>
                
            </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>

</body>
</html>