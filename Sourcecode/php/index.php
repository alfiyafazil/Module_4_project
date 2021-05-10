<?php
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="900;url=logout.php" />
    <title>Tech Collection</title>
</head>
<body>
<div>
        <div class="box_contain">
            <div class="box1">
            <form method="post" action="admin_search.php" class="admin_search" style="margin:auto;max-width:300px">
            <input type="search" name="searchh" placeholder="Search Companies here..." required/>
            <button type="submit" name="search" id="search"><i class="fa fa-search"></i></button>
            </form>
            </div>
            <div class="box2">
            <a href="tech_add.php"><button type="button" id="add_com">Add Company</button></a>
            </div>
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
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM companies WHERE active=1";
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
                <a href='tech_edit.php?id=".$row['id']."'><i class='fa fa-edit' style='color:darkblue'></i></a>
                <a href='tech_remove.php?id=".$row['id']."'><i class='fa fa-trash' style='color:darkblue'></i></a>
                        </td>
            </tr>" ?>
            <?php $i++;}
            }
            else {
                echo "<tr style='color:darkblue'><td colspan='12'><center>No Data Avaliable</center></td></tr>";
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
    include('footer.php');
?>