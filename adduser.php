<html>

<link rel="stylesheet" type="text/css" href="style.css">
<div id="navbar">
<ul>
<ul>
  <li><a href="index.php">Login</a></li>
  <li><a href="catalogue.php">Search Catalogue</a></li>
  <li><a href="addbook.php">Add a Book</a></li>
  <li><a href="adduser.php">Add a User</a></li>
</ul>
</div>
<div id="bodydiv">
<form action="http://localhost/LibrarySystem/useradded.php" method="post">


<b>Add a New User</b>

<p>FirstName:
<input type="text" name="FirstName" size="30" value="" />
</p>

<p>LastName:
<input type="text" name="LastName" size="30" value="" />
</p>

<p>DateOfBirth:
<input type="text" name="DateOfBirth" size="30" value="" />
</p>

<p>Address:
<input type="text" name="Address" size="30" value="" />
</p>

<p>Email:
<input type="text" name="Email" size="30" value="" />
</p>

<p>Telephone:
<input type="text" name="Telephone" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>

</div>
</form>


<div id="lowerbody">
<?php

require_once('C:\xampp\htdocs\LibrarySystem\mysqli_connect.php');

$query = "SELECT UserID, FirstName, LastName, DateOfBirth, Address, Email,
          Telephone FROM user";

$response = @mysqli_query($dbc, $query);

if($response){

echo '</br></br></br><table align="left" cellspacing="5" cellpadding="8"><tr>
<td align="left"><b>UserID</b></td>
<td align="left"><b>FirstName</b></td>
<td align="left"><b>LastName</b></td>
<td align="left"><b>DateOfBirth</b></td>
<td align="left"><b>Address</b></td>
<td align="left"><b>Email</b></td>
<td align="left"><b>Telephone</b></td></tr>';


while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' .
$row['UserID'] . ' - </td><td align="left">' .
$row['FirstName'] . ' - </td><td align="left">' .
$row['LastName'] . ' - </td><td align="left">' .
$row['DateOfBirth'] . ' - </td><td align="left">' .
$row['Address'] . ' - </td><td align="left">' .
$row['Email'] . '</td><td align="left">' .
$row['Telephone'] . '</td><td align="left">';

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

mysqli_close($dbc);

?>
</div>
</body>
</html>
