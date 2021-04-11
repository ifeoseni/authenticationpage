<?php
session_start();
if(!empty($_SESSION['login_status']) AND  ($_SESSION['login_status']=== true) ){
    $_SESSION['report'] =  "<h3 class='alert alert-primary'>You have an account that is currently logged in to the platform. Logout to register a new account</h3>";
    header("Location: index.php");
}else{
    echo "<h3 class='alert alert-info'>Kindly register here</h3>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Here</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
    <h1>Register Here</h1>
    <form action="verifydata.php" method="POST" class="form-horizontal">
        <p>Please enter your name here</p>
        <input type="text" name="name" placeholder="Please enter your name here" class="form-control" required>
        <p>Please pick a unique Username that you can always remember.</p>
        <input type="text" name="username" placeholder="Enter a username you can remember here" class="form-control" required>
        <p>Please enter your email address here</p>
        <input type="email" name="email" placeholder="Kindly enter your email here" class="form-control" required>
        <p>Please choose a unique password here</p>
        <input type="password" name="password" placeholder="Enter your password here" class="form-control" required>
        <p>Kindly confirm your password here</p>
        <input type="password" name="cpassword" placeholder="Confirm your password here" class="form-control" required>  
        <p>Please choose a unique word that will enable you reset your password in case you can not remember your password</p>      
        <input type="text" name="secretanswer" placeholder="Enter your secret reset word here." class="form-control" required>
        <br/>
        <button type="submit" name="register" class="btn btn-primary btn-md">Create Account</button>
        
    </form>
    
</body>
</html>
