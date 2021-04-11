<?php
session_start();
    if(!empty($_SESSION['report']) ){
        echo "<h3 class='alert alert-primary'>".$_SESSION['report']."</h3>";
        session_unset(); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Page</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
    <h1>Reset your password here</h1>
    <form action="verifydata.php" method="POST" class="form-horizontal">
        <p>Enter your unique username here</p>
        <input type="text" name="username" class="form-control" required>
        <p>Enter the answer to your secret question.</p>
        <input type="text" name="secretanswer" class="form-control" required>
        <p>Enter the new password you want to use</p>
        <input type="password" name="newpassword" class="form-control" required><br/>
        <button type="submit" name="resetPassword" class='btn btn-primary btn-md'>Reset Password</button>
    
    </form>
    
</body>
</html>