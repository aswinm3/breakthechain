<?php
session_start();
include "connection.php";
if (isset($_POST['submitarea'])) {
    $w = $_POST['ward'];
    $d = $_POST['dist'];
    $query2 = "select * from citizen where Ward_No='$w' and District = '$d' ";
    $results = mysqli_query($con, $query2);
    $count = mysqli_num_rows($results);
    if ($count == 0) {
        $err_m = 'No data found';
        echo "no details found";
    } else {
        $_SESSION['ward'] = $w;
        $_SESSION['dist'] = $d;
        header('Location: areadetails.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="area.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap">
  </head>
  <body>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">Break the Chain</label>
      <ul>
        <li><a href="covidportal.php">Home</a></li>
        <li><a href="citizen.php">Citizen</a></li>
        <li><a class="active" href="area.php">Area</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="login.php">Logout</a></li>
      </ul>
    </nav>
    <section id="entry">
      <div class="wrapper">
         <div class="title">
            Area Details
         </div>
         <form action="area.php" method="POST">
         <div class="field">
               <input name="ward" type="text" required>
               <label>Ward No</label>
            </div>
            <div class="field">
               <input name="dist" type="text" required>
               <label>District</label>
            </div>
            <div class="field">
               <input name="submitarea" type="submit" value="Continue">
            </div>
         </form>
    </section>
  </body>
</html>
