<html>
<head><title>Searching for a Book...</title>
</head>
<?php

require_once('C:\xampp\htdocs\LibrarySystem\mysqli_connect.php');


if(isset($_POST['submit'])){

    $search = trim($_POST['search']);

    }



$query = "SELECT * FROM Book WHERE Title Like '%search%'";

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


</body>

</html>
