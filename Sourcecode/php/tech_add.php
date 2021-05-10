<?php include 'conn.php';
include 'header.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Details</title>
    <link href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/wtf-forms.css" rel="stylesheet">
</head>
<body>
<div id="register">
<h1>ADD A TECH COMPANY</h1>
    <!-- Registration Form -->
    <form action="tech_action.php" method="POST" enctype="multipart/form-data" class="details">
        <label>Company Name </label><br/>
        <input type="text" name="com_name" placeholder="Company Name" required>  <br/>
        <label> Logo </label><br/><br/>
        <label class="file" style="width:40%">
        <input type="file" id="file" aria-label="File browser example" name="logo" required onchange="imgvalidation()">
        <span class="file-custom"></span></label><br/><br/>
        <label> Founded </label><br/>
        <input type="date" name="founded" placeholder="Founded" required> <br/>
        <label>Founders </label> <br/>
        <input type="text" name="founders" placeholder="Founders" required><br/>
        <label>Headquarters </label><br/>
        <input type="text" name="hq" placeholder="Headquarters" required><br/>
        <label>CEO </label><br/>
        <input type="text" name="ceo" placeholder="CEO" required><br/>
        <label>Stock Price ($)</label><br/>
        <input type="text" name="stock" placeholder="Stock Price" required><br/>
        <label>No. of employees </label><br/>
        <input type="text" name="num" placeholder="No. of Employees" required><br/>
        <label>Products </label><br/>
        <input type="text" name="products" placeholder="Products" required><br/>
        <label>Website </label><br/>
        <input type="text" name="web" placeholder="Website" required><br/><br/>
        <input id="submit" value="Add" type="submit" name="add">   
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
include 'footer.php'; 
?>