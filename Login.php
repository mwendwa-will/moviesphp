<?php
if (isset($_POST["password"]))
{

    require "DB.php";

    extract($_POST);
    $sql= "select * from users where email='$email' and password='$password' LIMIT 1";
    //mysqli_query($conn,$sql);
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)==1){
        //success
        $info = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION["info"] = $info;
        header("location:show.php");
    }else{
        $message="Wrong username or password";
    }
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-5">
            <div class="card">
                <div class="card-header">
                    <h1>USER SIGN UP</h1>
                </div>
                <div class="card-body ">
                    <?php
                    if (isset($message))
                        echo $message;
                    ?>

                    <form action="Login.php" method="post">
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label for="username">Password</label>
                        <input type="password" name="password" class="form-control" required>
                </div>
                <button class="btn btn-block btn-warning">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
