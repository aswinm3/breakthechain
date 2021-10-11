<?php
session_start();
include("connection.php");
if(isset($_POST['submitarea']))
{
  $w = $_POST['ward'];
  $d = $_POST['dist'];
  $query2="select * from citizen where Ward_No='$w' and District = '$d' ";
  $query3="select * from area where Ward_No='$w' and District = '$d' ";
    $results = mysqli_query($con,$query2);
    $results2 = mysqli_query($con,$query3);
    $count = mysqli_num_rows($results);
    if($count==0)
    {
        $err_m='No data found';
        echo '<span style="color:black;">No data found</span>';
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="areadetails.css">
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
<table>
  <div id="tabelrow">
  <?php
    while ($row = mysqli_fetch_assoc($results2))
    {    
    echo "<tr>";
    echo "<th>Ward No</th>";
    echo "<td>".$row['Ward_No']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>District </th>";
    echo "<td>".$row['District']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>TPR</th>";
    echo "<td>".$row['TPR']."</td>";
    echo "</tr>";
    }  
?>
  </div>
</table>
<table>
<div id="tablerow">
<tr>
<th> Citizen Name </th>
<th> Address </th>
<th> Mob No </th>
<th> Date.of.Birth </th>
<th> Beneficiery Ref ID </th>
<th> Vaccine Name </th>
<th> No.of Doses </th>
</tr>
<?php
    while ($row = mysqli_fetch_assoc($results))
    {

    echo "<tr>";
    echo "<td>".$row['C_Name']."</td>";
    echo "<td>".$row['C_Address']."</td>";
    echo "<td>".$row['Mob']."</td>";
    echo "<td>".$row['C_DOB']."</td>";
    echo "<td>".$row['B_Ref_ID']."</td>";
    echo "<td>".$row['V_Name']."</td>";
    echo "<td>".$row['No_of_Dose']."</td>";
    echo "</tr>";

    }
}    
?>
</div>
</table>
</body>
</html>