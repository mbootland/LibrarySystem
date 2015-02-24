<html>
<head>
<title>Add Student</title>
</head>
<body>
<?php
 
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
 
    } else{
	 
        // Trim white space from the name and store the name
        $LastName = trim($_POST['LastName']);
 
    }
	 
    if(empty($_POST['Email'])){

        // Adds name to array
        $data_missing[] = 'Email';
 
    } else {
 
        // Trim white space from the name and store the name
        $email = trim($_POST['Email']);
	 
	    }
	 
	    if(empty($_POST['Course'])){
 
        // Adds name to array
        $data_missing[] = 'Course';
 
    } else {

        // Trim white space from the name and store the name
        $course = trim($_POST['Course']);
 
    }
	 
    if(empty($_POST['AcademicYear'])){
	 
        // Adds name to array
        $data_missing[] = 'AcademicYear';
	 
	    } else {
	 
       // Trim white space from the name and store the name
        $AcademicYear = trim($_POST['AcademicYear']);
 
	    }
	 
	    if(empty($_POST['Picture'])){
 
	        // Adds name to array
	        $data_missing[] = 'Picture';
	 
	    } else {
	 
	        // Trim white space from the name and store the name
        $Picture = trim($_POST['Picture']);
	 
	    }
	 
	    if(empty($_POST['Position'])){
	 
	        // Adds name to array
	        $data_missing[] = 'Position';
 
	    } else {
	 
	        // Trim white space from the name and store the name
       $Position = trim($_POST['Position']);
	 
    }
 
	 
    if(empty($_POST['DoB'])){
	 
        // Adds name to array
        $data_missing[] = 'DoB';
	 
    } else {
 
        // Trim white space from the name and store the name
        $DoB = trim($_POST['DoB']);
 
    }
 
    
    if(empty($data_missing)){
         
        require_once('C:/wamp/www/mysqli_connect.php');
         
        $query = "INSERT INTO Profiles (FirstName, LastName, DoB, Course, AcademicYear,
        								Picture, Position, Email) 
				  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
	         
        $stmt = mysqli_prepare($dbc, $query);
         
        
	         
        mysqli_stmt_bind_param($stmt, "ssssssss", $FirstName,
                               $LastName, $DoB, $course, $AcademicYear, 
                               $Picture, $Position, $email);
         
        mysqli_stmt_execute($stmt);
	         
        $affected_rows = mysqli_stmt_affected_rows($stmt);
         
        if($affected_rows == 1){
	             
            echo 'Member Entered';
             
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
 
<form action="http://localhost/studentadded.php" method="post">
     
    <b>Add a New Student</b>
 
<p>First Name:
<input type="text" name="FirstName" size="30" value="" />
</p>
 
<p>Last Name:
<input type="text" name="LastName" size="30" value="" />
</p>
 
<p>Birth Date (YYYY-MM-DD):
<input type="text" name="DoB" size="30" value="" />
</p>
 
<p>Course:
<input type="text" name="Course" size="30" value="" />
</p>
 
<p>Academic Year:
<input type="text" name="AcademicYear" size="30" value="" />
</p>
 
<p>Picture
<input type="text" name="Picture" size="30" value="" />
</p>

<p>Position
<input type="text" name="Position" size="30" value="" />
</p>

<p>Email:
<input type="text" name="Email" size="30" value="" />
</p>
 
<p>
<input type="submit" name="submit" value="Send" />
</p>

</form>
</body>
</html>