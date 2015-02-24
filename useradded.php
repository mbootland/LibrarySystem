<html>

<link rel="stylesheet" type="text/css" href="style.css">
<div id="navbar">
<ul>
<ul>
  <li><a href="index.html">News</a></li>
  <li><a href="catalogue.php">Search Catalogue</a></li>
  <li><a href="myprofile.php">My Profile</a></li>
  <li><a href="addbook.php">Add a Book</a></li>
  <li><a href="adduser.php">Add a User</a></li>
</ul>
</div>
<div id="bodydiv">
<head>
<title>Add a User</title>
</head>
<body>
<?php

require_once('C:\xampp\htdocs\LibrarySystem\mysqli_connect.php');
$UserID = null;

if(isset($_POST['submit'])){

    $data_missing = array();


    if(empty($_POST['FirstName'])){

        // Adds name to array
        $data_missing[] = 'FirstName';

    } else {

        // Trim white space from the name and store the name
        $FirstName = trim($_POST['FirstName']);

    }

    if(empty($_POST['LastName'])){

        // Adds name to array
        $data_missing[] = 'LastName';

    } else {

        // Trim white space from the name and store the name
        $LastName = trim($_POST['LastName']);

      }

      if(empty($_POST['DateOfBirth'])){

        // Adds name to array
        $data_missing[] = 'DateOfBirth';

    } else {

        // Trim white space from the name and store the name
        $DateOfBirth = trim($_POST['DateOfBirth']);

    }

    if(empty($_POST['Address'])){

        // Adds name to array
        $data_missing[] = 'Address';

    } else {

        // Trim white space from the name and store the name
        $Address = trim($_POST['Address']);

      }

    if(empty($_POST['Email'])){

        // Adds name to array
        $data_missing[] = 'Email';

    } else {

        // Trim white space from the name and store the name
        $Email = trim($_POST['Email']);

      }

    if(empty($_POST['Telephone'])){

        // Adds name to array
        $data_missing[] = 'Telephone';

    } else {

        // Trim white space from the name and store the name
        $Telephone = trim($_POST['Telephone']);

      }



    if(empty($data_missing)){



        $query = "INSERT INTO User (UserID, FirstName, LastName, DateOfBirth,
                  Address, Email, Telephone) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);



        mysqli_stmt_bind_param($stmt, "sssssss", $UserID, $FirstName, $LastName,
                               $DateOfBirth, $Address, $Email, $Telephone);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'User Added';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        }

    } else {

        echo 'You need to enter the following data<br />';

        foreach($data_missing as $missing){

            echo "$missing<br />";

        }

    }

}

?>

<form action="http://localhost/LibrarySystem/bookadded.php" method="post">

    <b>Add a New User</b>

<p>FirstName:
<input type="text" name="BookID" size="30" value="" />
</p>

<p>LastName:
<input type="text" name="ISBN" size="30" value="" />
</p>

<p>DateOfBirth:
<input type="text" name="Title" size="30" value="" />
</p>

<p>Address:
<input type="text" name="Edition" size="30" value="" />
</p>

<p>Email:
<input type="text" name="Author" size="30" value="" />
</p>

<p>Telephone:
<input type="text" name="Publisher" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>

</form>
</body>
</div>
</html>
