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
    <title>Login Here</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
    <?php  ?>
    <form action="verifydata.php" method="POST" class="form-horizontal">
        <legend><strong>Login Here</strong></legend>
        <p>Choose username</p>
        <input type="text" name="username" placeholder="Enter your username here" class="form-control" required>
        <p>Enter your password here</p>
        <input type="text" name="password" placeholder="Enter your password here" class="form-control" required>
        <br/>
        <button type="submit" name="loginDetails" class='btn btn-primary btn-md'>Login</button>
        
    </form>
</body>
</html>