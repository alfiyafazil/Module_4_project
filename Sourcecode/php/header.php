<?php
    include('conn.php');
    session_start();
    if(empty($_SESSION['login_status'])) {
        header("location: home.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="refresh" content="900;url=logout.php" />
        <link href="../css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <a id="log" href="index.php"><img id="logo" src="../images/logo.png"></a>
        <a href="logout.php"><button type="button" id='butt'>Logout</button></a>
        <a href="log_history.php"><button type="button" id='butt'>Login History</button></a>
    </body>
</html>