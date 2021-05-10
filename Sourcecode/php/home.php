<?php
    include 'conn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div>
        <a id="log" href="home.php"><img id="logo" src="../images/logo.png"></a>
        <a href="login.php"><button type="button" id='butt'>Admin Login</button></a>
        <div class="box">
            <form method="post" action="search.php" class="search" style="margin:auto;max-width:300px">
            <input type="search" name="searchh" placeholder="Search Companies here..." required/>
            <button type="submit" name="search" id="search"><i class="fa fa-search"></i></button><br/><br/>
            </form>
        </div>
            <table cellspacing="2" cellpadding="3" id="table">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Company Name</th>
                        <th>Logo</th>
                        <th>Founded</th>
                        <th>Founders</th>
                        <th>Headquarters</th>
                        <th>CEO</th>
                        <th>Stock Price ($)</th>
                        <th>No. of Employees</th>
                        <th>Products</th>
                        <th>Website</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM companies where active=1";
                    $result = $con->query($sql);
                    if($result->num_rows > 0) {
                        $i=1;
                        while($row = $result->fetch_assoc()) {
                    ?>
                    <tr style='color:darkblue'>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['com_name']; ?></td>
                        <td><img src="<?php echo $row['logo']; ?>" width=80 height=80></td>
                        <td><?php echo $row['founded']; ?></td>
                        <td><?php echo $row['founders']; ?></td>
                        <td><?php echo $row['headq']; ?></td>
                        <td><?php echo $row['ceo']; ?></td>
                        <td><?php echo $row['stock']; ?></td>
                        <td><?php echo $row['num_emp']; ?></td>
                        <td><?php echo $row['products']; ?></td>
                        <td><?php echo $row['web']; ?></td></tr>
                    <?php $i++;}
                    }
                    else {
                        echo "<tr style='color:darkblue'><td colspan='15'><center>No Data Avaliable</center></td></tr>";
                    }
                    ?>
                    </tbody>
                    </table>
                    <br/><br/>
                    <?php mysqli_close($con);  // close connection 
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
<?php
    include('footer.php');
?>