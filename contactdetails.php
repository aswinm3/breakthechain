<?php
session_start();
include "connection.php";
$id = $_SESSION['citizenid'];
$type = $_SESSION['citizenidtype'];
$query2 = "select * from citizen where C_IDType='$type' and C_ID = '$id' ";
$query3 = "select * from contact where C_ID='$id'";
$results = mysqli_query($con, $query2);
$results2 = mysqli_query($con, $query3);
$count = mysqli_num_rows($results);
if ($count == 0) {
    $err_m = 'No data found';
    echo '<span style="color:black;">No data found</span>';
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <link rel="stylesheet" href="contactdetails.css">
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
</div>
</table>
<table>
  <tr>
  <th>Citizen ID</th>
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
while ($row = mysqli_fetch_assoc($results2)) {
    $di = $row['Date_In'];
    $do = $row['Date_Out'];
    $ti = $row['Time_In'];
    $to = $row['Time_Out'];
    $cr = $row['C_ID'];
    if (isset($row['Reg_No'])) {
        $reg = $row['Reg_No'];
    }
    if (isset($row['Inst_Code'])) {
        $ins = $row['Inst_Code'];
    }
    if (isset($row['H_License'])) {
        $hli = $row['H_License'];
    }
    if (isset($row['S_License'])) {
        $sli = $row['S_License'];
    }
    $query4 = "select * from contact where Date_In Between '$di' and '$do' And (C_ID!='$cr')  And (Time_In Between '$ti' and '$to')";
    $resultc = mysqli_query($con, $query4);
    while ($row3 = mysqli_fetch_assoc($resultc)) {
        echo "<tr>";
        echo "<td>" . $row3['C_ID'] . "</td>";
        echo "<td>" . $row3['Date_In'] . "</td>";
        echo "<td>" . $row3['Date_Out'] . "</td>";
        echo "<td>" . $row3['Time_In'] . "</td>";
        echo "<td>" . $row3['Time_Out'] . "</td>";
        if (isset($row3['Reg_No']) and ($row3['Reg_No'] == $reg)) {
            $r = $row3['Reg_No'];
            $qr = "select * from transport where Reg_No='$r' ";
            $resultr = mysqli_query($con, $qr);
            $row2 = mysqli_fetch_assoc($resultr);
            echo "<td>" . $row3['Reg_No'] . "</td>";
            echo "<td>" . $row2['Mode'] . "</td>";

        } else {
            echo "<td>Nil</td>";
            echo "<td>Nil</td>";
        }
        if (isset($row3['Inst_Code']) and ($row3['Inst_Code'] == $ins)) {
            $r = $row3['Inst_Code'];
            $qr = "select * from institutions where Inst_Code='$r' ";
            $resultr = mysqli_query($con, $qr);
            $row2 = mysqli_fetch_assoc($resultr);
            echo "<td>" . $row3['Inst_Code'] . "</td>";
            echo "<td>" . $row2['Inst_Type'] . "</td>";
            echo "<td>" . $row2['Inst_Name'] . "</td>";
            echo "<td>" . $row2['Inst_Loc'] . "</td>";
        } else {
            echo "<td>Nil</td>";
            echo "<td>Nil</td>";
            echo "<td>Nil</td>";
            echo "<td>Nil</td>";
        }
        if (isset($row3['H_License']) and ($row3['H_License'] == $hli)) {
            $r = $row3['H_License'];
            $qr = "select * from hotel where H_License='$r' ";
            $resultr = mysqli_query($con, $qr);
            $row2 = mysqli_fetch_assoc($resultr);
            echo "<td>" . $row3['H_License'] . "</td>";
            echo "<td>" . $row2['H_Address'] . "</td>";
        } else {
            echo "<td>Nil</td>";
            echo "<td>Nil</td>";
        }
        if (isset($row3['S_License']) and ($row3['S_License'] == $sli)) {
            $r = $row3['S_License'];
            $qr = "select * from shop where S_License='$r' ";
            $resultr = mysqli_query($con, $qr);
            $row2 = mysqli_fetch_assoc($resultr);
            echo "<td>" . $row3['S_License'] . "</td>";
            echo "<td>" . $row2['S_Address'] . "</td>";
        } else {
            echo "<td>Nil</td>";
            echo "<td>Nil</td>";
        }
        echo "</tr>";
    }
}
?>
</table>
</body>
</html>