<?php 
session_start();
if(empty($_SESSION['password'])) {
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
                <input type = "text" name  = "otp" placeholder="Email OTP"  required/><br/><span style="font-size:15px;margin-left:20px;color:brown;">Enter the OTP sent to your Email</span>
            </p>  
            <p>     
                <input type =  "submit" value = "Login" name="submit_otp" id="sub_but"/> 
                <a href="home.php"><button type="button" id="cancel">Cancel</button></a> 
            </p>  
            
        </form>
        </div> 
    </div>  

</body>
</html>