<?php 
session_start();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $secretanswer = $_POST['secretanswer'];

    $_SESSION['report'] = "You recently tried registering";
    if ($password === $cpassword) {
        $_SESSION['report'] = "Your password do match";
        $userdata = [
            'username' => $username,
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'secretanswer'  => $secretanswer
        ];

        $path = "file/".$username.".json";
        //echo $path  ."<br/>"; this line shows you the file path
        $fileName = basename($path);

        if(file_exists($path) ){
            $_SESSION['report'] = "You have created an account already. Kindly login";
            header("Location: login.php");//redirects to login page 
            //login not done yet
        }else{//$username does not exist as basename($path,".json") ){//user do not exist
            file_put_contents("file/".$username.".json", json_encode($userdata) );
            $_SESSION['report'] = "Your account has been created. You are in.";
            $_SESSION['login_status'] = true;
            header("Location: index.php");
            //setcookie('loggedin', true, time() + (86400 * 30) );
        }

    }else{
        $_SESSION['report'] = "Your password do not match. Kindly enter the same password.";
        header("Location: register.php");

    }
}

    if (isset($_POST['loginDetails'])) {
        $checkusername = $_POST['username'];
        $password = $_POST['password'];

        $fileuserfile = "file/".$checkusername.".json";
        if(file_exists($fileuserfile) ){
            echo file_get_contents($fileuserfile);
            $userDetails = file_get_contents($fileuserfile); //get details of the user
            $userArrayValue = json_decode($userDetails, true); // converts json file to array
            $originalPassword = $userArrayValue['password'];
            if($password === $originalPassword){
                $_SESSION['login_status'] = true;
                //echo "Password matches";
                header("Location: index.php");
            }else{
                $_SESSION['report']= "Password does not match. <br/><button><a href='reset.php'>Reset your password here</a></button>";
                header("Location: login.php");
            }
        }else{
            $_SESSION['report'] = "User name does not exist. ";
            header("Location: reset.php");
        }

    }
//working here
    if (isset($_POST['resetPassword'])) {
        $getusername = $_POST['username'];
        $newpassword = $_POST['newpassword'];
        $secretanswer = $_POST['secretanswer'];

        $fileuserfile = "file/".$getusername.".json";
        if(file_exists($fileuserfile) ){ //make changes to file if it exists
            
            $userDetails = file_get_contents($fileuserfile); //get details of the user
            $newuserArrayValue = json_decode($userDetails, true); // converts json file to array
            $originalPassword = $newuserArrayValue['password'];
            if($newpassword !== $originalPassword) {
                
                $newuserArrayValue['password'] = $newpassword; //changed password here
                if($secretanswer === $newuserArrayValue['secretanswer']){
                    file_put_contents($fileuserfile,json_encode($newuserArrayValue));
                    $_SESSION['report'] = "Username identified. Secret Question answer is correct. Login with your new password";
                    header("Location: login.php");
                }else{
                    $_SESSION['report'] = "Your secret answer does not match. Kindly get it right or contact the admin. You can also create another user account with another unique username by clicking <a href='register.php'> here</a>";
                    header("Location: reset.php");
                }
                echo var_dump($newuserArrayValue);
            }else{
                $_SESSION['report']= "Password is the same. No need to reset password. <br/><button><a href='login.php'>Login with your password here</a></button>";
                header("Location: login.php");
            }
        }else{
            $_SESSION['report'] = "User name does not exist. Create an account <a href='register.php'>here</a> or try to login <a href='login.php'>here</a> or try resetting again <a href='reset.php'>here</a>";
            header("Location: reset.php");
        }

    }

    //logout code
    if(isset($_GET['logout'])){
        session_unset();
        $_SESSION['report'] = "You have just logged out from your account";
        header("Location: login.php");

    }
?>