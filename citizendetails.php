<?php
session_start();
include("connection.php");
    $id = $_SESSION['citizenid'];
    $type = $_SESSION['citizenidtype'];
    $query2="select * from citizen where C_IDType='$type' and C_ID = '$id' ";
    $query3="select * from contact where C_ID='$id'";
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
    <link rel="stylesheet" href="citizendetails.css">
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
        <li><a class="active" href="citizen.php">Citizen</a></li>
        <li><a href="area.php">Area</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="login.php">Logout</a></li>
      </ul>
    </nav>
<table>
<div id="tablerow">
<?php
    $row = mysqli_fetch_assoc($results);
    echo "<tr>";
    echo "<th>Citizen Name</th>";
    echo "<td>".$row['C_Name']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Address </th>";
    echo "<td>".$row['C_Address']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Mob No</th>";
    echo "<td>".$row['Mob']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Date.of.Birth</th>";
    echo "<td>".$row['C_DOB']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Benificiery Ref ID</th>";
    echo "<td>".$row['B_Ref_ID']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Vaccine Name</th>";
    echo "<td>".$row['V_Name']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>No.of Doses</th>";
    echo "<td>".$row['No_of_Dose']."</td>";
    echo "</tr>";
?>
</div>
</table>
<table>
  <tr>
  <th>Date IN</th>
  <th>Date OUT</th>
  <th>Time IN</th>
  <th>Time OUT</th>
  <th>Transport Reg</th>
  <th>Transport Mode</th>
  <th>Inst Code</th>
  <th>Inst Type</th>
  <th>Inst Name</th>
  <th>Inst Address</th>
  <th>Hotel License</th>
  <th>Hotel Address</th>
  <th>Shop License</th>
  <th>Shop Address</th>
  </tr>
<div id="tablerow">
<?php
    while ($row = mysqli_fetch_assoc($results2))
    {
    echo "<tr>";
    echo "<td>".$row['Date_In']."</td>";
    echo "<td>".$row['Date_Out']."</td>";
    echo "<td>".$row['Time_In']."</td>";
    echo "<td>".$row['Time_Out']."</td>";
    if(isset($row['Reg_No']))
    {
      $r=$row['Reg_No'];
      $qr="select * from transport where Reg_No='$r' ";
      $resultr= mysqli_query($con,$qr);
      $row2 = mysqli_fetch_assoc($resultr);
      echo "<td>".$row['Reg_No']."</td>";
      echo "<td>".$row2['Mode']."</td>";
      
    }
    else{
      echo "<td>Nil</td>";
      echo "<td>Nil</td>";
    }
    if(isset($row['Inst_Code']))
    {
      $r=$row['Inst_Code'];
      $qr="select * from institutions where Inst_Code='$r' ";
      $resultr= mysqli_query($con,$qr);
      $row2 = mysqli_fetch_assoc($resultr);
      echo "<td>".$row['Inst_Code']."</td>";
      echo "<td>".$row2['Inst_Type']."</td>";
      echo "<td>".$row2['Inst_Name']."</td>";
      echo "<td>".$row2['Inst_Loc']."</td>";
    }
    else{
      echo "<td>Nil</td>";
      echo "<td>Nil</td>";
      echo "<td>Nil</td>";
      echo "<td>Nil</td>";
    }
    if(isset($row['H_License']))
    {
      $r=$row['H_License'];
      $qr="select * from hotel where H_License='$r' ";
      $resultr= mysqli_query($con,$qr);
      $row2 = mysqli_fetch_assoc($resultr);
      echo "<td>".$row['H_License']."</td>";
      echo "<td>".$row2['H_Address']."</td>";
    }
    else{
      echo "<td>Nil</td>";
      echo "<td>Nil</td>";
    }
    if(isset($row['S_License']))
    {
      $r=$row['S_License'];
      $qr="select * from shop where S_License='$r' ";
      $resultr= mysqli_query($con,$qr);
      $row2 = mysqli_fetch_assoc($resultr);
      echo "<td>".$row['S_License']."</td>";
      echo "<td>".$row2['S_Address']."</td>";
    }
    else{
      echo "<td>Nil</td>";
      echo "<td>Nil</td>";
    }
    echo "</tr>";

    }
?>
</table>
</body>
</html>