<?php
session_start();
include("connection.php");
if(isset($_POST['submit2']))
{
 $u = $_POST['username'];
 $p = $_POST['password'];
 $cp = $_POST['cpassword'];
 $qu = "select * from admin where Uname = '$u' and Pname = '$p'";
 $result = mysqli_query($con,$qu);
 $count = mysqli_num_rows($result);
    if($count==0)
    {
        if($p==$cp)
        {
            $sq= "insert into admin (Uname,Pname) values ('$u','$p')";

            if(mysqli_query($con, $sq))
            {
                header('Location: login.php');
            }
        } 
    }
    elseif($count>0)
    {
        echo "Username not available";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Login</title>
 <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.c
ss">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.cs
s">
 <link rel="stylesheet" href="login.css">
</head>
<body>
 <main>
 <div class="container-fluid">
 <div class="row">
 <div class="col-sm-6 login-section-wrapper">
 <div class="login-wrapper my-auto">
 <h1 class="login-title">Sign Up</h1>
 <form method=POST action=signup.php>
 <div class="form-group">
 <label for="email">Username</label>
 <input name="username" id="email"
 class="form-control" placeholder="example123">
 </div>
 <div class="form-group mb-4">
 <label for="password">Password</label>
 <input type="password" name="password" id="password"
 class="form-control" placeholder="enter your password">
 </div>
 <div class="form-group mb-4">
 <label for="cpassword">Confirm Password</label>
 <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Re-enter your password">
 </div>
 <input name="submit2" id="login" 
 class="btn btn-block login-btn" type="submit" value="Signup">
 </form>
 </div>
 </div>
 <div class="col-sm-6 px-0 d-none d-sm-block">
 <img src="loginimg.jpg" alt="login image" class="login-img">
 </div>
 </div>
 </div>
 </main>
</body>
</html>