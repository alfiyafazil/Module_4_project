<?php      
    include('conn.php');
    session_start();
    if(isset($_POST['submit_email']))
    {
        $emailid = $_POST['emailid'];  
        //to prevent from mysqli injection  
        $emailid = stripcslashes($emailid);   
        $emailid = mysqli_real_escape_string($con, $emailid);  
        $sql = "select * from admin where emailid = '$emailid'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        foreach($result as $row)
				{
					$_SESSION["id"] = $row["id"];
					$_SESSION['emailid'] = $row["emailid"];
					$_SESSION["password"] = $row["password"];
				}
        if($count == 1)
        {  
            header("location: password.php");  
        }  
        else
        {  
            echo "<h1> This EmailID is not registered</h1>";
            
        }     
    }
    if(isset($_POST['submit_password']))
    {
        $password = $_POST['password'];
        $password = stripcslashes($password);
        $password = mysqli_real_escape_string($con, $password);
        if($_SESSION["password"]==$password)
        {
            $login_otp = rand(100000,999999);
            $_SESSION["otp"]=$login_otp;
            $recipientAddr = $_SESSION['emailid'];
            $subjectStr = '[TechData] Please verify your device';
            $mailBodyText = 'Dear User,
            
A sign in attempt requires further verification. 
To complete the sign in, enter the verification code given below.

Verification code: '.$login_otp.
'

Regards,
TechData';
            if(mail($recipientAddr,$subjectStr,$mailBodyText))
                {
                    header("location: otp.php"); 
                }
            else
                {
                    echo"Error in sending verification code";
                }
        }
        else
        {  
            echo "<h1> The password is incorrect</h1>";  
        }   
    }

    if(isset($_POST['submit_otp']))
    {
        $otp = $_POST['otp'];
        if($_SESSION["otp"]==$otp)
        {
            $emailid = $_SESSION['emailid'];
            $_SESSION['login_status']="yes";
            $ipaddress =  $_SERVER['REMOTE_ADDR'];
            function ExactBrowserName()
                {

                $ExactBrowserNameUA=$_SERVER['HTTP_USER_AGENT'];

                if (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "opr/")) {
                    // OPERA
                    $ExactBrowserNameBR="Opera";
                } elseIf (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "chrome/")) {
                    // CHROME
                    $ExactBrowserNameBR="Google Chrome";
                } elseIf (strpos(strtolower($ExactBrowserNameUA), "msie")) {
                    // INTERNET EXPLORER
                    $ExactBrowserNameBR="Internet Explorer";
                } elseIf (strpos(strtolower($ExactBrowserNameUA), "firefox/")) {
                    // FIREFOX
                    $ExactBrowserNameBR="Mozilla Firefox";
                } elseIf (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "opr/")==false and strpos(strtolower($ExactBrowserNameUA), "chrome/")==false) {
                    // SAFARI
                    $ExactBrowserNameBR="Safari";
                } else {
                    // OUT OF DATA
                    $ExactBrowserNameBR="Unknown Browser";
                };

                return $ExactBrowserNameBR;
                }
            $browser = ExactBrowserName();
            $sql = "INSERT INTO login_data (ipaddress, emailid, browser, time) 
            VALUES ('$ipaddress', '$emailid', '$browser',CURRENT_TIMESTAMP)";
            if($con->query($sql) === TRUE)
            {
                header("location: index.php");  
            }
        }
        else
        {
            echo "Wrong OTP, Login Failed";
            header("Refresh:3; url=../home.php");
        }
    }  
?>  