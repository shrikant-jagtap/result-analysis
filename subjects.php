<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Subjects</title>
     

	<link rel="stylesheet" type="text/css" href="adminmain.css" />	
	

</head>
<body>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="adminmain.js"></script>

<div id="lefttab">
<div id="thelogo">
<a class="theimage" href="http://www.somaiya.edu"><img src="svv_logo.jpg" style="width:100%;position:absolute;" alt="somaiya" ></a>
<!-- https://www.somaiya.edu/styles/images/SVV_logo_LHS.jpg-->
</div>
<div id="thetab">
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

<div class="thebody">
<div>
<a href ="adminmain.php" id="topbuttons" style="margin-left:20px;float:left"><span>Home</span></a>
<a href ="adminlogout.php" id="topbuttons" style="float:right"><span>Logout</span></a>
</div>
<div class="loginpage" id="th" >
<center>Enter Subject Details</center>
<div style="width:37%;height:100%;padding-left:50%;">
    <form action="subjects.php" method="post">
      <div class="row">
        <div class="input-field col s12">
          <input id="sub_name" type="text" name="subject_name">
          <label for="sub_name">Subject Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="sub_code" type="text" name="subject_code">
          <label for="sub_code">Subject Code</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="sem_no" type="number" min="1" max="8" name="sem_no">
          <label for="sem_no">Semester No </label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="eng_year" type="text" name="exam_year">
          <label for="eng_year">Engineering Year</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="batch" type="text" name="subject_type">
          <label for="batch">Subject Type</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="theory" type="text" name="theory">
          <label for="theory">Theory</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="term_work" type="text" name="term_work">
          <label for="term_work">Term Work</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <input id="practical" type="text" name="practical">
          <label for="practical">Practical</label>
        </div>
      </div>
	
<input type="submit" id="ro" style="float:right;"  value="Submit" name="subjects">
	  
    </form>
  </div>

<!--
<div class="row input-field col">
<form style="font-family:verdana" >

<h3 style="font-family:verdana;padding-top:0px;margin-top:0px;">Enter the Subject details</h3>
Subject Name:
<input type="text" name="" style="float:right"> <br>
Subject Code:&nbsp

<input type="text" name="Subject_code" style="float:right"> <br>
Semester No:&nbsp
<div>
<input id="sem_no" type="text" name="sem_no" style="float:right">
<label for="sem_no"></label> <br>
</div>
Engineering Year:&nbsp
<input type="text" name="Engg_year" style="float:right"> <br>
Batch:&nbsp
<input type="text" name="batch" style="float:right"> <br>
Theory:&nbsp
<input type="text" name="Theory" style="float:right"> <br>

Practical:&nbsp
<input type="text" name="Prctical" style="float:right"> <br>
<input type="submit" id="ro" style="float:right" value="Submit">
</form>
</div>
-->
</div>

</div>
</div>







<?php
if(isset($_POST['subjects']))
{
mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("results");
		$query = "INSERT INTO `subjects`(`sem_no`, `subject_code`, `subject_name`, `exam_year`, `subject_type`, `theory`, `practical`, `term_work`) VALUES (".$_POST['sem_no'].", '".$_POST['subject_code']."', '".$_POST['subject_name']."', '".$_POST['exam_year']."', '".$_POST['subject_type']."', ".$_POST['theory'].", ".$_POST['practical'].", ".$_POST['term_work'].")";
		$result = mysql_query($query);
		
	
	
	}



?>
</body>
</html>