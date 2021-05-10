<?php 
session_start();
if(empty($_SESSION['emailid'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>  
<head>  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>  
    <link rel = "stylesheet" type = "text/css" href = "../css/style.css"> 
      
</head>  
<body>  
    <div id="log_contain">
        <div id="left_div">
        <a id="log" href="home.php"><img id="logo" src="../images/logo.png"></a>
        </div>
        <div id="right_div">  
        <h1>ADMIN LOGIN</h1>  
        <form action = "verify.php" method = "POST">  
            <p>  
                <input type = "password" name  = "password" placeholder="Email Password"  required/>  
            </p>  
            <p>     
                <input type =  "submit" value = "Next" name="submit_password" id="sub_but"/> 
                <a href="home.php"><button type="button" id="cancel">Cancel</button></a> 
            </p>  
            
        </form>
        </div> 
    </div>  

</body>
</html>