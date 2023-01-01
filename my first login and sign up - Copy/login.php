<?php

$fname="";
$password="";
$err="";
//db connection
 $conn=mysqli_connect("localhost","root","","db");

 if(isset($_POST["Login"]))
 {
    $fname=mysqli_real_escape_string($conn,$_POST['fname']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $sql="select * from users where firstname='".$fname."' and password='".$password."' limit 1";
    $result=mysqli_query($conn,$sql);

    if (empty($fname))
    {
        $err="username required!";
    }else if (empty($password))
    {
        $err="password required!";
    }else if (mysqli_num_rows($result==1)) 
    {
        header('location: home.php');
    }else{
        $err="username or password is incorrect!";
    }

 }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | system</title>
    <link rel="stylesheet" href="css/login_style.css">
</head>
<body>
    <div class="box">
        <h1>Login</h1>
        <div class="err">
            <?php echo $err;?>
        </div>
        <form action="login.php" method = "post">

        <input type="text" name="fname" id=""placeholder="username">
        <input type="password" name="password" id="" placeholder="password">
        <input type="submit" value="Login" name="login">
        i haven't account? <a href="signup.php" style="color: #aaa;">SIGN UP</a>
        </form>

    </div>
</body>
</html>