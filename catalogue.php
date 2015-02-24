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
<title>Search</title>
</head>

<h2>Search</h2>

<form method="post">
  <input type="text" name="search" size="30" value="" />
<input type="submit" name="submit" value="Send" />
</form>

<?php

require_once('C:\xampp\htdocs\LibrarySystem\mysqli_connect.php');


if(isset($_POST['submit'])){

    $search = trim($_POST['search']);

  }

if(empty($_POST['search'])){

    $search = null;
  }



$query = "SELECT * FROM Book WHERE Title LIKE '%$search%'";

$response = @mysqli_query($dbc, $query);

if($response){

echo '</br></br></br><table align="left" cellspacing="5" cellpadding="8"><tr>
<td align="left"><b>BookID</b></td>
<td align="left"><b>ISBN</b></td>
<td align="left"><b>Title</b></td>
<td align="left"><b>Edition</b></td>
<td align="left"><b>Author</b></td>
<td align="left"><b>Publisher</b></td></tr>';


while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' .
$row['BookID'] . ' - </td><td align="left">' .
$row['ISBN'] . ' - </td><td align="left">' .
$row['Title'] . ' - </td><td align="left">' .
$row['Edition'] . ' - </td><td align="left">' .
$row['Author'] . ' - </td><td align="left">' .
$row['Publisher'] . '</td><td align="left">';

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

mysqli_close($dbc);

?>



</html>
