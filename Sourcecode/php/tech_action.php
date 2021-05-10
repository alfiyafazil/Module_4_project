<?php
include('conn.php');
include('header.php');
     if(isset($_POST["add"]))
    {
        $com_name = $_POST["com_name"];
        $founded = $_POST["founded"];
        $founders = $_POST["founders"];
        $headq = $_POST["hq"];
        $ceo = $_POST["ceo"];
        $stock = $_POST["stock"];
        $num = $_POST["num"];
        $products = $_POST["products"];
        $web = $_POST["web"];
        $logoname = $_FILES["logo"]["name"];
        $logofolder = "./logos/".$logoname;
        $logo_db = "logos/".$logoname;
        move_uploaded_file($_FILES["logo"]["tmp_name"],$logofolder);
        $sql = "INSERT INTO companies(com_name,logo,founded,founders,headq,ceo,stock,num_emp,products,web,active) 
        VALUES('$com_name','$logo_db','$founded','$founders','$headq','$ceo','$stock','$num','$products','$web',1)";
        if ($con->query($sql)) {
          echo '<div id="add"><h3 id="addh1">New Company Added Successfully</h3>';
          echo "<a href='index.php'><button id='ok' type='button'>OK</button></a></div>";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
          }
    }
    if(isset($_POST["edit"]))
    {
        $id = $_POST['id'];
        $com_name = $_POST["com_name"];
        $founded = $_POST["founded"];
        $founders = $_POST["founders"];
        $headq = $_POST["hq"];
        $ceo = $_POST["ceo"];
        $stock = $_POST["stock"];
        $num = $_POST["num"];
        $products = $_POST["products"];
        $web = $_POST["web"];
        $logoname = $_FILES["logo"]["name"];   
        $logofolder = "./logos/".$logoname; 
        $logo_db = "logos/".$logoname; 
        move_uploaded_file($_FILES["logo"]["tmp_name"],$logofolder);   
        $sql = "UPDATE companies SET com_name='$com_name',logo='$logo_db',founded='$founded',founders='$founders',headq='$headq',ceo='$ceo',stock='$stock',num_emp='$num',products='$products',
        web='$web' WHERE id = {$id}";
        if ($con->query($sql)) {
          echo '<div id="add"><h3 id="addh1">Details Updated Successfully</h3>';
          echo "<a href='index.php'><button id='ok' type='button'>OK</button></a></div>";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
          }
    }
    if(isset($_POST["remove"]))
    {
        $id = $_POST['id'];
    
        $sql = "UPDATE companies SET active = 2 WHERE id = {$id}"; // executing update query
        if($con->query($sql) === TRUE) {
          echo '<div id="add"><h3 id="addh1">Company Removed!</h3>';
          echo "<a href='index.php'><button id='ok' type='button'>OK</button></a></div>";
        } else {
            echo "Error updating record : " . $con->error;
        }
    }
    mysqli_close($con);
include('footer.php');
?>