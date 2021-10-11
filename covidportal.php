<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-widthinitial-scale=1.0">
    <link rel="stylesheet" href="covidportal.css">
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
        <li><a class="active" href="#">Home</a></li>
        <li><a href="citizen.php">Citizen</a></li>
        <li><a href="area.php">Area</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="login.php">Logout</a></li>
      </ul>
    </nav>
      <div id="welcome">
        Welcome
    </div>
    <div id="name">
    <?php
session_start();
if (isset($_SESSION['username'])) {
    echo ($_SESSION['username'] . " !");
}
?>
    </div>
<div class="blog-card">
<input type="radio" name="select" id="tap-1" checked>
<input type="radio" name="select" id="tap-2">
<input type="radio" name="select" id="tap-3">
<input type="checkbox" id="imgTap">
<div class="sliders">
<label for="tap-1" class="tap tap-1"></label>
<label for="tap-2" class="tap tap-2"></label>
<label for="tap-3" class="tap tap-3"></label>
</div>
<div class="inner-part">
<label for="imgTap" class="img">
<img class="img-1" src="citizen.jpg">
</label>
<div class="content content-1">
<div class="title">
Citizen
</div>
<div class="text">
This tab exclusively let’s us know about the various trivial details of a citizen and also gives us information about the route map of that person. This helps us effectievly trace the routemap of a person incase he is infected.
</div>
<button><a href="citizen.php">Explore</a></button>
</div>
</div>
<div class="inner-part">
<label for="imgTap" class="img">
<img class="img-2" src="area.jpg">
</label>
<div class="content content-2">
<div class="title">
Area
</div>
<div class="text">
This tab let’s us know about key details of an area including it’s Test Positivity Rate which helps us narrow down and helps us to effectievly quarantine and contain the spreading of virus.
</div>
<button><a href="area.php">Explore</a></button>
</div>
</div>
<div class="inner-part">
<label for="imgTap" class="img">
<img class="img-3" src="contact.jpg">
</label>
<div class="content content-3">
<div class="title">
Contact
</div>
<div class="text">
The contact tab helps us with the prime details of the people with whom a particular citizen has come in contact with at a particular time.
</div>
<button><a href="contact.php">Explore</a></button>
</div>
</div>
</div>
  </body>
</html>
