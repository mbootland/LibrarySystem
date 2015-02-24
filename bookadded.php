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
<head>
<title>Add a Book</title>
</head>
<body>
<?php

require_once('C:\xampp\htdocs\LibrarySystem\mysqli_connect.php');
$BookID = null;

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['ISBN'])){

        // Adds name to array
        $data_missing[] = 'ISBN';

    } else {

        // Trim white space from the name and store the name
       $ISBN = trim($_POST['ISBN']);

    }

    if(empty($_POST['Title'])){

        // Adds name to array
        $data_missing[] = 'Title';

    } else{

        // Trim white space from the name and store the name
        $Title = trim($_POST['Title']);

    }

    if(empty($_POST['Edition'])){

        // Adds name to array
        $data_missing[] = 'Edition';

    } else {

        // Trim white space from the name and store the name
        $Edition = trim($_POST['Edition']);

	    }

	    if(empty($_POST['Author'])){

        // Adds name to array
        $data_missing[] = 'Author';

    } else {

        // Trim white space from the name and store the name
        $Author = trim($_POST['Author']);

    }

    if(empty($_POST['Publisher'])){

        // Adds name to array
        $data_missing[] = 'Publisher';

    } else {

        // Trim white space from the name and store the name
        $Publisher = trim($_POST['Publisher']);

      }



    if(empty($data_missing)){



        $query = "INSERT INTO Book (BookID, ISBN, Title, Edition, Author, Publisher)
				  VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);



        mysqli_stmt_bind_param($stmt, "ssssss", $BookID, $ISBN, $Title, $Edition,
                                              $Author, $Publisher);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Book Added';

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

    <b>Add a New Book</b>

<p>BookID:
<input type="text" name="BookID" size="30" value="" />
</p>

<p>ISBN:
<input type="text" name="ISBN" size="30" value="" />
</p>

<p>Title:
<input type="text" name="Title" size="30" value="" />
</p>

<p>Edition:
<input type="text" name="Edition" size="30" value="" />
</p>

<p>Author:
<input type="text" name="Author" size="30" value="" />
</p>

<p>Publisher:
<input type="text" name="Publisher" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>

</form>
</body>
</div>
</html>
