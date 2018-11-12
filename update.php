<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
    
	<link rel="stylesheet" type="text/css" href="adminmain.css" />	
</head>
<body>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="adminmain.js"></script>

<div id="lefttab">
<div id="thelogo">
<a id="theimage" href="http://www.somaiya.edu"><img src="svv_logo.jpg" alt="somaiya" ></a>
<!-- https://www.somaiya.edu/styles/images/SVV_logo_LHS.jpg-->
</div>
<div id="thetab">
<nav id="a35">
<ul id="a351">
<li>Update</li>
<li>Upload</li>
<li><a href="this2.php" style="cursor:pointer; text-decoration:none;color:inherit;">Subjects</a></li>

<li id="thisone1"> <a onclick="repots()" style="cursor:pointer">Reports</a></li>
<ul id="thisone">
<li>Clean Pass</li>

<li>Successful Pass</li>
<li>Topper</li>
<li>Drop-outs</li>
<li>Pass</li>
<li>Fail</li>
</ul>
</ul>
</nav>
</div>
</div>


<div id="righttab">

<p id="theheader" style="text-align:center">Result Analysis</p>
<div id="thebody">
<div>
<a href ="adminmain.php" id="topbuttons" style="margin-left:20px;float:left"><span>Home</span></a>
<a href ="adminlogout.php" id="topbuttons" style="float:right"><span>Logout</span></a>
</div>

<?php
   $dbhost_name = "localhost"; // Your host name 
$database = "results";       // Your database name
$username = "root";            // Your login userid 
$password = "";            // Your password 
//////// End of database details of your server //////

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$dbhost_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
} // Your Database details 

   $cat3=$_POST['subcat'];
$subcat3=$_POST['subcat3'];
$subcat4=$_POST['subcat4'];

$sql=$dbo->prepare("UPDATE student_result SET ".$_POST['column_edit']."=".$_POST['new_value']." where sem_no=$cat3 and subject_code=$subcat3 and roll_no=$subcat4");
$result=$sql->execute();

   
  $sql=$dbo->prepare("SELECT * FROM student_result where sem_no=$cat3 and subject_code=$subcat3 and roll_no=$subcat4");
$result=$sql->execute();
$row = $sql->fetch(PDO::FETCH_ASSOC);
echo "<table border=1 cellspacing=5 cellpadding=5>";
echo "<tr><td>SEMESTER</td><td>SUBJECT CODE</td><td>ROLL NO</td><td>SEAT NO</td><td>THEORY MARKS</td><td> GRACE</td><td>IA</td><td>THEORY TOTAL</td><td>THEORY GP</td><td>TERM WORK MARKS</td><td>PRAC MARKS</td><td>TOTAL</td><td>GARDE</td><td>ENGG YEAR</td><td>EXAM YEAR</td></tr>";
echo "<tr><td>".$row['sem_no']."</td><td>".$row['subject_code']."</td><td>".$row['roll_no']."</td><td>".$row['seat_no']."</td><td>".$row['th_marks']."</td><td>".$row['gr_marks']."</td><td>".$row['int_marks']."</td><td>".$row['th_total']."</td><td>".$row['th_gp']."</td><td>".$row['tw_marks']."</td><td>".$row['prac_marks']."</td><td>".$row['tp_total']."</td><td>".$row['tp_gp']."</td><td>".$row['engg_year']."</td><td>".$row['exam_year']."</td></tr>";

   ?>

</div>
</div>

</body>
</html>