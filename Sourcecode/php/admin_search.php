<?php include 'conn.php';
include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="900;url=logout.php" />
    <title>Search Results</title>
</head>
<body>
<script src="script.js"></script>
<div>
    <h1 id="search_head">SEARCH RESULTS</h1>
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
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if(isset($_POST['search']))
            {
            $search=$_POST['searchh'];
            $sql = "SELECT * FROM companies WHERE com_name like '%$search%' AND active=1";
            $result = $con->query($sql);
            if($result->num_rows > 0) {
                $i=1;
                while($row = $result->fetch_assoc()) {
            ?>
            <tr style='color:darkblue'>
                <td><?php echo $i ?></td>
                <td><?php echo $row['com_name']; ?></td>
                <td><img src="<?php echo $row['logo']; ?>" width=100 height=100></td>
                <td><?php echo $row['founded']; ?></td>
                <td><?php echo $row['founders']; ?></td>
                <td><?php echo $row['headq']; ?></td>
                <td><?php echo $row['ceo']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><?php echo $row['num_emp']; ?></td>
                <td><?php echo $row['products']; ?></td>
                <td><?php echo $row['web']; ?></td>
                <?php echo "<td>
                <a href='tech_edit.php?id=".$row['id']."'><i class='fa fa-edit' style='color:darkblue;'></i></a>
                <a href='tech_remove.php?id=".$row['id']."'><i class='fa fa-trash' style='color:darkblue;'></i></a>
                        </td>
            </tr>" ?>
            <?php $i++;}
            }
            else {
                echo "<tr style='color:darkblue'><td colspan='12'><center>No Data Avaliable</center></td></tr>";
            }
            }
            ?>
            </tbody>
            </table>
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