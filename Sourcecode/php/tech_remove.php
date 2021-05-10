<?php 
include 'conn.php';
include 'header.php';

if($_GET['id']) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM companies WHERE id = {$id}";
    $result = $con->query($sql);

    $data = $result->fetch_assoc();

    $con->close();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Remove Company</title>
    </head>
    <body>
    <div id="remove">
        <h3 id="removeh1">Do you really want to remove this comany?</h3>
        <form action="tech_action.php" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
            <button type="submit" name="remove" id="confirm">Save Changes</button>
            <a href="index.php"><button type="button" id="cancell">Cancel</button></a>
        </form>
    </div>
    </body>
</html>

<?php
}
include 'footer.php';
?>