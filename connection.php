<?php
$l = "localhost";
$u = "root";
$p = "";
$db = "project";
$con=mysqli_connect($l,$u,$p,$db);
if(!$con)
{
 die("Not connected: ".mysqli_connect_error());
}
?>