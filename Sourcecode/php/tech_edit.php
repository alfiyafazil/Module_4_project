<?php include 'conn.php'; 
include 'header.php'; 
if($_GET['id']) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM companies WHERE id = {$id}";
    $result = $con->query($sql);

    $data = $result->fetch_assoc();

    $con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Details</title>
    <link href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/wtf-forms.css" rel="stylesheet">
</head>
<body>
<div id="register">
<h1>EDIT COMPANY DETAILS</h1>
    <!-- Registration Form -->
    <form action="tech_action.php" method="POST" enctype="multipart/form-data" class="details">
        <label>Company Name </label><br/>
        <input type="text" name="com_name" placeholder="Company Name" value="<?php echo $data['com_name']?>" required >  <br/>
        <label> Logo </label><br/><br/>
        <label class="file" style="width:40%">
        <input type="file" id="file" aria-label="File browser example" name="logo" value="<?php echo $data['logo']?>" required onchange="imgvalidation()">
        <span class="file-custom"></span></label><br/><br/>
        <label> Founded </label><br/>
        <input type="date" name="founded" placeholder="Founded" value="<?php echo $data['founded']?>" required> <br/>
        <label>Founders </label> <br/>
        <input type="text" name="founders" placeholder="Founders" value="<?php echo $data['founders']?>" required><br/>
        <label>Headquarters </label><br/>
        <input type="text" name="hq" placeholder="Headquarters" value="<?php echo $data['headq']?>" required><br/>
        <label>CEO </label><br/>
        <input type="text" name="ceo" placeholder="CEO" value="<?php echo $data['ceo']?>" required><br/>
        <label>Stock Price </label><br/>
        <input type="text" name="stock" placeholder="Stock Price" value="<?php echo $data['stock']?>" required><br/>
        <label>No. of employees </label><br/>
        <input type="text" name="num" placeholder="No. of Employees" value="<?php echo $data['num_emp']?>" required><br/>
        <label>Products </label><br/>
        <input type="text" name="products" placeholder="Products" value="<?php echo $data['products']?>" required><br/>
        <label>Website </label><br/>
        <input type="text" name="web" placeholder="Website" value="<?php echo $data['web']?>" required><br/><br/>
        <input type="hidden" name="id" value="<?php echo $data['id']?>" />
        <input id="submit" value="Update" type="submit" name="edit">   
        <a href="index.php"><button type="button" id="canceladd">Cancel</button></a>
        <br><br>
    </form>
</div>

<script>
function imgvalidation() { 
    const imginput =  document.getElementById('logo'); 
      
    const imgpath = imginput.value; 
  
    // Allowing file type 
    const imgextensions =  
            /(\.jpg|\.jpeg|\.png)$/i; 
      
    if (imgextensions.exec(imgpath)) { 
        if (imginput.files[0].size > 102400) // file size condition
        {
            alert( "File too Big, please select a file less than or equal to 100KB");
            imginput.value = ''; 
            return false;
        } 
    } 
    
    else { 
        alert('Invalid file type, upload jpg, jpeg or png files only'); 
        imginput.value = ''; 
        return false;
         
    }  
    }    
</script>
</body>
</html>
<?php
}
include 'footer.php'; 
?>