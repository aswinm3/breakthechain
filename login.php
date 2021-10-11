<?php
session_start();
include "connection.php";
if (isset($_POST['submit'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];
    $qu = "select * from admin where Uname = '$u' and Pname = '$p'";
    $results = mysqli_query($con, $qu);
    $count = mysqli_num_rows($results);
    if ($count == 1) {
        $_SESSION['username'] = $u;
        header('Location: covidportal.php');}
}
if (isset($_POST['submit2'])) {
    header('Location: signup.php');
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
 <h1 class="login-title">Log in</h1>
 <form method=POST action=login.php>
 <div class="form-group">
 <label for="email">Username</label>
 <input name="username" class="form-control" placeholder="example123">
 </div>
 <div class="form-group mb-4">
 <label for="password">Password</label>
 <input type="password" name="password"
 class="form-control" placeholder="enter your password">
 </div>
 <input name="submit" class="btn btn-block login-btn" type="submit" value="Login">
 <input name="submit2" class="btn btn-block login-btn" type="submit" value="Signup">
 </form>
 </div>
 </div>
 <div class="col-sm-6 px-0 d-none d-sm-block">
 <img src="loginimg.jpg" alt="login image"
 class="login-img">
 </div>
 </div>
 </div>
 </main>
</body>
</html>
