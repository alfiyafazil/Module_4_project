<?php include 'conn.php'; 
include 'header.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login History</title>
</head>
<body>
<script src="script.js"></script>
<div class="log">
    <h1>LOGIN HISTORY</h1>
    <table border="1" id="table">
        <thead>
            <tr>
                <th>Sl No</th>
                <th>Admin EmailID</th>
                <th>IP Address</th>
                <th>Browser</th>
                <th>Login Time</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM login_data";
            $result = $con->query($sql);
            if($result->num_rows > 0) {
                $i=1;
                while($row = $result->fetch_assoc()) {
            ?>
            <tr style='color:darkblue'>
                <td><?php echo $i ?></td>
                <td><?php echo $row['emailid']; ?></td>
                <td><?php echo $row['ipaddress']; ?></td>
                <td><?php echo $row['browser']; ?></td>
                <td><?php echo $row['time']; ?></td></tr>
            <?php $i++;}
            }
            else {
                echo "<tr style='color:darkblue'><td colspan='5'><center>No Data Avaliable</center></td></tr>";
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
include 'footer.php'; 
?>