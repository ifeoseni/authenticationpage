<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To The Platform</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
    <h1>Welcome to my platform.</h1>
    <?php 

        if(!empty($_SESSION['report']) ){
            echo "<h1 class='alert alert-info'>".$_SESSION['report']."</h1>";
            
        }
        
        if (!empty($_SESSION['login_status']) AND ($_SESSION['login_status'] === true) ) {
            echo "You are currently logged in.<br/>";
            echo "You can logout by clicking the button below <br/>";
            echo "<form action='verifydata.php' method='GET'>";
            echo "<button type='submit' name='logout' class='btn btn-danger btn-md'>Logout</button>";
            echo "</form><br/>";
        }
        else{
            $_SESSION['report'] = "<h3 class='alert alert-info'>You need to register or login to use the platform</h3> <br/> <button><a href='register.php'>Register Here.</a></button><br/>";
            header("Location: login.php");
            
        }
        
        
    ?>
    <p >Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem consequuntur sequi suscipit, esse vel quam officia eum iusto dolor! Architecto consequatur iusto quaerat voluptatum aspernatur facere culpa non modi officiis?</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, consequuntur dolorem corrupti doloribus cupiditate vero dolore omnis voluptatum iure perferendis totam a! Quam enim, recusandae beatae tenetur quibusdam quo voluptates.</p>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit asperiores quasi quisquam ex, ipsum inventore suscipit quod rem ullam error perspiciatis qui voluptate rerum, voluptatibus quo in eius quos quis.</p>
</body>
</html>