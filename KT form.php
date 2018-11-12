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

<div  id="lefttab">
<div id="thelogo">
<a class="theimage" href="http://www.somaiya.edu"><img src="svv_logo.jpg" style="width:100%;position:absolute;" alt="somaiya" ></a>
<!-- https://www.somaiya.edu/styles/images/SVV_logo_LHS.jpg-->
</div>
<div  id="thetab">
<nav id="a35">
<ul id="a351" class="collapsible">
<li class="waves-effect waves-som_color"><a href="addadmin.php">Add Admin</a></li>

<li class="waves-effect waves-som_color"><a href="KT form.php">KT Form</a></li>
<li class="waves-effect waves-som_color"><a  href="upd_stud_result.php">Update</a></li>
<li class="waves-effect waves-som_color" ><a href="upload.php">Upload</a></li>
<li class="waves-effect waves-som_color" ><a href="subjects.php" >Subjects</a></li>
<li>
	<span class="collapsible-header">Reports</span>
	 <ul class="collapsible-body">
<li class="waves-effect waves-som_color"><a href="cleanpass.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspClean Pass</a></li>
<li class="waves-effect waves-som_color"><a href="succpass.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSuccessful Pass</a></li>
<li class="waves-effect waves-som_color"><a href="topper.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTopper</a></li>
<li class="waves-effect waves-som_color"><a href="dropouts.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDrop-outs</a></li>
<li class="waves-effect waves-som_color"><a href="passstud.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPass</a></li>
<li class="waves-effect waves-som_color"><a href="failstud.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFail</a></li>
  </ul>
  </li> 
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


<center>Enter KT Exam details of the student </center>
<form action="KT Form.php" method="post">
<fieldset>

<br>
Semester No.:<br>
<select id="round12" name="sem_no">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>
<br><br>
Subject Code:<br>
<input type="text" name="subject_code">
<br><br>
Roll No<br>
<input type="number" name="roll_no">
<br><br>
Seat No<br>
<input type="number" name="seat_no">
<br><br>
Marks Obtained<br>
<input type="number" name="marks">
<br><br>
Result (F/P)<br>
<input type="text" name="result">
<br><br>
Academic Year:<br>
<br>
<?php 
echo('<select id="round12"  name="year">');
 for ( $i = 2010; $i < date("Y"); $i++ )
    {$j=$i-1999;
      echo'<option value='.$i.'-'.$j.'>'.$i.'-'.$j.'</option>';
     
    }
    echo('</select>');
?>
<br><br>
KT Type:<br><br>
<select id="round12" name="type">
<option value="theory">Theory</option>
<option value="practical">Practical</option>
<option value="term_work">Term Work</option>
</select>
<br><br>
<input id= "ro" type="submit" value="Enter" name="Enter">  <input id="ro" type="reset" value="Clear Form">
</fieldset></form>
<?php
if(isset($_POST['Enter']))
{
 //database connection details
$connect = mysql_connect('localhost','root','');

if (!$connect) {
 die('Could not connect to MySQL: ' . mysql_error());
 }

//your database name
$cid =mysql_select_db('results',$connect);

	$query="INSERT INTO kt_exam(sem_no,subject_code,roll_no,seat_no,marks,result,exam_year,type) VALUES ('".$_POST['sem_no']."','".$_POST['subject_code']."','".$_POST['roll_no']."','".$_POST['seat_no']."','".$_POST['marks']."','".$_POST['result']."','".$_POST['year']."','".$_POST['type']."') ";
    $s=mysql_query($query,$connect);
    if($_POST['result']=='P'|| $_POST['result']=='p')
     {
      $query="DELETE FROM kt_subject where sem_no='".$_POST['sem_no']."' AND subject_code='".$_POST['subject_code']."' AND roll_no='".$_POST['roll_no']."' AND type='".$_POST['type']."'";
      $s=mysql_query($query,$connect);
	  
	  // student Kt insert
	  
	  $query="INSERT INTO student_kt (roll_no,sem_no,subject_code,year_cleared) VALUES ('".$_POST['roll_no']."','".$_POST['sem_no']."','".$_POST['subject_code']."','".$_POST['year']."')";
	  $s=mysql_query($query,$connect);
	  }	 
}	
?>


</div>
</div>








</body>
</html>