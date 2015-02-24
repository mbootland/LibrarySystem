
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<div id="navbar">
<ul>
<ul>
  <li><a href="index.html">Home</a></li>
  <li><a href="addstudent.php">Add Profile</a></li>
  <li><a href="addevent.php">Add Event</a></li>
</ul>
</div>
<body>
<div id="bodydiv">
<?php

require_once('C:/wamp/www/mysqli_connect.php');

$query = "SELECT FirstName, LastName, DoB, Course, AcademicYear, Picture, Position, Email FROM Profiles";

$response = @mysqli_query($dbc, $query);

if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>First Name</b></td>
<td align="left"><b>Last Name</b></td>
<td align="left"><b>DoB</b></td>
<td align="left"><b>Course</b></td>
<td align="left"><b>Academic Year</b></td>
<td align="left"><b>Picture</b></td>
<td align="left"><b>Position</b></td>
<td align="left"><b>Email</b></td></tr>';


while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' .
$row['FirstName'] . '</td><td align="left">' .
$row['LastName'] . '</td><td align="left">' .
$row['DoB'] . '</td><td align="left">' .
$row['Course'] . '</td><td align="left">' .
$row['AcademicYear'] . '</td><td align="left">' .
$row['Picture'] . '</td><td align="left">' .
$row['Position'] . '</td><td align="left">' .
$row['Email'] . '</td><td align="left">';

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

mysqli_close($dbc);

?>
</body>
</div>
</html>
