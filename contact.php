<?php
session_start();
include "connection.php";
if (isset($_POST['submit'])) {
    $id = $_POST['citizenid'];
    $type = $_POST['citizenidtype'];
    $query2 = "select * from citizen where C_IDType='$type' and C_ID = '$id' ";
    $results = mysqli_query($con, $query2);
    $count = mysqli_num_rows($results);
    if ($count == 0) {
        $err_m = 'No data found';
        echo "no details found";
    } else {
        $_SESSION['citizenid'] = $id;
        $_SESSION['citizenidtype'] = $type;
        header('Location: contactdetails.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="citizen.css">
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
        <li><a href="area.php">Area</a></li>
        <li><a class="active" href="contact.php">Contact</a></li>
        <li><a href="login.php">Logout</a></li>
      </ul>
    </nav>
    <section id="entry">
      <div class="wrapper">
         <div class="title">
            Citizen Contact
         </div>
         <form action="contact.php" method="POST">
         <div class="field">
               <input name="citizenidtype" type="text" required>
               <label>Citizen ID type</label>
            </div>
            <div class="field">
               <input name="citizenid" type="text" required>
               <label>Citizen ID Number</label>
            </div>
            <div class="field">
               <input name="submit" type="submit" value="Continue">
            </div>
         </form>
    </section>
  </body>
</html>
